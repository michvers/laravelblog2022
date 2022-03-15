<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = Category::all();
        Post::all()->each(function ($post) use ($categories){
            if($post['id']==1){
                $post->categories()->sync([1]);
            }elseif($post['id']==2){
                $post->categories()->sync([3]);
            }else{
                $post->categories()->attach(
                    $categories->random(rand(1,3))->pluck('id')->toArray()
                );
            }
        });
    }
}
