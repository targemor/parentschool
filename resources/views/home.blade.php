@extends('layouts.app')
@section('botones')
<a class="btn btn-primary" href="{{route('calificaciones.getCalificaciones',['id'=>Auth::user()->id])}}">
    Ver calificaciones
</a>
<hr/>
<a class="btn btn-primary" href="/home">
    Ver ultimos eventos
</a>
@endsection
@section('algo')
<h1>
    Proximos Eventos
</h1>
@foreach($eventos as $evento)
<div class="well">
    <h2>
        {{$evento->nombreEvento}}
    </h2>
    <h3>
        Descripcion :
    </h3>
    <p>
        {{$evento->descripcion}}
    </p>
    <h3>
        Fecha Tentativa: {{$evento->fechaEvento}}
    </h3>
    <h3>
        Hora del evento: {{$evento->horaEvento}}
    </h3>
    <div class="clearfix">
        <button class="btn btn-success" data-id="{{$evento->id}}" type="button" value="1">
            Estoy de Acuerdo
        </button>
        <button class="btn btn-danger" data-id="{{$evento->id}}" type="button" value="0">
            No estoy de Acuerdo
        </button>
    </div>
</div>
@endforeach
<script>
    $(document).ready(function(){
		// body...
		$('button').click(function () {
			$.ajax({
			  type: 'POST',
			  url: 'http://proyecto.parentschool.tk/evento/votar',
			  data: {
			  	idTutor:{{Auth::user()->id}},
			  	voto:this.value,
			  	idEvento:$(this).attr('data-id')			  	
			  },			
			  dataType: 'json',
			  headers: { 
			  	'X-CSRF-Token' : $('input[name=_token]').attr('value')},
			  success: function(res){
			  	// body...
			  	alert(res.mensaje);
			  },error: function (xhr, ajaxOptions, thrownError) {
		        alert(xhr.status);
		        alert(thrownError);
		      }
			  
			});
			
		});

		
	});
</script>
@endsection
