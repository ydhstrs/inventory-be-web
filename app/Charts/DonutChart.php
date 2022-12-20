<?php

namespace App\Charts;

use App\Models\Distribusi;
use App\Models\Logistik;
use App\Models\Peralatan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DonutChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($idKota): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $peralatan = 0;
        $logsitik = 0;
        $distribusi = 0;
        if($idKota!=null){

            $peralatan = Peralatan::where('id_kota', $idKota)->count();
            $logsitik = Logistik::where('id_kota', $idKota)->count();
            $distribusi = Distribusi::where('kota_penerima', $idKota)->count();
        }else{
            $peralatan = Peralatan::count();
            $logsitik = Logistik::count();
            $distribusi = Distribusi::count(); 
        }
        return $this->chart->donutChart()
            ->setTitle('Jumlah')
            ->setSubtitle('Tahun 2021.')
            ->addData([$peralatan,  $logsitik,  $distribusi])
            ->setLabels(['Peralatan', 'Logistik', 'Distribusi']);
    }
}
