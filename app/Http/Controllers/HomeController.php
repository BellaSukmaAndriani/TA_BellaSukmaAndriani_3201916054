<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\Ebook;
use App\Models\Jenis;
use App\Models\KategoriDonasi;
use App\Models\Pengumuman;
use App\Models\TanyaJawab;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['user', 'kategoriArtikel'])->latest()->take(3)->get();
        $pengumuman = Pengumuman::with(['user'])->latest()->take(4)->get();
        $ebooks = Ebook::with(['user'])->latest()->take(3)->get();
        $katDonasi = KategoriDonasi::with(['user'])->latest()->take(3)->get();
        $daftardonasi = Donasi::all();
        $pemasukan = Donasi::all();
        // $tjb = TanyaJawab::with(['user'])->latest()->take(3)->get();
        return view('home.index', [
            'artikel' => $artikel,
            'pengumuman' => $pengumuman,
            'ebooks' => $ebooks,
            'katDonasi' => $katDonasi,
            'donasi' => $daftardonasi,
            'pemasukan' => $pemasukan
            // 'tjb' => $tjb,
        ]);
    }
    public function login()
    {
        return view('admin.index');
    }

    public function about()
    {
        $ebooks =  Ebook::all();
        return view('home.ebook', compact('ebooks'));
    }

    public function donasi()
    {
        $katDonasi =  KategoriDonasi::all();
        // $pemasukan =  Donasi::all();
        $daftardonasi =  Donasi::all();
        return view('donasi.index', compact('katDonasi', 'daftardonasi'));
    }

    // public function pemasukan($id)
    // {
    //     // return view('donasi.index', [
    //     //     'pemasukan' => Donasi::find($id),
    //     //     'jenis'     => Jenis::all()
    //     // ]);
    //     $pemasukan = Donasi::all();
    //     $daftardonasi =  Donasi::all();
    //     return view('donasi.index.pemasukan', compact('pemasukan','daftardonasi'));
    // }
    // public function daftardonasi($id)
    // {
    //     // return view('donasi.index', [
    //     //     'pemasukan' => Donasi::find($id),
    //     //     'jenis'     => Jenis::all()
    //     // ]);
    //     $daftardonasi = Donasi::all();
    //     return view('donasi.index', compact('daftardonasi'));
    // }
}
