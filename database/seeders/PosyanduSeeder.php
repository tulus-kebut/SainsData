<?php

namespace Database\Seeders;

use App\Models\Posyandu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosyanduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Posyandu::create([
            'kode_posyandu' => 'PYD001', 
            'nama_posyandu' => 'Bunga Melati',
        ]);
        Posyandu::create([
            'kode_posyandu' => 'PYD002', 
            'nama_posyandu' => 'Buin Jeringo',
        ]);
        Posyandu::create([
            'kode_posyandu' => 'PYD003', 
            'nama_posyandu' => 'Bunga Cermai',
        ]);
        Posyandu::create([
            'kode_posyandu' => 'PYD004', 
            'nama_posyandu' => 'Bunga Kamboja',
        ]);
        Posyandu::create([
            'kode_posyandu' => 'PYD005', 
            'nama_posyandu' => 'Goal Manis',
        ]);
        Posyandu::create([
            'kode_posyandu' => 'PYD006', 
            'nama_posyandu' => 'Pisang Kemang',
        ]);
    }
}
