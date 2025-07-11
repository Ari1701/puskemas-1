@extends('layouts.main')

@include('partials.navbar')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Selamat Datang</h1>
            <h2>Di Puskesmas Sambi</h2>
            <a href="/antrian" class="btn-get-started scrollto">Ambil Antrian</a>
        </div>
    </section><!-- End Hero -->
    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Sistem Antrian Online</h3>
                            <p>
                                Ini adalah Sistem Informasi Puskesmas Sambi dimana setiap pengunjung dapat
                                mengambil antrian sesuai poliklinik terlebih dahulu dari rumah
                            </p>
                            <div class="text-center">
                                <a href="/antrian" class="more-btn">Ambil Antrian <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-plus-medical"></i>
                                        <h4>Poli Umum</h4>
                                        <p>Pelayanan Poli Umum adalah pelayanan pemeriksaan medis berupa pemeriksaan
                                            kesehatan, pengobatan, dan edukasi kepada pasien dalam rangka meningkatkan
                                            kesehatan perorangan dan masyarakat.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-dna"></i>
                                        <h4>Poli Gigi</h4>
                                        <p>Pelayanan Kesehatan Gigi dan Mulut merupakan pelayanan kesehatan gigi dan mulut
                                            berupa pemeriksaan kesehatan gigi dan mulut, pengobatan dan pemberian tindakan
                                            medis dasar kesehatan gigi dan mulut.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bxs-first-aid"></i>
                                        <h4>Poli Nifas / PNC</h4>
                                        <p>Poli Nifas atau PNC menangani perawatan kesehatan bagi ibu setelah
                                            melahirkan. Pelayanan ini mencakup pemantauan kesehatan ibu pasca
                                            melahirkan, perawatan luka, konseling, dan edukasi terkait perawatan bayi
                                            baru lahir.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-bed"></i>
                                        <h4>Poli Lansia</h4>
                                        <p>Ini adalah poli kesehatan yang khusus menangani kebutuhan kesehatan para lansia. Pelayanan di poli ini dirancang untuk mendukung
                                            kesehatan dan kesejahteraan mereka.</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-child"></i>
                                        <h4>Poli Balita</h4>
                                        <p>Poli Balita adalah unit pelayanan kesehatan yang fokus pada perawatan dan
                                            pemantauan kesehatan anak-anak balita. Pelayanan di poli ini mencakup
                                            pemeriksaan rutin, imunisasi, serta penanganan penyakit umum pada balita.</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bxs-shield-plus"></i>
                                        <h4>Poli KIA & KB</h4>
                                        <p>Poli KIA (Kesehatan Ibu dan Anak) dan KB (Kelahiran Berencana) memberikan layanan
                                            terkait kehamilan, persalinan, dan perawatan pasca melahirkan. Selain itu, poli
                                            ini juga menyediakan informasi dan layanan terkait keluarga berencana.</p>
                                    </div>
                                </div>                               
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->



        <!-- ======= Counts Section ======= -->
        <!-- <section id="counts" class="counts">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fas fa-user-md"></i>
                            <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Doctors</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="far fa-hospital"></i>
                            <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Departments</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fas fa-flask"></i>
                            <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Research Labs</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        
        <!-- End Counts Section -->
        <section id="berita" class="berita">
            <div class="container">
                <div class="section-title">
                    <h2>Berita Terbaru</h2>
                </div>
                <div class="row">
                    @forelse($beritas as $berita)
                        <div class="col-lg-4 d-flex align-items-stretch mb-4">
                            <div class="card w-100">
                                @if($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="Gambar Berita">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $berita->judul }}</h5>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($berita->isi, 100) }}</p>
                                    <a href="{{ route('umum.berita.show', $berita->id) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada berita terbaru.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- ======= Contact Section ======= -->


        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Kontak</h2>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi</h4>
                                <p>Sambi, Boyolali, Jawa Tengah</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email</h4>
                                <p>puskemassambi@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telepon</h4>
                                <p>(0272)-</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5"
                                        placeholder="Pesan" required>{{ old('message') }}</textarea>
                            </div>

                            <div class="my-3">
                                @if (session('success'))
                                    <div class="sent-message">{{ session('success') }}</div>
                                @endif

                                @if ($errors->any())
                                    <div class="error-message">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </section>



    </main><!-- End #main -->
@endsection

@include('partials.footer')
