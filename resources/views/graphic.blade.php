@extends('adminlte::page')
@section('title', 'Aplicación de clima')

@section('content_header')
    <h1>Pronostico de clima</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@stop