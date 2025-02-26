@extends('layouts.frontend.app', [
    'title' => 'Home',
])
@section('content')

    <div class="carousel-inner">
        {{-- menambah gambar slider --}}
        <div class="carousel-item active">
            <img src="img/bg1.jpg" width="800%">
        </div>

    <div class="col-md-12 text-center mx-auto mt-5">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Nama dan Kedudukan</h4>
            </div>
            <div class="card-body">
            <p style="text-align: justify">Lembaga pendidikan ini bernama Pondok Pesantren Tahfidz Al Quran El 'Amani Pontianak yang bernaung
                dibawah yayasan El 'Amani. Kedudukannya di Jalan Dr. Wahidin S. Komplek Batara Indah 1 Blok M - Gg. Usman Gani. Kepengurusan Yayayan
                El 'Amani yang di Akta Notaris-kan oleh Rahmaniar Nurul Hidayat, SH, M.Kn No.1. Tanggal 7 Mei 2012 dan disahkan oleh SK. Menkumham RI
                No. AHU--4026.AH.01.04. Tahun 2012
            </p>
            {{-- <a href="/profil"><button style="border-color:black;color:rgb(0, 0, 0)">Selengkapnya</button></a> --}}
            </div>
        </div>
    </div>
@stop
