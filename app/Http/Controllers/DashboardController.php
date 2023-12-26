<?php

namespace App\Http\Controllers;

use App\Charts\GenderChart;
use App\Charts\pasienBulananChart;
use App\Charts\PosyanduChart;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(PosyanduChart $posyanduChart, pasienBulananChart $pasienBulananChart, GenderChart $genderChart)
    {
        $title = 'Dashboard';

        $kelompokPosyandu = Posyandu::get();
        $posyanduChart = $posyanduChart->build();
        $pasienBulananChart = $pasienBulananChart->build();
        $genderChart = $genderChart->build();

        return view('admin.dashboard', compact('title', 'posyanduChart', 'kelompokPosyandu', 'pasienBulananChart', 'genderChart'));
    }
}
