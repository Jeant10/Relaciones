<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    // RELACIÓN DE UNO A MUCHOS
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
 
}
