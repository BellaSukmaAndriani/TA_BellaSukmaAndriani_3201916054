@extends('layouts.frontend.app', [
    'title' => 'Kontak Kami',
])
@section('content')
    <section class="contact-area">
        <div class="container">
            <div class="row mb-4">
                <!-- Contact Info -->
                <div class="col-12 col-lg-6">
                    <div class="contact--info mt-50">
                        <h4>Info Kontak</h4>
                        <ul class="contact-list">
                            <li>
                                <h6><i class="fa fa-phone fa-fw" aria-hidden="true"></i> No Telp</h6>
                                <h6>085754564211/08111609366</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-instagram fa-fw" aria-hidden="true"></i> Instagram</h6>
                                <h6>@pesantren_elamany</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-facebook fa-fw" aria-hidden="true"></i> Facebook</h6>
                                <h6>Pesantren Tahfidz El'amani</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-youtube fa-fw" aria-hidden="true"></i> Youtube</h6>
                                <h6>Pesantren El-Amani</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-map-pin fa-fw" aria-hidden="true"></i></h6>
                                <h6>Jl.Dr.Wahidin S. Komplek Batara Indah 1 RT 001/025. Kel.Sungai Jawi. Kec. Kota
                                    Pontianak, Kalimantan Barat</h6>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="contact--info mt-50 mb-50">
                        <h4>Tinggalkan Pesan, Kritik dan Saran</h4>
                        <form method="POST" action="{{ route('contact.store') }}">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="text"
                                            placeholder="Nama" required>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="isi" id="message" cols="30" rows="5" placeholder="Pesan"></textarea>
                                        <small id="emailHelp" class="form-text text-muted">Maksimal kirim 5 kali dengan
                                            email yang sama</small>
                                        @error('isi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @include('components.alert')
                                    </div>
                                </div>
                                @csrf
                                <div class="col-12">
                                    <button class="btn clever-btn w-100" type="submit">Kirim</button>
                                </div>
                                <div class="">
                                    <div class="row ">

                                    </div>
                                </div>
                            </div>

                            <!-- </form> -->
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </section>
@stop
