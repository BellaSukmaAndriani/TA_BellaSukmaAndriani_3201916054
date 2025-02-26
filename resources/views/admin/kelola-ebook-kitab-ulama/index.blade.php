@extends('layouts.backend.app', [
    'title' => 'Data Guru dan Santri',
    'contentTitle' => 'Kelola Data Guru dan Santri',
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
                    <a href="{{ route('ebook.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th>Cover</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eb as $tambah)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $tambah->judul }}</td>
                                    <td>{{ $tambah->file }}</td>
                                    <td><img src="/storage/ebook/covers/{{ $tambah->cover }}" width="100"></td>
                                    <td class="row" width="100">
                                        <form method="POST" onsubmit="return confirm('Apakah Anda Yakin');"
                                            action="{{ route('ebook.destroy', $tambah->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ml-2 mr-2"><i
                                                    class="fas fa-trash fa-fw"></i></button>
                                        </form>
                                        <a href="{{ route('ebook.edit', $tambah->id) }}" class="btn btn-primary btn-sm"><i
                                                class="fas fa-edit fa-fw"></i></a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
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
