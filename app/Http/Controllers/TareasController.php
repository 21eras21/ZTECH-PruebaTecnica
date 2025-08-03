<?php

namespace App\Http\Controllers;

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
}
