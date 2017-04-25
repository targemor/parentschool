@extends('layouts.app')
@section('botones')
<a class="btn btn-primary" href="{{route('calificaciones.getCalificaciones',['id'=>Auth::user()->id])}}">
    Ver calificaciones
</a>
<hr/>
<a class="btn btn-primary" href="/home" >Ver ultimos eventos</a>
@endsection
@section('algo')
<h1>
    Calificaciones
</h1>
@foreach($calificaciones as $cali)
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nombre de la materia
                    </th>
                    <th>
                        Calificacion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($cali->materias as $key => $materia)
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        {{$key}}
                    </td>
                    <td>
                        {{$materia}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach
           
@endsection
