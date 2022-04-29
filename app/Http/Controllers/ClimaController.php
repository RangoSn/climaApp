<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Clima;

/*
    @author Eduardo Jair Tapia Martinez
    @version v 0.0.1
*/
class ClimaController extends Controller
{
    /*
        @return view clima
        vista donde se mostraran los datos obtenidos por Http::get

        @return json $data


    */
    public function list(){
        $data = Http::get('https://api.openweathermap.org/data/2.5/forecast?q=Mexico%20City&lang=ES&units=metric&appid=716484f9c821c304bf35df09126cfe7f')->json();
        return view('clima', ['data'=> $data]);
    }

    public function graphic(){
        $data = Http::get('https://api.openweathermap.org/data/2.5/forecast?q=Mexico%20City&lang=ES&units=metric&appid=716484f9c821c304bf35df09126cfe7f')->json();
        foreach ($data['list'] as $key => $info) {
            $clima = new Clima;
            $clima->temp = $data['list'][$key]['main']['temp'];
            $clima->temp_min = $data['list'][$key]['main']['temp_min'];
            $clima->temp_max = $data['list'][$key]['main']['temp_max'];
            $clima->description = $data['list'][$key]['weather'][0]['description'];
            $clima->pronostic_date = $data['list'][$key]['dt_txt'];
            $clima->save();
        }
        $chart_options = [
            'chart_title' => 'Pronostico de los siguientes 5 días',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Clima',
            'group_by_field' => 'description',
            'chart_type' => 'bar',
            'chart_color' => '247,7,7',
            'filter_field' => 'pronostic_date',
            'group_by_period' => 'day',
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('graphic', compact('chart1'));

    }
}
