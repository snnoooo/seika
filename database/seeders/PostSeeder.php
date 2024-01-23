<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'posts_name' => 'リップ',
            'body' => 'いい',
            'price' => '5000',
            'image_filename' => 'ファイル名',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
