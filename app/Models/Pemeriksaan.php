<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $fillable = [
        'tanggal',
        'no_lab',
        'pasien_id',
        'dokter_id',
        'rm',
        'asal_jaringan',
        'diagnosa',
        'tanggal_spesimen_terima',
        'tanggal_spesimen_jawab',
        'makroskopis',
        'mikroskopis',
        'status',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}
