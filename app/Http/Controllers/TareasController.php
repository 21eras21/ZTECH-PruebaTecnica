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
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'estado' => 'required|string',
            'usuario' => 'required|string',
        ]);

        Tareas::create($data);

        return redirect() -> route('tareas.index') -> with('message', 'Tarea añadida correctamente');
    }
}
