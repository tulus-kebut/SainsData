<?php

namespace App\Charts;

use App\Models\Posyandu;
use App\Models\Stunting;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PosyanduChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $balita = Stunting::get();
        $kelompok = Posyandu::get();
        $labels = [];
        $data = [];

        foreach($kelompok as $datas) {
            $labels[] = $datas->nama_posyandu;
            $data[] = $balita->where('kode_posyandu', $datas->kode_posyandu)->count();
        }

        return $this->chart->pieChart()
            ->addData($data)
            ->setLabels($labels)
            ->setFontColor('#FFF');
    }
}
