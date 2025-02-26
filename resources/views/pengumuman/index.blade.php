<!-- @extends('layouts.frontend.app', [
    'title' => 'Data Guru dan Santri',
])
@section('content')

<!-- Events Thumb -->
{{-- <div class="col-4 col-md-8 col-lg-4"> --}}
    <div class="col-12">
        <div class="row">
            @foreach ($pengumuman as $pn)
            <div class="col-lg-4 col-md-8 mb-3 text-center d-flex justify-content-evenly">
                <div class="card">
                    <div class="events-thumb">
                        {{-- <img class="shadow p-3 bg-white rounded" style="width=400px; height=500px;" class
                            src="{{ asset('storage/' . $pn->Gambar) }}" data-sizes="auto"> --}}
                        <div class="img-fluid d-flex mx-auto" style="height:300px; width:400px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $pn->Gambar) }}" alt="">
                        </div>
                        <div class="d-flex align-items-end h-100" style="z-index: 89"
                            data-orig-sizes="(max-width: 1024px) 100vw, (max-width: 640px) 100vw, 400px"sizes="260px">
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('pengumuman.show', $pn->slug) }}"
                            class="btn btn-primary btn-sm col-lg mb-1">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>

@stop -->
