@extends('layouts.app')
@section('botones')
<a href="{{route('calificaciones.getCalificaciones',['id'=>Auth::user()->id])}}" class="btn btn-primary">Ver calificaciones </a>
<hr/>
<a class="btn btn-primary" href="/home" >Ver ultimos eventos</a>
@endsection
@section('algo')
<h1>Tutorados</h1>
@foreach($alumnos as $alumno)
	<div class="row">
  <div class="col-xs-12">
    <div class="thumbnail">      
      <div class="caption">
        <h3>{{$alumno->nombre}}</h3>
        <p>
        	Grado que cursa el alumno: {{$alumno->grado}}
			<br />
        	<a href="{{route('calificaciones.getCali',['id'=>$alumno->id])}}">Ver calificaciones</a>
        </p>
      </div>
    </div>
  </div>
</div>
	
@endforeach
@endsection
