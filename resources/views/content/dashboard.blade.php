@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-0 border-bottom">

                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <div class="container px-4 mt-4">
                <div class="row gx-4 gx-lg-5 mb-4">
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
                        <div class="card h-100 d-flex justify-content-center align-items-center shadow-only rounded">
                            <div class="card-body text-center">
                                <p class="display-4"><i class="fa-solid fa-people-roof"></i></p>
                                <p class="h5">Jumlah Kepala Keluarga</p>
                                <p>{{$countkepalakeluarga}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card h-100 d-flex justify-content-center align-items-center shadow-only rounded">
                            <div class="card-body text-center">
                                <p class="display-4"><i class="fa-solid fa-users"></i></p>
                                <p class="h5">Jumlah Data Sementara</p>
                                <p>{{$countmutasi}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card h-100 d-flex justify-content-center align-items-center shadow-only rounded">
                            <div class="card-body text-center">
                                <p class="display-4"><i class="fa-solid fa-users"></i></p>
                                <p class="h5">Jumlah Data Informasi</p>
                                <p>{{$countinfo}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card h-100 d-flex justify-content-center align-items-center shadow-only rounded">
                            <div class="card-body text-center">
                                <p class="display-4"><i class="fa-solid fa-home"></i></p>
                                <p class="h5">Jumlah Kartu Keluarga</p>
                                <p>{{$countkartukeluarga}}</p>
                            </div>
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

        </main>
    </div>
</div>

<script>
    // Setup for Pie Chart Jenis Kelamin
    var perempuan = "<?php echo "$perempuan"; ?>";
    var laki = "<?php echo "$laki"; ?>"
    const dataPie = {
        labels: ["Laki-Laki", "Perempuan"],
        datasets: [{
            label: 'Jumlah',
            data: [laki, perempuan],
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
            backgroundColor: ["#FF9EAA", "#FFA27F", "#EE4E4E", "#E49BFF", "#2A629A", "#5C2FC2", "#003285"],
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

@endsection