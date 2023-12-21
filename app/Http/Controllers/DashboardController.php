<?php

namespace App\Http\Controllers;

use App\Charts\pasienBulananChart;
use App\Charts\PosyanduChart;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(PosyanduChart $posyanduChart, pasienBulananChart $pasienBulananChart)
    {
        $title = 'Dashboard';

        $kelompokPosyandu = Posyandu::get();
        // dd($kelompokPosyandu);
        $posyanduChart = $posyanduChart->build();
        $pasienBulananChart = $pasienBulananChart->build();
        return view('admin.dashboard', compact('title', 'posyanduChart', 'kelompokPosyandu', 'pasienBulananChart'));
    }
}
