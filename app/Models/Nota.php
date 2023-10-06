<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    public function estudiante()
    {
       return $this->belongsTo(Estudiante::class,'estudiante_id');
    }
    public function asignatura(){
        return $this->belongsTo(asignatura::class,'asignatura_id');

    }
}
