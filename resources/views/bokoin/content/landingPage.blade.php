@extends('bokoin.layout.layout')

@section('content')

@include('bokoin.component.navbar')

<div id="beranda" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1500" data-bs-wrap="true">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/gedungsate.jpg" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Gedung Sate</h1>
                    <p>Jelajahi Bandung</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/Waisak 2024.jpg" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Hari Raya Waisak 2024</h1>
                    <p>Segenap warga Bojongkoneng mengucapkan Selamat Hari Raya Waisak 2024</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/Idul Adha.jpg" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Hari Idul Adha 2024</h1>
                    <p>Segenap warga Bojongkoneng mengucapkan Selamat Hari Idul Adha 2024</p>
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="/images/Banner 17 Agustus.jpg" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Hari Raya 17 Agustus 2024</h1>
                    <p>Segenap warga Bojongkoneng mengucapkan Selamat Hari Raya 17 Agustus 2024</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">Ketua RT</h2>
    <div class="row">
        @foreach ($rt as $drt)
        <div class="col-md-90 mb-80">
            <div class="card">
                <div class="row g-6">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('image/' . $drt->image) }}" class="rounded-circle img-thumbnail" alt="foto ketua rt" style="width: 180px; height: 180px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title fs-5 mb-4">Nama RT:</h5>
                                <p class="card-text fs-5 ms-2 mb-4">{{ $drt->nama_rt }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5 class="card-title fs-5 mb-4">Nomor Telepon:</h5>
                                <p class="card-text fs-5 ms-2 mb-4">{{ $drt->notelp_rt }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5 class="card-title fs-5 mb-4">Alamat RT:</h5>
                                <p class="card-text fs-5 ms-2 mb-4">{{ $drt->alamat_rt }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container px-4 py-5" id="data">
    <h2 class="pb-2 border-bottom">Data</h2>
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Kepala Keluarga</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Rumah</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Penduduk</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
            </div>
        </div>
    </div>
</div>

<div class="container px-4 py-5" id="informasi">
    <h2 class="pb-2 border-bottom">Informasi</h2>
    <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
        @foreach ($datainformasi as $dti)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">{{$dti->nama_kegiatan}}</h2>
                    <p class="card-text">{{$dti->deskripsi}}</p>
                </div>
                <div class="card-footer">
                    @if ($dti->pdf)
                    <a href="{{asset('pdf/'. $dti->pdf) }}" target="_blank">Lihat Selengkapnya</a>
                    @else
                    No PDF uploaded
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container px-4 py-5" id="petasitus">
    <h2 class="pb-2 border-bottom">Peta Situs</h2>
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4759.889215127547!2d107.64223869525358!3d-6.89171546904251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e77475f4f67d%3A0xdb3507fd5b2da0be!2sJl.%20Bojong%20Koneng%2C%20Sukapada%2C%20Kec.%20Cibeunying%20Kidul%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1715836934557!5m2!1sid!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Bojongkoneng</h1>
            <p>Sebuah Desa atau Jalan yang berada di tengah
                Kota Bandung. Tepatnya di Kelurahan Sukapada,
                Kecamatan Cibeunying Kidul, Kota Bandung,
                Jawa Barat.</p>
        </div>
    </div>
</div>

@include('bokoin.component.footers')

@endsection