@extends('layouts.backend.app', [
    'title' => 'Catatan Pengeluaran Donasi',
    'contentTitle' => 'Tambah Catatan Pengeluaran Donasi',
])

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
@endpush

<!-- Modal -->
@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="card-body">
                    {{-- @if(count($daftardonasi))
                    @foreach ($daftardonasi as $donasi) --}}
                    <form action="{{ route('donasi.pengeluaran.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="nama">Penanggung Jawab Pengeluaran</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama" required>
                            {{-- @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif --}}
                        </div>
                        <input id="jenis_id" type="text" name="jenis_id" value="2" hidden>
                        <div class="form-group">
                            <label for="tanggal" class="form-label"><strong>Input Tanggal</strong></label>
                            <input id="tanggal" type="datetime-local" class="form-control" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="keluar"> Nominal </label>
                            <input type="text" class="form-control" name="keluar" id="keluar" placeholder="Masukkan nominal" onkeyup="sum();">
                            {{-- @if ($errors->has('keluar'))
                                <span class="text-danger">{{ $errors->first('keluar') }}</span>
                            @endif --}}
                        </div>
                        <div class="form-group">
                            <label for="ket"> Keterangan </label>
                            <input type="text" class="form-control" name="ket" id="ket" placeholder="Masukkan Keterangan">
                            {{-- @if ($errors->has('ket'))
                                <span class="text-danger">{{ $errors->first('ket') }}</span>
                            @endif --}}
                        </div>
                        <div class="col-lg-6">
                            {{-- <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="@error('gambar') is-invalid @enderror dropify form-control"
                                    data-height="250" required>
                            </div> --}}
                            <div class="form-group">
                                <label for="bukti_donasi"> Bukti Donasi </label>
                                <input type="file" class="form-control" name="bukti_donasi" placeholder="Bukti Donasi">
                                {{-- @if ($errors->has('bukti_donasi'))
                                    <span class="text-danger">{{ $errors->first('bukti_donasi') }}</span>
                                @endif --}}
                            </div>
                        <div class="form-group">
                            <label for="jumlah_saldo" class="form-label"><strong>Saldo</strong></label>
                            <input id="jumlah_saldo" type="text" class="form-control" name="jumlah_saldo" value="{{ $pengeluaran->saldo }}"
                             onkeyup="sum();" placeholder="saldo">
                        </div>   
                        <div class="form-group">
                            <label for="jumlah" class="form-label"><strong>Jumlah Saldo</strong></label>
                            <input id="saldo" type="text" class="form-control" name="saldo"
                                placeholder="Saldo Saat Ini">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">UPLOAD</button>
                        </div>
                    </div>
                    </form>
                {{-- @endforeach
                @endif --}}
            </div>
        </div>
    </div>
@stop

{{-- <script>
    // function sendValue(title) {
    //     $('#donasiModalLabel').html(title);
    // }
</script> --}}
<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('jumlah_saldo').value;
        var txtSecondNumberValue = document.getElementById('keluar').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('saldo').value = result;
        }
    }
</script>


<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
