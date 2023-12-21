<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'posyandu';
    protected $primaryKey = 'id';

    protected $fillable = ['kode_posyandu', 'nama_posyandu'];

    public function stunting() 
    {
        return $this->hasMany('App\Models\Stunting', 'kode_posyandu', 'kode_posyandu');
    }
}
