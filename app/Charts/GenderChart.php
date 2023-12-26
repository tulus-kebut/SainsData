<?php

namespace App\Charts;

use App\Models\Stunting;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $perempuan = Stunting::where('kelamin','P' )->get()->count();
        $laki = Stunting::where('kelamin','L' )->get()->count();

        // dd($perempuan);
        return $this->chart->barChart()
            ->addData('Perempuan', [$perempuan])
            ->addData('Laki-Laki', [$laki])
            ->setTitle('Diagram gender pasien')
            ->setXAxis(['Banyaknya gender'])
            ->setHeight(500)
            ->setFontColor('#FFF');
    }
}
