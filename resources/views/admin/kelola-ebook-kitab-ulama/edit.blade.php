@extends('layouts.backend.app', [
    'title' => 'Edit Ebook',
    'contentTitle' => 'Edit Ebook',
])

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
@endpush

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kelola-ebook') }}" class="btn btn-success btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('ebook.update', $ebookbyid->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input value="{{ $ebookbyid->judul }}" required="" type="" name="judul" placeholder="" class="form-control title">
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Cover</label>
                            <small class="text-danger">*Klik Jika Ingin Diubah</small>
                            <input type="file" name="cover" class="dropify form-control"
                                data-height="250">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>file</label>
                            <small class="text-danger">*Klik Jika Ingin Diubah</small>
                            <input type="file" name="file" class="dropify form-control"
                                data-height="250" data-allowed-file-extensions="pdf">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">UPLOAD</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
@stop

@push('js')
    <script type="text/javascript" src="{{ asset('plugins/summernote') }}/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(".summernote").summernote({
            height: 500,
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData(
                        'Text');
                    e.preventDefault();
                    bufferText = bufferText.replace(/\r?\n/g, '<br>');
                    document.execCommand('insertHtml', false, bufferText);
                }
            }
        })

        $(".summernote").on("summernote.enter", function(we, e) {
            $(this).summernote("pasteHTML", "<br><br>");
            e.preventDefault();
        });
    </script>
@endpush
