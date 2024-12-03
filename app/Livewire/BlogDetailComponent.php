<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;

class BlogDetailComponent extends Component
{   
    public $slug;
    public $blog;
    public $comments;
    public $author;
    public $newComment;
    public $MainComment;
    public $parentCommentId = null;
    public $likeCount;
    public $dislikeCount;
    public $userLiked = false;
    public $userDisliked = false;

    public function mount($slug)
    {
        $this->slug = $slug;

        // Fetch the blog post by slug
        $this->blog = Post::where('slug', $slug)->firstOrFail();

        // Fetch the author of the blog
        $this->author = User::find($this->blog->user_id);

        // Fetch top-level comments with replies and user information
        $this->comments = Comment::where('post_id', $this->blog->id)
            ->whereNull('parent_comment_id')->get();
        
            
        $this->blog->refresh();
        // Fetch the like and dislike count
        $this->likeCount = $this->blog->likes->where('status', 'like')->count();
        $this->dislikeCount = $this->blog->likes->where('status', 'dislike')->count();

        $this->updateUserLikeDislikeStatus();
    }

    public function render()
    {       
        return view('livewire.blog-detail-component')->layout('components.layouts.user');
    }

    public function submitComment()
    {
        if($this->parentCommentId) {
            if($this->newComment) {
                Comment::create([
                    'user_id' => auth()->user()->id,
                    'post_id' => $this->blog->id,
                    'content' => $this->newComment,
                    'parent_comment_id' => $this->parentCommentId
                ]);
    
                $this->newComment = '';
                $this->parentCommentId = null;
                $this->comments = Comment::where('post_id', $this->blog->id)
                    ->whereNull('parent_comment_id')->get();
    
                session()->flash('success', 'Comment submitted successfully');
            }else{
                session()->flash('error', 'Comment cannot be empty');
            }
        }else{
            if($this->MainComment){
                Comment::create([
                    'user_id' => auth()->user()->id,
                    'post_id' => $this->blog->id,
                    'content' => $this->MainComment
                ]);
    
                $this->MainComment = '';
                $this->comments = Comment::where('post_id', $this->blog->id)
                    ->whereNull('parent_comment_id')->get();
    
                session()->flash('success', 'Comment submitted successfully');
            }else{
                session()->flash('error', 'Comment cannot be empty');
            }
        }
    }


    public function replyToComment($commentId)
    {
        if($this->parentCommentId === $commentId) {
            $this->parentCommentId = null;
        } else {
            $this->parentCommentId = $commentId;
        }
    }

    public function likeAndDislikePost($postId, $status)
    {
        if (!auth()->check()) {
            session()->flash('error', 'You must be logged in to like or dislike a post.');
            return;
        }

        $like = Like::where('user_id', auth()->user()->id)
            ->where('post_id', $postId)
            ->first();

        if ($like) {
            $like->update([
                'status' => $status
            ]);
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $postId,
                'status' => $status
            ]);
        }

        // Force refresh the blog object to get the latest like/dislike count
        $this->blog = $this->blog->fresh();
        $this->likeCount = $this->blog->likes->where('status', 'like')->count();
        $this->dislikeCount = $this->blog->likes->where('status', 'dislike')->count();

        $this->updateUserLikeDislikeStatus();
    }

    private function updateUserLikeDislikeStatus()
    {
        if (auth()->check()) {
            $like = Like::where('user_id', auth()->user()->id)
                ->where('post_id', $this->blog->id)
                ->first();

            $this->userLiked = $like && $like->status === 'like';
            $this->userDisliked = $like && $like->status === 'dislike';
        } else {
            $this->userLiked = false;
            $this->userDisliked = false;
        }
    }

}
