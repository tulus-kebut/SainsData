<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'stunting';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'kelamin', 'nama_ortu', 'tanggal_lahir', 'kode_posyandu', 'kode_dusun', 'usia_ukur'];

    public function posyandu()
    {
        return $this->belongsTo('App\Models\Posyandu', 'kode_posyandu', 'kode_posyandu');
    }

    public function dusun()
    {
        return $this->belongsTo('App\Models\Dusun', 'kode_dusun', 'kode_dusun');
    }
}
