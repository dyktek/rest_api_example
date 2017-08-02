<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 100; $i++) {
            $post = new Post();
            $post->title = $faker->userName;
            $post->body = $faker->text(200);
            $post->user_id = rand(1,1000);
            $post->save();
        }
    }
}
