@extends('layouts.backend.app', [
    'title' => 'Dashboard',
    'contentTitle' => 'Dashboard',
])
@section('content')
    <!-- Small boxes (Stat box) -->
    @can('admin1')
        <div class="row justify-content-center  ">
            <div class="col-lg-4 col-7">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>@count('users')</h3>

                        <p>Admin</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan


        <div class="col-lg-4 col-7 ">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>@count('artikel')</h3>

                    <p>Kegiatan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="{{ route('admin.artikel.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        @can('admin1')
            <div class="col-lg-4 col-7">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>@count('pengumuman')</h3>

                        <p>Data Guru dan Santri</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <a href="{{ route('admin.pengumuman.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    @endcan

    {{-- <div class="col-lg-4 col-7 ">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>@count('kelola-donasi')</h3>

                <p>Donasi</p>
            </div>
            <div class="icon">
                <i class="fas fa-image"></i>
            </div>
            <a href="{{ route('admin.kelola-donasi.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}

    {{-- <div class="col-lg-3 col-6">
    <div class="small-box " style="background-color: crimson">
      <div class="inner">
        {{-- <h3>@count('kelola-ebook-kitab-ulama')</h3> --}}

    {{-- <p>Jenis Kajian</p>
    </div>
    <div class="icon">
        <i class="fas fa-info"></i>
    </div>
    <a href="{{ route('admin.kategori-artikel.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div> --}}


    {{-- Donasi --}}
    {{-- <div class="col-lg-3 col-6">
    <div class="small-box "  style="background-color:yellow">
      <div class="inner">
        <h3>@count('kelola-ebook-kitab-ulama')</h3>

        <p>Tanya Jawab</p>
      </div>
      <div class="icon">
        <i class="nav-icon fas fa-inbox"></i>
      </div>
      <a href="{{ route('kelola-tanyajawab') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> --}}


    {{-- <div class="col-lg-3 col-6">
  <div class="small-box " style="background-color:lime">
    <div class="inner">
      <h3>@count('kelola-ebook-kitab-ulama')</h3>

      <p>Ebook Ulama</p>
    </div>
    <div class="icon">
      <i class="fas fa-info"></i>
    </div>
    <a href="{{ route('kelola-ebook') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div> --}}


    {{-- <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color:aqua">
            <div class="inner">
                <h3>@count('kelola-ebook-kitab-ulama')</h3>

                <p>Hub Kami</p>
            </div>
            <div class="icon">
                <i class="fas fa-info"></i>
            </div>
            <a href="{{ route('contact.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}


    {{-- <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color:blue">
            <div class="inner">
                <h3>@count('kelola-ebook-kitab-ulama')</h3>

                <p>Donasi</p>
            </div>
            <div class="icon">
                <i class="fas fa-info"></i>
            </div>
            <a href="{{ route('Kelola-Donasi') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}

    {{-- penutup row --}}
    </div>


    <!-- ./col -->

    <!-- /.row >
@stop
