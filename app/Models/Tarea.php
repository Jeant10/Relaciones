<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // RELACIÓN DE MUCHOS A MUCHOS
    public function obreros()
    {
        return $this->belongsToMany(Obrero::class)->withTimestamps();
    }

}
