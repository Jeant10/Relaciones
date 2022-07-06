<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\Image;
use App\Models\Comment;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory()->count(10)->create();
        $video = Video::all();

        $video->each(function ($video)
       {
           $video->image()->save(Image::factory()->make(['url' => "https://picsum.photos/id/$video->id/150/150"]));
       });

       $video->each(function ($video)
       {

        $tags = rand(1,5);
        for($i=1 ; $i<=$tags ; $i++)
        {
            $video->tags()->attach($i);
        }
       });

       $video->each(function ($video)
       {

           $number_comments = rand(1,2);

           for($i=0 ; $i<$number_comments ; $i++)
           {
               $video -> comments()->save(Comment::factory()->make());
           }

       });

    }
}
