@extends('layouts.backend.app', [
    'title' => 'Kategori Donasi',
    'contentTitle' => 'Kategori Donasi',
])
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
    <x-alert></x-alert>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('Kelola-Donasi') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <body>
                            
                            @foreach ($daftarkategori as $kategori)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kategori->judul }}</td>
                                <td><img src="{{ asset('storage/'. $kategori->gambar) }}" alt="" width="100" srcset=""></td>
                                
                                <td class="row">
                                    
                                    <form method="POST" onsubmit="return confirm('Apakah Anda Yakin');" action="{{ route('donasi.destroy',$kategori->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-2"><i
                                        class="fas fa-trash fa-fw"></i></button>
                                    </form> &emsp;
                                    <a href="{{ route('donasi.edit',$kategori->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-fw"></i></a>
                                </td>
                            </tr>   
                            @endforeach  
                        </body>

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <!-- DataTables -->
    <script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.js">
    </script>
    <script>
        $(function() {
            $("#dataTable1").DataTable();
        });
    </script>
@endpush
