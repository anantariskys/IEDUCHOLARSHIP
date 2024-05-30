<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'beasiswa_id'];

    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class);
    }
}