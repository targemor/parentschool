@extends('layouts.app')

@section('botones')
<a class="btn btn-primary" href="{{route('eventos.crear')}}">
    Crear evento
</a>
<hr/>
<a class="btn btn-primary" href="{{route('register')}}">
    Registrar Usuario
</a>
@endsection
@section('algo')
<h1>
    Nuevo evento
</h1>
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{route('eventos.crearPost')}}" class="" method="post">
            <div class="form-group">
                <label for="">
                    Nombre del evento
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
            <div class="row">
                <div class="col-md-6">
                    <label for="control-label">
                        Fecha del evento
                    </label>
                    <div class="input-group date">
                        <input class="form-control datepicker" name="fecha" type="text"/>
                        <div class="input-group-addon">
                            <span class="fa fa-calendar">
                            </span>
                        </div>
                    </div>
                    @if ($errors->has('fecha'))
                    <span class="help-block">
                        <strong>
                            {{ $errors->first('fecha') }}
                        </strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="">
                        Hora del evento
                    </label>
                    <input class="form-control" name="hora" type="text"/>
                    @if ($errors->has('hora'))
                    <span class="help-block">
                        <strong>
                            {{ $errors->first('hora') }}
                        </strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="">
                    Lugar
                </label>
                <input class="form-control" name="lugar" type="text"/>
                @if ($errors->has('lugar'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('lugar') }}
                    </strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="">
                    Costo
                </label>
                <input class="form-control" name="costo" type="text"/>
                @if ($errors->has('costo'))
                <span class="help-block">
                    <strong>
                        {{ $errors->first('costo') }}
                    </strong>
                </span>
                @endif
            </div>
            <div class="form-group">
            <label for="">Descripcion del evento</label>
                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">
                Crear evento
            </button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection
@section('scripts')
<link href="{{asset('dist/css/bootstrap-datepicker.css')}}" rel="stylesheet"/>
<script src="{{ asset('dist/js/bootstrap-datepicker.js')}}">
</script>
<script src="{{ asset('dist/locales/bootstrap-datepicker.es.min.js') }}">
</script>
<script>
    $(document).ready(function(){
			
		 	var date = new Date();
			date.setDate(date.getDate());
		    $('.datepicker').datepicker({
		    	language:'es',
		    	format:'yyyy-mm-dd',
		    	todayHighlight:true,
		    	startDate: date
		    });

		});
</script>
@endsection
