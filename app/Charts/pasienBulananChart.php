<?php

namespace App\Charts;

use App\Models\Stunting;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;
use Illuminate\Support\Carbon;

class pasienBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $pasien = Stunting::get();
        $data = [];
        $months = [];

        foreach($pasien as $datas) {

        $data[] = $datas->count();
        $months[] = $datas->created_at->format('M');
        }
        return $this->chart->lineChart()
                ->addData('data', $data)
                ->setXaxis($months)
                ->setTitle('Pasien Bulanan')
                ->setFontColor('#FFF')
                ->setLabels($months);
    }
}
