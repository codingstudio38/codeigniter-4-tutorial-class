<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
//use App\Models\PostModel;
class PostsSeeder extends Seeder
{
    public function run()
    {
        $PostModel = model('PostModel');
        for ($i = 0; $i < 10; $i++) {
            $PostModel->insert([
                'title'      => "title".$i,
                'content' => "content".$i,
                'thumbnail' => "thumbnail".$i,
                'category_id' => $i,
            ]);
        }
    }
}
