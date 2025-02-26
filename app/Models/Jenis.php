<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use donasi;

class Jenis extends Model
{
    use HasFactory;
    protected $table   = 'jenis';
    protected $guarded = ['id'];

    public function donasi()
    {
        return $this->hasMany(Donasi::class);
    }
}