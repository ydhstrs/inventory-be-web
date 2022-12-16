<?php

namespace App\Http\Controllers;

use App\Charts\BPBDChart;
use App\Charts\DonutChart;
use App\Charts\ExpensesChart;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(ExpensesChart $chart, BPBDChart $BPBDChart, DonutChart $donutChart)
    {
        return view('guest.home', [
            'chart' => $chart->build(1),
            'bpbdchart' => $BPBDChart->build(),
            'donutChart' => $donutChart->build(),
    ]);
    }

    public function distribusiView(){
        return view('guest.ditribusi');
    }

    public function galeriView(){
        return view('guest.galeri');
    }

    public function logistikView(){
        return view('guest.logistik');
    }

    public function regulasiView(){
        return view('guest.regulasi');
    }
}
