<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class BlogDetailComponent extends Component
{   
    public $slug;
    public $blog;
    public $comments;
    public $author;
    public $newComment;
    public $parentCommentId = null;
    public $replies;

    public function mount($slug)
    {
        $this->slug = $slug;

        // Fetch the blog post by slug
        $this->blog = Post::where('slug', $slug)->firstOrFail();

        // Fetch the author of the blog
        $this->author = User::find($this->blog->user_id);

        // Fetch top-level comments with replies and user information
        $this->comments = Comment::where('post_id', $this->blog->id)
            ->whereNull('parent_comment_id') // Top-level comments only
            ->with('replies', 'user') // Include nested replies and user data
            ->get();
    }

    public function render()
    {       
        return view('livewire.blog-detail-component')->layout('components.layouts.user');
    }

    public function submitComment()
    {
        $this->validate([
            'newComment' => 'required|max:1000',
        ]);

        Comment::create([
            'post_id' => $this->blog->id,
            'user_id' => 1,
            'content' => $this->newComment,
            'parent_comment_id' => $this->parentCommentId,
        ]);

        $this->reset('newComment', 'parentCommentId');
        $this->mount($this->slug); 
    }

    public function replyToComment($commentId)
    {
        if($this->parentCommentId === $commentId) {
            $this->parentCommentId = null;
        } else {
            $this->parentCommentId = $commentId;
        }
    }
}
