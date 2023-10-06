<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class,'curso_id');
    }
}
