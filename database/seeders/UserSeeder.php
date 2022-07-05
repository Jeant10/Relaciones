<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creando 5 usuarios
        User::factory()->count(5)->create();

        //Obtener todos los usuarios registrados []
        $users = User::all();

        //Iterar por cada usuario
        $users->each(function ($user)
        {
            //Asociar un usuario con un perfil
            $user->profile()->save(Profile::factory()->make());
        });

        //Se obtiene los 5 perfiles
        $profiles = Profile::all();


        //Iterar por cada perfil       
        $profiles->each(function ($profile)
        {
            //Asociar un perfil con la ubicacion
            $profile->location()->save(Location::factory()->make());
        });

        //Iterar por cada usuario   
        $users->each(function ($user)
        {
            //Asociar un usuario con una imagen           
            $user->image()->save(Image::factory()->make(['url' => "https://picsum.photos/id/$user->id/100/100"]));
        });

        //Iterar por cada usuario         
        $users->each(function ($user)
        {
            //Generar numeros randomicos del (1, 2 o 3)
            $group = rand(1, 3);
            //Iterar el numero random que se va a generar
            for ($i = 1; $i <= $group; $i++) {
                //Asociar un usuario con una grupo (1, 2 o 3)
                $user->groups()->attach($i);
            }
        });

    }
}
