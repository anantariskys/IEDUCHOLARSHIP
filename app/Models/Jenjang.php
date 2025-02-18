<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }
}