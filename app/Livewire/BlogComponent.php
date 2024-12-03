<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class BlogComponent extends Component
{
    public $selectedCategory = '';

    public function render()
    {   
        $query = Post::query();

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        $posts = $query->paginate(6);
        $categories = Category::all();
        $users = User::all();
        return view('livewire.blog-component', ['posts' => $posts, 'categories' => $categories, 'users' => $users])->layout('components.layouts.user');
    }
}
