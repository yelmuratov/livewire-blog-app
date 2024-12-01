<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class BlogComponent extends Component
{
    public function render()
    {   
        $posts = Post::Paginate(6);
        $categories = Category::all();
        $users = User::all();
        return view('livewire.blog-component', ['posts' => $posts,'categories'=>$categories,'users'=>$users])->layout('components.layouts.user');
    }
}
