@extends('layouts.backend.app', [
    'title' => 'Pesan, Kritik dan Saran',
    'contentTitle' => 'Pesan, Kritik dan Saran dari Pengunjung',
])
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    @include('components.alert')
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $dc as $contact)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $contact->nama }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->pesan }}</td>
                                <td>
                                    <form method="POST" onsubmit="return confirm('Apakah Anda Yakin');" action="{{ route('contact.destroy',$contact->id) }}">
                                    @csrf @method('DELETE') <button type="submit"  class="btn btn-danger btn-sm ml-2"><i
                                        class="fas fa-trash fa-fw"></i></button>
                                    </form>
                                    
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
