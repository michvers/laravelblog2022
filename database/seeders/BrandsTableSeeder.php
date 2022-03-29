<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert(['name'=>'ADIDAS', 'description'=>'description adidas']);
        DB::table('brands')->insert(['name'=>'NIKE', 'description'=>'description nike']);
        DB::table('brands')->insert(['name'=>'LACOSTE', 'description'=>'description lacoste']);
    }
}
