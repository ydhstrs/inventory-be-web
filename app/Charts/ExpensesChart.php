<?php

namespace App\Charts;

use App\Models\Distribusi;
use App\Models\Logistik;
use App\Models\Peralatan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id_kota): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $peralatan = array();
        $logistik = array();
        $distribusi = array();
        if ($id_kota==null) {
            for ($i = 0; $i <= 11; $i++) {
                $peralatan[$i] = Peralatan::whereMonth('created_at', date('m', strtotime('-' . $i . ' month')))->count();
                $logistik[$i] = Logistik::whereMonth('created_at', date('m', strtotime('-' . $i . ' month')))->count();
                $distribusi[$i] = Distribusi::whereMonth('created_at', date('m', strtotime('-' . $i . ' month')))->count();
            }
        } else {
            for ($i = 0; $i <= 11; $i++) {
                $peralatan[$i] = Peralatan::where('id_kota', $id_kota)->whereMonth('created_at', date('m', strtotime('-' . $i . ' month')))->count();
                $logistik[$i] = Logistik::where('id_kota', $id_kota)->whereMonth('created_at', date('m', strtotime('-' . $i . ' month')))->count();
                $distribusi[$i] = Distribusi::where('kota_penerima', $id_kota)->whereMonth('created_at', date('m', strtotime('-' . $i . ' month')))->count();
            }
        }

        return $this->chart->barChart()
            ->setTitle('Tahun 2022')
            ->addData('Peralatan', array_reverse($peralatan))
            ->addData('Logistik', array_reverse($logistik))
            ->addData('Distribusi', array_reverse($distribusi))
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
    }
}
