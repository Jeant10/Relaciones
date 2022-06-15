<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
        // RELACIÓN DE UNO A MUCHOS - V
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        // RELACIÓN DE UNO A MUCHOS
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
    
}
