<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Home extends Component
{
    #[Layout('layouts.guest')] 
    public $modelOpenNo = false;
    public function render()
    {
        $this->dispatch('refresh');
        return view('livewire.user.home');
    }

    public function openModal(){
        $this->modelOpenNo = true;
    }
}
