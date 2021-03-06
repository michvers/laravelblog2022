<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable=['file'];
    protected $uploads = '/';
    //protected $guarded=['id'];
    //get{Attribute}Attribute
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }


}
