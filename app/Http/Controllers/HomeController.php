<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\evento;
use App\calificaciones;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos=evento::all();
        return view('home',[
            'eventos'=>$eventos
        ]);
    }
    public function maestro()
    {
        # code...
        $calificaciones=DB::table('calificaciones')
        ->join('alumnos','calificaciones.idAlumno','=','alumnos.id')
        ->join('users','alumnos.idTutor','=','users.id')
        ->select('users.name','calificaciones.visto','alumnos.nombre')
        ->get();
        return view('auth.maestro',[
            'calificaciones'=>$calificaciones
        ]);
    }
    public function admin()
    {
        # code...
        $eventos=evento::all();
        return view('auth.admin',['eventos'=>$eventos]);
    }
}
