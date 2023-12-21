<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'dusun';
    protected $primaryKey = 'id';

    protected $fillable = ['kode_dusun', 'nama_dusun'];

    public function stunting() 
    {
        return $this->hasMany('App\Models\Stunting', 'kode_dusun', 'kode_dusun');
    }
}
