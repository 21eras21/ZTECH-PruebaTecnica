<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    protected $table = 'tareas'; // Indica explícitamente la tabla
    protected $fillable = [
    'titulo',
    'descripcion',
    'fechalimite',
    'estado',
    'usuarioasignado',
];
}
