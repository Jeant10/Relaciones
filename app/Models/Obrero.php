<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrero extends Model
{
    use HasFactory;

    // RELACIÓN DE MUCHOS A MUCHOS
    public function tareas()
    {
        return $this->belongsToMany(Tarea::class)->withTimestamps();
    }

}

