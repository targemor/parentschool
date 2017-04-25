@extends('layouts.app')

@section('botones')
<a class="btn btn-primary" href="/admin">
    Inicio
</a>
<hr/>
<a href="{{route('eventos.crear')}}" class="btn btn-primary">Crear evento</a>
<hr/>
<a href="{{route('register')}}" class="btn btn-primary">Registrar Usuario</a>

@endsection
@section('algo')
<h1>Votacion de eventos: </h1>
@foreach($eventos as $evento)
<div class="well">
    <h3>{{$evento->nombreEvento}}</h3>
    <div id="container" style="width:100%; height:400px;" class="container">        
    </div>
</div>
@endforeach

@endsection
@section('scripts')

<script src="{{ asset('js/highcharts.src.js') }}"></script>
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Votos'
    },   
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numero de Votos'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Total: <b>{point.y:.1f} Votos</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Si', 1],
            ['No', 2],
            
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>
@endsection
