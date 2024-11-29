<?php

namespace App\Livewire;

use Livewire\Component;

class AdminPageComponent extends Component
{   
    public $title = 'Dashboard';

    public function render()
    {           
        return view('livewire.admin-page-component')->layout('components.layouts.admin',['title' => $this->title]);
    }
}
