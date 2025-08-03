<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TareasController extends Controller
{
    public function index(){
        $tareas = Tareas::latest()->get();
        return Inertia::render('tareas/Index', compact('tareas'));
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

        //dd($data); //Esto se usó para validar error con los datos que se estaban enviando.

        Tareas::create($data);

        return redirect() -> route('tareas.index') -> with('message', 'Tarea añadida correctamente');
    }

    public function edit(Tareas $tarea){
        return Inertia::render('tareas/Edit', compact('tarea'));
    }

    public function update(Request $request, Tareas $tarea){
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'fechalimite' => 'required|string',
            'estado' => 'string',
            'usuarioasignado' => 'required|string',
        ]);

        $tarea->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fechalimite' => $request->input('fechalimite'),
            'estado' => $request->input('estado'),
            'usuarioasignado' => $request->input('usuarioasignado')
        ]);

        return redirect() -> route('tareas.index') -> with('message', 'Tarea actualizada correctamente');
    }

    public function destroy(Tareas $tarea){
        $tarea->delete();
        return redirect() -> route('tareas.index') -> with('message', 'Tarea eliminada correctamente');
    }
}
