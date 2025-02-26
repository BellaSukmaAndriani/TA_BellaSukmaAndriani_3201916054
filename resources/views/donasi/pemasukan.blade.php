@extends('layouts.frontend.app', [
    'title' => 'Donasi',
])
@section('content')
    <div class="container mb-3">
        <div class="row ">
            <div class="col-12">
                <div class="text-center mb-3">
                    <h3>Donasi</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
        {{-- @foreach ($katDonasi as $daftardonasi) --}}
        <form method="POST" action="{{ route('open-donasi.store' ) }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label for="nama"> Nama Donatur </label>
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" id="nama"
                        placeholder="Masukkan Nama" required>
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            <input id="jenis_id" type="text" name="jenis_id" value="1" hidden>   
            <div class="form-group">
                <label for="tanggal" class="form-label">Inpute Tanggal</label>
                <input id="tanggal" type="datetime-local" class="form-control" name="tanggal">
            </div>
                <div class="form-group">
                    {{-- <label for="nama"> Tanggal </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" id="text"
                            placeholder="00/00/0000" required>
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                        @endif
                    </div> --}}

                <div class="form-group">
                    <label for="No Telepon"> No Telepon </label>
                    <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan Nomor">
                    @if ($errors->has('telp'))
                        <span class="text-danger">{{ $errors->first('telp') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="jumlah"> Nominal </label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan nominal"  onkeyup="sum();">
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
                {{-- <div class="form-group">
                    <label for="keterangan"> Keterangan </label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                    @if ($errors->has('keterangan'))
                        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                    @endif
                </div> --}}
                {{-- <div class="form-group">
                    <label for="jumlah_saldo" class="form-label">Saldo</label>
                    <input id="jumlah_saldo" type="text" class="form-control" name="jumlah_saldo"
                        value="{{ $pemasukan->saldo }}" onkeyup="sum();" placeholder="Jumlah Saldo">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="jumlah" class="form-label">Jumlah Saldo</label>
                    <input id="saldo" type="text" class="form-control" name="saldo"
                        placeholder="Saldo Saat Ini">
                </div> --}}

            </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
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