<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class CommentsComponent extends Component
{
    public $comments;
    public $newComment;
    public $editCommentId;
    public $editCommentBody;

    public function mount()
    {
        $initialComments = Comment::all();
        $this->comments = $initialComments;
    }

    public function addComment()
    {
        if ($this->newComment === '') {
            return;
        }

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => Auth::user()->id
        ]);

        $this->comments->push($createdComment);
        $this->newComment = "";
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment && ($comment->user_id === Auth::user()->id || Auth::user()->utype === 'ADM')) {
            $comment->delete();
            $this->comments = $this->comments->reject(function ($item) use ($commentId) {
                return $item->id === $commentId;
            });
        }
        DB::statement("ALTER TABLE comments AUTO_INCREMENT = 1");
    }

    public function editComment($commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment && $comment->user_id === Auth::user()->id) {
            $this->editCommentId = $comment->id;
            $this->editCommentBody = $comment->body;
        } else {
            $this->editCommentId = null;
            $this->editCommentBody = '';
        }
    }

    protected $listeners = ['commentUpdated' => '$refresh'];
    public function updateComment()
    {
        $comment = Comment::find($this->editCommentId);

        if ($comment) {
            $comment->body = $this->editCommentBody;
            $comment->save();

            // Reset the edit state
            $this->editCommentId = null;
            $this->editCommentBody = '';

            $updatedComment = $this->comments->where('id', $comment->id)->first();
            $this->comments = $this->comments->reject(function ($item) use ($comment) {
                return $item->id === $comment->id;
            })->push($updatedComment);

            $this->emit('commentUpdated');
        }
    }

    public function render()
    {
        return view('livewire.comments-component');
    }
}
