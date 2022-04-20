<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo_id',
        'product_category_id',
        'brand_id',
        'name',
        'body'
    ];

    public function keywords()
    {
        return $this->morphToMany(Keyword::class, 'keywordable');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productcategory(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }


}
