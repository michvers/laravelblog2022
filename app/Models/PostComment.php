<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'photo_id',
        'user_id',
        'body',
        'is_active'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function postcommentreplies(){
        //return $this->hasMany(PostCommentReply::class);
    }
}
