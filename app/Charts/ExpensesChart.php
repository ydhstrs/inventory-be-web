<?php

namespace App\Charts;

use App\Models\Logistik;
use App\Models\Peralatan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id_kota): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $peralatan= array();
        $logistik= array();
        for ($i=0; $i<=11; $i++){
            $peralatan[$i] = Peralatan::where('id_kota',$id_kota)->whereMonth('created_at', date('m',strtotime('-'.$i.' month')))->count();
            $logistik[$i] = Logistik::where('id_kota',$id_kota)->whereMonth('created_at', date('m',strtotime('-'.$i.' month')))->count();
        }
        
        return $this->chart->barChart()
            ->setTitle('Tahun 2022')
            ->addData('Peralatan', array_reverse($peralatan))
            ->addData('Logistik', array_reverse($logistik))
            ->addData('Distribusi', [2, 4, 1, 6, 10, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June','July','Agustus','September','Oktober','November','Desember']);
    }
}
