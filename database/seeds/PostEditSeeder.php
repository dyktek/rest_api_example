<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostEditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Post::all() as $item) {
            $item->category_id = rand(1,3);
            $item->save();
        }
    }
}
