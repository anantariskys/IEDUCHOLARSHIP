<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'asal_negara',
        'mulai_tanggal',
        'deadline_tanggal',
        'syarat_ketentuan',
        'link_pendaftaran',
        'gambar',
        'tipe_id',
        'jenjang_id',
    ];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }
}