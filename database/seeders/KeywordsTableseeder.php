<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('keywords')->insert(['name'=>'classic']);
        DB::table('keywords')->insert(['name'=>'retro']);
        DB::table('keywords')->insert(['name'=>'modern']);
    }
}
