@extends('adminlte::page')
@section('title', 'Tabla de clima')

@section('content_header')
    <h1>Pronostico de clima</h1>
@stop

@section('content')
    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
        @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
    </style>
    <div class="tg-wrap">
        <table id="clima" class="table table-striped">
        <thead>
          <tr>
            <td class="tg-0lax">Temperatura</td>
            <td class="tg-0lax">Temperatura minima</td>
            <td class="tg-0lax">Temperatura maxima</td>
            <td class="tg-0lax">Descripcion</td>
            <td class="tg-0lax">Fecha</td>
            <td class="tg-0lax">Ciudad</td>
          </tr>
        </thead>
        <tbody>



            @foreach ($data['list'] as $key => $info)
            <tr>
                <td>{{print_r($data['list'][$key]['main']['temp'])}}</td>
                <td>{{print_r($data['list'][$key]['main']['temp_min'])}}</td>
                <td>{{print_r($data['list'][$key]['main']['temp_max'])}}</td>
                <td>{{print_r($data['list'][$key]['weather'][0]['description'])}}</td>
                <td>{{print_r($data['list'][$key]['dt_txt'])}}</td>
                <td>{{print_r($data['city']['name'])}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Showing page _PAGE_ of _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            } );
        } );
    </script>
@stop