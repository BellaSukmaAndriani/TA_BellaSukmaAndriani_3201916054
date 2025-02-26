@extends('layouts.backend.app', [
    'title' => 'Laporan Donasi',
    'contentTitle' => 'Laporan Donasi',
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
              
                    <a href="{{ route('donasi.create') }}" class="btn btn-primary btn-sm">Tambah Kategori Donasi</a> &emsp;
                    <a href="{{ route('donasi.kategori') }}"class="btn btn-primary btn-sm">Ketegori Donasi</a>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>Tanggal</th> --}}
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>No.Telp</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Ket User</th>
                                <th>Ket</th>
                                <th>Bukti</th>
                                <th>Saldo Akhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <body>
                            @foreach ($daftardonasi as $donasi)
                            {{-- @if($donasi->jenis_id != '2') --}}
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $donasi->tanggal }}</td>
                                    <td>{{ $donasi->nama }}</td>
                                    <td>{{ $donasi->telp }}</td>
                                    {{-- <td>{{ $donasi->jumlah }}</td> --}}
                                    <td>Rp. {{ number_format($donasi->jumlah, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($donasi->keluar, 0, ',', '.') }}</td>
                                    <td>{{ $donasi->pesan }}</td>
                                    <td>{{ $donasi->ket }}</td>
                                    <td><img src="{{ asset('donasi-img/' . $donasi->bukti_donasi) }}"
                                            alt="" width="100"></td>
                                    <td>Rp. {{ number_format($donasi->saldo, 0, ',', '.' ) }}</td>

                                    <td class="row">
                                        <form method="POST" onsubmit="return confirm('Apakah Anda Yakin');"
                                            action="{{ route('has-donasi.destroy', $donasi->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ml-2 mr-2"><i
                                                    class="fas fa-trash fa-fw"></i></button>
                                        </form>
                                        <a href="/admin/kelola-donasi/pengeluaran/create/{{ $donasi->id }}"
                                            class="btn btn-outline-danger mt-2">Pengeluaran</a>
                                    </td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </body>

                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('jumlah').value;
            var txtSecondNumberValue = document.getElementById('keluar').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('saldo').value = result;
            }
        }
    </script> --}}
    <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('jumlah_saldo').value;
            var txtSecondNumberValue = document.getElementById('jumlah').value;
            var txtThirdNumberValue = document.getElementById('keluar').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue)  + parseInt(txtThirdNumberValue);
            if (!isNaN(result)) {
                document.getElementById('saldo').value = result;
            }
        }
    </script>
    
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
