<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDonasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul', 'gambar'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function pemasukan($id)
    // {
    //     // return view('donasi.index', [
    //     //     'pemasukan' => Donasi::find($id),
    //     //     'jenis'     => Jenis::all()
    //     // ]);
    //     $pemasukan = Donasi::all();
    //     return view('donasi.index', compact('pemasukan'));
    // }
    public function donasi()
    {
        return $this->hasMany(Donasi::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
