<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TareasController extends Controller
{
    public function index(){
        return Inertia::render('tareas/Index',[]);
    }

    public function create(){
        return Inertia::render('tareas/Create',[]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'fechalimite' => 'required|string',
            'estado' => 'string',
            'usuarioasignado' => 'required|string',
        ]);
        //dd($data);
        Tareas::create($data);
        return redirect() -> route('tareas.index') -> with('message', 'Tarea añadida correctamente');
    }
}
