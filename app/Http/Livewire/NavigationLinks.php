<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavigationLinks extends Component
{
    public function navigate($url)
    {
        return redirect()->to($url);
    }

    public function render()
    {
        return view('livewire.navigation-links');
    }
}
