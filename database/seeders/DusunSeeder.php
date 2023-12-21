<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dusun::create([
            'kode_dusun' => 'DSN001', 
            'nama_dusun' => 'Pelat 1',
        ]);

        Dusun::create([
            'kode_dusun' => 'DSN002', 
            'nama_dusun' => 'Pelat 2',
        ]);

        Dusun::create([
            'kode_dusun' => 'DSN003', 
            'nama_dusun' => 'Brang Pelat',
        ]);

        Dusun::create([
            'kode_dusun' => 'DSN004', 
            'nama_dusun' => 'Uma Buntar',
        ]);
    }
}
