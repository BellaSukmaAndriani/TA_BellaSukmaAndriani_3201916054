<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
         'nama', 'telp', 'jenis_id', 'tanggal', 'jumlah', 'jumlah_saldo', 'keluar', 'ket' ,'bukti_donasi', 'saldo'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    // public function donasi()
    // {
    //     $katDonasi =  KategoriDonasi::all();
    //     return view('donasi.index', compact('katDonasi'));
    // }
}
