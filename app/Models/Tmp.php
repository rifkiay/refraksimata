<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmp extends Model
{
    use HasFactory;

    protected $table = 'tb_tmp';
    protected $fillable = [
        'kode_gejala',
        'kode_penyakit',
        'mb',
        'md'
    ];
    public $timestamps = true;

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit', 'kode_penyakit');
    }
}
