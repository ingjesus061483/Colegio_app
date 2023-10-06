<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    public function curso()
    {
        return $this->belongsTo(Curso::class,'curso_id');
    }
    public function notas()
    {
        return $this->hasMany( Nota::class,'estudiante_id');

    }
}
