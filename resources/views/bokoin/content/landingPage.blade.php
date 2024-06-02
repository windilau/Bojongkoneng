@extends('bokoin.layout.layout')

@section('content')

@include('bokoin.component.navbar')

<div id="beranda" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1500" data-bs-wrap="true">
    <div id="carouselExampleCaptions" class="carousel slide carousel-custom">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/gedungsate.jpg" class="d-block w-100" alt="Gedung Sate">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Gedung Sate</h1>
                        <p>Jelajahi Bandung</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/Waisak 2024.jpg" class="d-block w-100" alt="Hari Raya Waisak 2024">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Hari Raya Waisak 2024</h1>
                        <p>Segenap warga Bojongkoneng mengucapkan Selamat Hari Raya Waisak 2024</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/Idul Adha.jpg" class="d-block w-100" alt="Hari Idul Adha 2024">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Hari Idul Adha 2024</h1>
                        <p>Segenap warga Bojongkoneng mengucapkan Selamat Hari Idul Adha 2024</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/Banner 17 Agustus.jpg" class="d-block w-100" alt="Hari Raya 17 Agustus 2024">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Hari Raya 17 Agustus 2024</h1>
                        <p>Segenap warga Bojongkoneng mengucapkan Selamat Hari Raya 17 Agustus 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="informasi-section" id="data">
    <div class="container-fluid px-4">
        <h2 class="pb-2 border-bottom border-dark mb-4">Data Penduduk</h2>
        <div class="row justify-content-center">
            @foreach ($rt as $drt)
            <div class="col-md-6 mb-5">
                <div class="card mx-auto shadow-only rounded" style="max-width: 1200px !important;">
                    <div class="row g-0">
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
            <div class="row justify-content-center">
                <div class="col-md-4 mb-2">
                    <div class="card h-100 d-flex justify-content-center align-items-center shadow-only rounded">
                        <div class="card-body text-center">
                            <p class="display-4"><i class="fa-solid fa-users"></i></p>
                            <p class="h5">Jumlah Warga</p>
                            <p>{{$countwarga}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card h-100 d-flex justify-content-center align-items-center shadow-only">
                        <div class="card-body text-center">
                            <p class="display-4"><i class="fa-solid fa-home"></i></p>
                            <p class="h5">Jumlah Kepala Keluarga</p>
                            <p>{{$countkepalakeluarga}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card h-100 d-flex justify-content-center align-items-center shadow-only">
                        <div class="card-body text-center">
                            <p class="display-4"><i class="fa-solid fa-people-roof"></i></p>
                            <p class="h5">Jumlah Warga Sementara</p>
                            <p>{{$countmutasi}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 align-items-center">
                <div class="container col-md-6 bg-white w-50 py-2">
                    <h5 class="fw-bold text-center mb-2">Grafik Data Warga - Jenis Kelamin</h3>
                        <canvas id="chartDataWargaJenisKelaminPie" width="100" height="100"></canvas>
                </div>
                <div class="container col-md-6 bg-white w-50 py-2">
                    <h5 class="fw-bold text-center mb-2">Grafik Data Warga - Kelompok Usia</h3>
                        <canvas id="chartDataWargaKelompokUsia" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="informasi-section" id="informasi">
    <div class="container-fluid px-4">
        <h2 class="pb-2 border-bottom border-dark mb-4">Informasi</h2>
        <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
            @foreach ($datainformasi as $dti)
            <div class="col-md-4">
                <div class="card h-100 border-dark">
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
</div>
<div class="container-fluid px-4 py-5" id="petasitus">
    <h2 class="pb-2 border-bottom border-dark">Peta Situs</h2>
    <div class="row gx-4 gx-lg-5 align-items-center my-5 mx-5">
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

<script>
    // Setup for Pie Chart Jenis Kelamin
    const dataPie = {
        labels: ["Laki-Laki", "Perempuan"],
        datasets: [{
            label: 'Jumlah',
            data: <?php echo $chartJenisKelamin ?>,
            backgroundColor: ["#3e95cd", "#8e5ea2"],
            hoverOffset: 4
        }]
    };

    // Config for Pie Chart
    const configPie = {
        type: 'pie',
        data: dataPie,
        options: {
            plugins: {
                legend: {
                    position: 'left',
                    labels: {
                        boxWidth: 10,
                        font: {
                            style: 'italic'
                        },
                        color: '#aaa',
                        usePointStyle: true,
                    },
                },
            },
        }
    };

    // Create a new Chart instance and render the Pie Chart
    const ctxPie = document.getElementById('chartDataWargaJenisKelaminPie').getContext('2d');
    const myPieChart = new Chart(ctxPie, configPie);

    // Setup for Chart Kelompok Usia
    const dataKelompokUsia = {
        labels: ["Balita", "Anak Anak", "Remaja Awal", "Remaja Akhir", "Dewasa", "Lansia", "Manula"],
        datasets: [{
            label: 'Jumlah',
            data: <?php echo $chartUsia ?>,
            backgroundColor: ["#33e5cd", "#8e5ea2", "#3e95cd", "#6e5ea2", "#3e95cd", "#8e5ea2", "#3e95cd"],
            hoverOffset: 4
        }]
    };

    // Config for Chart Kelompok Usia
    const configKelompokUsia = {
        type: 'bar',
        data: dataKelompokUsia,
        options: {
            plugins: {
                legend: {
                    position: 'left',
                    labels: {
                        boxWidth: 10,
                        font: {
                            style: 'italic'
                        },
                        color: '#aaa',
                        usePointStyle: true,
                    },
                },
            },
        }
    };

    // Create a new Chart instance and render the Pie Chart
    const ctxKelompokUsia = document.getElementById('chartDataWargaKelompokUsia').getContext('2d');
    const kelompokUsiaChart = new Chart(ctxKelompokUsia, configKelompokUsia);
</script>

@include('bokoin.component.footers')

@endsection