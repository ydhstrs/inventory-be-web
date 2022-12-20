<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\BPBDChart;
use App\Charts\DonutChart;
use App\Charts\ExpensesChart;
use App\Models\Distribusi;
use App\Models\Logistik;
use App\Models\Peralatan;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(ExpensesChart $chart, BPBDChart $BPBDChart, DonutChart $donutChart)
    {
        $id_kota = Auth::user()->id_kota;
        $peralatan = Peralatan::count();
        $distribusi = Distribusi::count();
        $logistik = Logistik::count();
        $peminjaman = Pinjam::count();
        return view('admin.dashboard', [
            'chart' => $chart->build($id_kota),
            'bpbdchart' => $BPBDChart->build(),
            'donutChart' => $donutChart->build($id_kota),
            'peralatan'=>$peralatan,
            'logistik'=>$logistik,
            'peminjaman'=>$peminjaman,
            'distribusi'=>$distribusi,
    ]);
    }
}
