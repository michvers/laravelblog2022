<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id'
    ];

    //retourneert 1 level van child items
    public function tags()
    {
        return $this->hasMany(Tag::class, 'parent_id');
    }

    //recursieve functie
    public function childtags()
    {
        return $this->hasMany(Tag::class, 'parent_id')->with('tags');
    }
}
