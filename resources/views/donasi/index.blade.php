@extends('layouts.frontend.app', [
    'title' => 'Donasi',
])
@section('content')
    <div class="regular-page-area">
        <div class="container mb-3">
            <div class="row ">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <h3>Donasi</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                @foreach ($katDonasi as $item)
                    <div class="col-10 col-md-4 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                {{ $item->judul }}
                                <span class="badge badge-danger float-right"></span>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $item->gambar) }}"data-sizes="auto">
                            </div>
                            <div class="d-flex align-items-end h-100" style="z-index: 89">
                                <button type="button" value="{{ $item->judul }}" onclick="sendValue(this.value)"
                                    data-toggle="modal" data-target="#donasiModal" class="btn btn-primary w-100"
                                    style="height: 40px">Donasi Sekarang</button>
                            </div>
                        </div>
                    </div>
                @endforeach


    </div>
        </div>
        <!-- Modal -->
        @foreach($daftardonasi as $donasi)
        <div class="modal fade" id="donasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="donasiModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <x-alert></x-alert>
                    <form method="POST" action="{{ route('open-donasi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="nama"> Nama Donatur </label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" id="text"
                                    placeholder="Masukkan Nama" required>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <input id="jenis_id" type="text" name="jenis_id" value="1" hidden>
                            <div class="form-group">
                                <label for="tanggal" class="form-label">Inpute Tanggal></label>
                                <input id="tanggal" type="datetime-local" class="form-control" name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="No_Telepon"> No Telepon </label>
                                <input type="text" class="form-control" name="telp" id="telp" placeholder="No Telepon">
                                @if ($errors->has('telp'))
                                    <span class="text-danger">{{ $errors->first('telp') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="Jumlah"> Nominal </label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Nominal" onkeyup="sum();">
                                {{-- @if ($errors->has('jumlah'))
                                    <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                                @endif --}}
                            </div>

                            <div class="form-group">
                                <label for="file"> Bukti Donasi </label>
                                <input type="file" class="form-control" name="bukti_donasi" placeholder="Bukti Donasi">

                                @if ($errors->has('bukti_donasi'))
                                    <span class="text-danger">{{ $errors->first('bukti_donasi') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="pesan"> Keterangan </label>
                                <input type="text" class="form-control" name="pesan" placeholder="Keterangan" id ="pesan">

                                @if ($errors->has('pesan'))
                                    <span class="text-danger">{{ $errors->first('pesan') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jumlah_saldo" class="form-label" hidden>Saldo</label>
                                <input id="jumlah_saldo" type="text" class="form-control" name="jumlah_saldo" value="{{ $donasi->saldo }}"
                                 onkeyup="sum();" placeholder="saldo" hidden>
                            </div>   
                            <div class="form-group">
                                <label for="jumlah" class="form-label" hidden>Jumlah Saldo</label>
                                <input id="saldo" type="text" class="form-control" name="saldo"
                                    placeholder="Saldo Saat Ini" hidden>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function sendValue(title) {
            $('#donasiModalLabel').html(title);
        }
    </script>


    </div>
    </div>
@stop

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@if ($errors->any() || ($flash = session('success')))
    <script>
        $(document).ready(function() {
            $('#donasiModal').modal('show');

        });
    </script>
@endif

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('jumlah_saldo').value;
        var txtSecondNumberValue = document.getElementById('jumlah').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('saldo').value = result;
        }
    }
</script>
