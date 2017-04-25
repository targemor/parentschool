@extends('layouts.app')
@section('botones')
<a class="btn btn-primary" href="{{route('calificaciones.crear')}}">
    Subir Calificaciones
</a>
@endsection
@section('algo')
<h1>
    Estado de las calificaciones
</h1>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Nombre del Alumno
                    </th>
                    <th>
                        Nombre del Tutor
                    </th>
                    <th>
                        Estatus
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($calificaciones as $cali)
                <tr>
                    <td>
                        {{$cali->nombre}}
                    </td>
                    <td>
                        {{$cali->name}}
                        <td>
                            @if($cali->visto == 0)
                            sin ver
                            @else
                            visto
                            @endif
                        </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
