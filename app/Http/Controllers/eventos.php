<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evento;
use Illuminate\Support\Facades\DB;
use App\votos;
class eventos extends Controller
{
    //
    public function crear()
    {
    	# code...
    	return view('eventos.create');
    }

    public function crearPost(Request $request)
    {
    	# code...
    	$this->validate($request,[
			'nombre'=>'required',
			'fecha'=>'required',
			'hora'=>'required',
			'lugar'=>'required',
			'costo'=>'required'
    	]);
    	$evento=new evento([
    		'nombreEvento'=>$request->input('nombre'),
    		'fechaEvento'=>$request->input('fecha'),
    		'horaEvento'=>$request->input('hora'),
    		'lugarEvento'=>$request->input('lugar'),
    		'costoEvento'=>$request->input('costo'),            
            'descripcion'=>$request->input('descripcion')
    	]);
    	$evento->save();
    	return redirect()->back()->with('status', 'Evento creado con exito!');
    	//dd($request->all());

    }

    public function votos(Request $request){
        $votado=votos::where('idTutor',$request->idTutor)
                    ->where('idEvento',$request->idEvento)
                    ->get();
        if ($votado->isNotEmpty()) {
            # code...
            
            //return dd($votado);
            return response()->json([
                'mensaje'=>'Ya has votado anteriormente'
            ]);
        }else{
            $voto=new votos([
                'voto'=>$request->voto,
                'idTutor'=>$request->idTutor,
                'idEvento'=>$request->idEvento
            ]);

            $voto->save();
            return response()->json([
                'mensaje'=>'Tu voto ha sido registrado'
            ]);
        }
        
    }
}
