@extends('layouts.frontend.app', [
    'title' => 'Kegiatan',
])
@section('content')
    <!-- ##### Blog Area Start ##### -->
    <section class="regular-page-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>KEGIATAN</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($artikel as $art)
                    <div class="col-md-6 mb-5">
                        <div class="card">
                            <div class="card-header">
                                {{ $art->judul }}
                                <span class="badge badge-danger float-right">by : {{ $art->user->name }}</span>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('uploads/img/artikel/' . $art->thumbnail) }}"
                                    style="max-width:100%; object-fit: cover; object-position: center;">

                                <div class="card-text mt-3">
                                    {!! Str::limit($art->deskripsi) !!}
                                </div>

                                <a href="{{ route('artikel.show', $art->slug) }}"
                                    class="btn btn-primary btn-sm">Selengkapnya</a>
                                <a
                                    href="{{ asset('kajian.download/' . $art->thumbnail) }}"class="btn btn-primary btn-sm float-right">Download</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg pagination pagination-center justify-content-center">
                    {{ $artikel->appends(Request::all())->links() }}
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
@stop
