<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Tahun 2021')
            ->setSubtitle('Wins during season 2021.')
            ->addData('Inventaris', [6, 9, 3, 4, 10, 8])
            ->addData('Logistik', [7, 3, 8, 2, 6, 4])
            ->addData('Distribusi', [2, 4, 1, 6, 10, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
