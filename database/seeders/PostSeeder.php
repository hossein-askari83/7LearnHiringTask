<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(1000000)->create()->each(function($post){
            $tagsCount = rand(2, 10);
            $post->tags()->attach($this->getRandomTags($tagsCount));
            $post->save();
        });
    }
    private function getRandomTags($count)
    {
        return Tag::inRandomOrder()->limit($count)->pluck('id');
    }
}
