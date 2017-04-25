@extends('layouts.app')

@section('botones')
<a class="btn btn-primary" href="/maestro">
    Inicio
</a>
<hr/>

<a class="btn btn-primary" href="{{route('calificaciones.crear')}}">
    Subir Calificaciones
</a>
@endsection
@section('algo')
<h2>
    Datos del alumno
</h2>
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('calificaciones.crearPost')}}" method="post">
            <input type="hidden" name="band" value="0">
            <div class="row" id="id_alumno">
                <div class="col-md-3">
                    <label for="">
                        Nombre del alumno
                    </label>
                    <select class="form-control" name="alumno">
                        <option value="">
                        </option>
                        @foreach($alumnos as $alumno)
                        <option value="{{$alumno->id}}">
                            {{$alumno->nombre}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('alumno'))
                        <span class="help-block">
                            <strong>
                                {{ $errors->first('alumno') }}
                            </strong>
                        </span>
                        @endif
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <label for="">
                        El alumno no de encuentra en la lista?
                    </label>
                    <p class="btn btn-success" name="registro">
                        Registrar alumno
                    </p>
                </div>
            </div>
            <div class="row" id="datos_registro">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            Nombre del alumno
                        </label>
                        <input class="form-control" name="nombre" type="text"/>
                        @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>
                                {{ $errors->first('nombre') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            Grado
                        </label>
                        <select class="form-control" name="grado">
                            @for($i=1;$i<=6;$i++)
                            <option value="{{$i}}">
                                {{$i}}
                            </option>
                            @endfor
                        </select>
                        @if ($errors->has('grado'))
                        <span class="help-block">
                            <strong>
                                {{ $errors->first('grado') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">
                            Nombre Tutor
                        </label>
                        <select class="form-control" name="tutor">
                            <option value="">
                            </option>
                            @foreach($tutores as $tutor)
                            <option value="{{$tutor->id}}">
                                {{$tutor->name}}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('tutor'))
                        <span class="help-block">
                            <strong>
                                {{ $errors->first('tutor') }}
                            </strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        Calificaciones
                    </h2>
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
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Matematicas
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Español
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    Historia
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    Geografia
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5
                                </td>
                                <td>
                                    Biologia
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6
                                </td>
                                <td>
                                    Ciencias Sociales
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    7
                                </td>
                                <td>
                                    Educacion Fisica
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name="calificaciones[]" type="text">
                                        </input>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                     
                </div>
                @if ($errors->has('calificaciones[]'))
                        <span class="help-block">
                            <strong>
                                {{ $errors->first('calificaciones[]') }}
                            </strong>
                        </span>
                        @endif
            </div>
            <button class="btn btn-primary" type="submit">
                Guardar Calificaciones
            </button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datos_registro').hide();
        $("p[name='registro']").click(function () {
            $('#id_alumno').hide("slow");
            $('#datos_registro').show(2000);
            $("input[name='band']").val(1);
            console.log(  $("input[name='band']").val());
        });

    });
</script>
@endsection
