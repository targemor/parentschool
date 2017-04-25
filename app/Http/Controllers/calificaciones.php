<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\alumno;
use App\calificaciones as cali;
class calificaciones extends Controller
{
    //
    public function crear()
    {
    	# code...
        $tutores=User::where('rol',0)->get();
        $alumnos=alumno::all();
    	return view('calificaciones.crear',[
            'tutores'=>$tutores,
            'alumnos'=>$alumnos
        ]);
    }

    public function crearPost(Request $request)
    {

    	# code...
        $nombres=["Matematicas","Espanol","Historia","Geografia","Biologia","Ciencias Sociales","Educacion Fisica"];
        
        if($request->input('band')==0){
             $this->validate($request,[
                'alumno'=>'required',
                //'calificaciones[]'=>'required'
            ]);
            $calificacionesArray=serialize(array_combine($nombres,$request->input("calificaciones")));
            $calificaciones=new cali([
                'visto'=>0,
                'materias'=>$calificacionesArray,
                'idAlumno'=>$request->input('alumno')
            ]);
            $calificaciones->save();
            return redirect()->back()->with('status','Calificacion subida con exito');
        }else{
            # code...
            $this->validate($request,[
                'nombre'=>'required',
                'grado'=>'required',
                'tutor'=>'required',
                //'calificaciones[]'=>'required'
            ]);
            $alumno=new alumno([
                'nombre'=>$request->input('nombre'),
                'grado'=>$request->input('grado'),                
                'idTutor'=>$request->input('tutor')
            ]);
            $alumno->save();
            $idAlumno=alumno::all()->last();
            $calificacionesArray=serialize(array_combine($nombres,$request->input("calificaciones")));
            $calificaciones=new cali([
                'visto'=>0,
                'materias'=>$calificacionesArray,
                'idAlumno'=>$idAlumno->id
            ]);
            $calificaciones->save();
            return redirect()->back()->with('status','Calificacion subida con exito');
        }           
    }

    public function getCalificaciones($id)
    {
        # code...
        $alumnos=alumno::where('idTutor',$id)->get();
        return view('calificaciones.get',[
            'alumnos'=>$alumnos
        ]);
    }
    public function getCali($id)
    {
        # code...
        $update=cali::find($id);
        $update->visto=1;
        $update->save();
        $calificaciones=cali::where('idAlumno',$id)->get();
        $calificaciones->transform(function($cali,$key){
            # code...
            $cali->materias=unserialize($cali->materias);
            return $cali;
        });
        return view('calificaciones.cali',[
            'calificaciones'=>$calificaciones
        ]);
       

    }

}
