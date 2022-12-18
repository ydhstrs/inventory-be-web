<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\BPBDChart;
use App\Charts\DonutChart;
use App\Charts\ExpensesChart;
use App\Models\Logistik;
use App\Models\Peralatan;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(ExpensesChart $chart, BPBDChart $BPBDChart, DonutChart $donutChart)
    {
        $id_kota = Auth::user()->id_kota;
        $peralatan = Peralatan::count();
        $logistik = Logistik::count();
        return view('admin.dashboard', [
            'chart' => $chart->build($id_kota),
            'bpbdchart' => $BPBDChart->build(),
            'donutChart' => $donutChart->build(),
            'peralatan'=>$peralatan,
            'logistik'=>$logistik,
    ]);
    }
}
