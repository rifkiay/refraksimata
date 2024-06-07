<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'tb_pasien';
    protected $primaryKey = 'kode_pasien';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'umur',
        'tgl_diagnosa',
        'gejala_dipilih',
        'md',
        'persentase_hasil',
        'gambar',
        'kode_penyakit',
        'nama_penyakit',
        'hasil'
    ];
    public $timestamps = true;

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit', 'kode_penyakit');
    }
}
