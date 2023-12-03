<?php

namespace App\Http\Livewire\Messenger;

use Livewire\Component;

class MessagesComponent extends Component
{
    public function render()
    {
        return view('livewire.messenger.messages-component')->layout('layouts.messenger');
    }
}
