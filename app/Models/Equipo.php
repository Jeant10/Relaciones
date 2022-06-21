<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    // RELACIÓN DE UNO A MUCHOS
    public function jugadors()
    {
        return $this->hasMany(Jugador::class);
    }

}
