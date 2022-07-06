<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear 10 post
        Post::factory()->count(10)->create();

        //Obtener todos los posts (Modelos)
        $posts = Post::all();

        //Iterar por cada post (modelo)
       $posts->each(function ($post)
       {
           //Asociar una imagen
           $post->image()->save(Image::factory()->make(['url' => "https://picsum.photos/id/$post->id/150/150"]));
       });

        //Iterar por cada post (modelo)
       $posts->each(function ($post)
       {
           //Asociar etiquetas
           $tags = rand(1,5);
           for($i=1 ; $i<=$tags ; $i++)
           {
               //Asociar un tag
               $post->tags()->attach($i);
           }
       });

       //Iterar por cada post (modelo)
       $posts->each(function ($post)
       {
           $number_comments = rand(1,2);

           for($i=0 ; $i<$number_comments ; $i++)
           {
               //Asociar comentarios
               $post -> comments()->save(Comment::factory()->make());
           }

       });

    }
}
