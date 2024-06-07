<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'tb_gejala';
    protected $primaryKey = 'kode_gejala';
    public $incrementing = false;
    protected $fillable = [
        'kode_gejala',
        'nama_gejala'
    ];
    public $timestamps = true;
}
