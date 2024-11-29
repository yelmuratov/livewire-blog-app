<?php

namespace App\Livewire;

use Livewire\Component;

class BlogDetailComponent extends Component
{
    public function render()
    {
        return view('livewire.blog-detail-component')->layout('components.layouts.user');
    }
}
