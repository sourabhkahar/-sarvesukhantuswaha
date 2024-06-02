<?php

namespace App\Livewire\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Gallery extends Component
{
    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.user.gallery');
    }
}
