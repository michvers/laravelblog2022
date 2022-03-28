<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    //use SoftDeletes;
    //protected $guarded=['id'];
    protected $fillable=['photo_id', 'category_id', 'title','slug', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_post');
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function postcomments(){
        return $this->hasMany(Comment::class);
    }

    /**searching/filtering**/
    public function scopeFilter($query, array $filters){
        //if(isset($filters['search']) == false
        if($filters['search'] ?? false){ //php 8
            $query
                ->where('title','like', '%' . request('search') . '%')
                ->orWhere('body','like', '%' . request('search') . '%');
        }
    }
}
