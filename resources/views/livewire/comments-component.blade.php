@section('title', 'Comments')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            <li class="item-link"><span>Comments</span></li>
        </ul>
    </div>
    <section id="comments">

        <div class="thanks-view">
            <div class="logo">
                <img src="{{ asset('assets/img/about/view.jpg') }}" alt="Bakeshop Logo">
            </div>
            <div class="thanks-body">
                <h1>Thank you for visiting our bakeshop</h1>
                <p>We appreciate your support and hope you had a delightful experience exploring our selection of freshly baked goods. Your satisfaction is our top priority, and we look forward to serving you again in the future. If you have any feedback or questions, please don't hesitate to reach out. Thank you once again, and have a sweet day!</p>
            </div>
        </div>
        <h2>Customer Reviews</h2>

        <div wire:key="comments">
            @foreach ($comments as $comment)
                <div class="comment-container">
                    <div class="user-info">
                        <img src="{{ asset('assets/img/avatars/avatar_' . $comment->user->id . '.' . (file_exists(public_path('assets/img/avatars/avatar_' . $comment->user->id . '.png')) ? 'png' : 'jpg')) }}" alt="{{ 'Avatar of user ' . $comment->user->name }}">
                        @if($comment->user->utype === 'ADM')
                            <h3>{{ $comment->user->name }} <span class="fas fa-circle-star"></span></h3>
                        @else
                            <h3>{{ $comment->user->name }}</h3>
                        @endif
                    </div>
                    @if ($editCommentId === $comment->id)
                        <textarea class="edit-comment" type="text" wire:model="editCommentBody"></textarea>
                        <button class="save-update" wire:click="updateComment">Save</button>
                        <button class="cancel-update" wire:click="editComment(null)">Cancel</button>
                    @else
                        <p class="comment-text">{{ $comment->body }}</p>
                        <p class="comment-date">Commented on {{ $comment->updated_at->diffForHumans() }}</p>
                        <div class="comment-actions">
                            <button class="reply-btn fas fa-reply"></button>
                            @if(Auth::check() && (Auth::user()->utype === 'ADM' && $comment->user_id === Auth::user()->id))
                                <button class="edit-btn" wire:click="editComment({{ $comment->id }})">Edit</button>
                            @elseif(Auth::check() && $comment->user_id === Auth::user()->id)
                                <button class="edit-btn" wire:click="editComment({{ $comment->id }})">Edit</button>
                            @endif
                            @if(Auth::check() && (Auth::user()->utype === 'ADM' || $comment->user_id === Auth::user()->id))
                                <button class="delete-btn" wire:click="deleteComment({{ $comment->id }})">Delete</button>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

    <!-- Comment submission form -->
        <form id="comment-form" wire:submit.prevent="addComment">
            {{-- <h3>Add Your Comment</h3> --}}
            <div class="form-group">
            {{-- <label for="comment-text">Comment:</label> --}}
            <textarea id="comment-text" placeholder="What is your comment?" name="comment-text" rows="4" required wire:model="newComment"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </section>
</main>
