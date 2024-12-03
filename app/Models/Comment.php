<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content', 'parent_comment_id'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_comment_id')->with('replies');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
