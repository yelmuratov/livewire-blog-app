<?php

namespace App\Livewire;

use Livewire\Component;

class UserPageComponent extends Component
{   
    public $title = '|Home Page';
    public function render()
    {
        return view('livewire.user-page-component')->layout('components.layouts.user');
    }
}
