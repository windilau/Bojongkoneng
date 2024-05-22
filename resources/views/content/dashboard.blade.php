@extends('layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('component.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    </div>
                </div>
                <div class="search-container">
                    <input class="form-control form-control-dark w-100" type="text" placeholder="Search"
                        aria-label="Search"> <!-- Input search -->
                </div>
                <hr>
                <div class="row g-2 align-items-center">
                    <div class="container col-md-6 bg-white w-50 py-2">
                        <h5 class="fw-bold text-center mb-2">Grafik Jumlah Data Warga</h3>
                            <canvas id="chartDataWargaPie" width="800" height="450"></canvas>
                    </div>
                    <div class="container col-md-6 bg-white w-50 py-2">
                        <h5 class="fw-bold text-center mb-2">Grafik Jumlah Data Warga</h3>
                            <canvas id="chartDataWargaBar" width="800" height="450"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Setup for Pie Chart
        const dataPie = {
            labels: ["Kepala Keluarga", "Jumlah Warga", "Jumlah Warga Sementara", "Perempuan", "Laki-Laki"],
            datasets: [{
                label: 'Jumlah',
                data: [125, 120, 10, 50, 60],
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#7FFF00"],
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
        const ctxPie = document.getElementById('chartDataWargaPie').getContext('2d');
        const myPieChart = new Chart(ctxPie, configPie);

        // Setup for Bar Chart
        const dataBar = {
            labels: ["Kepala Keluarga", "Jumlah Warga", "Jumlah Warga Sementara", "Jumlah Perempuan", "Jumlah Laki Laki"],
            datasets: [{
                label: 'Jumlah',
                data: [125, 120, 10, 50, 60],
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#7FFF00"],
                hoverOffset: 4
            }]
        };

        // Config for Bar Chart
        const configBar = {
            type: 'bar',
            data: dataBar,
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

        // Create a new Chart instance and render the Bar Chart
        const ctxBar = document.getElementById('chartDataWargaBar').getContext('2d');
        const myBarChart = new Chart(ctxBar, configBar);
    </script>

    {{-- <script>
        // Setup
        const data = {
            labels: ["Kepala Keluarga", "Istri", "Anak Laki-laki", "Anak Perempuan",
                "Lainnya"
            ],

            datasets: [{
                label: 'Jumlah',
                data: [125, 120, 10, 50, 60],
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#7FFF00"],
                hoverOffset: 4
            }]
        };

        // Config
        const config = {
            type: 'pie',
            data: data,
            options: {
                legend: {
                    position: 'left',
                    labels: {
                        boxWidth: 10,
                        fontStyle: 'italic',
                        fontColor: '#aaa',
                        usePointStyle: true,
                    },
                },
            }
        };


        // Create a new Chart instance and render the chart
        const ctx = document.getElementById('chartDataWargaPie').getContext('2d');
        const myChart = new Chart(ctx, config);
    </script>

    <script>
        // Setup
        const data = {
            labels: ["Kepala Keluarga", "Istri", "Anak Laki-laki", "Anak Perempuan",
                "Lainnya"
            ],

            datasets: [{
                label: 'Jumlah',
                data: [125, 120, 10, 50, 60],
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#7FFF00"],
                hoverOffset: 4
            }]
        };

        // Config
        const config = {
            type: 'bar',
            data: data,
            options: {
                legend: {
                    position: 'left',
                    labels: {
                        boxWidth: 10,
                        fontStyle: 'italic',
                        fontColor: '#aaa',
                        usePointStyle: true,
                    },
                },
            }
        };


        // Create a new Chart instance and render the chart
        const ctx = document.getElementById('chartDataWargaBar').getContext('2d');
        const myChart = new Chart(ctx, config);
    </script> --}}

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .nav-link {
            margin-bottom: 10px;
        }

        /* Style untuk menyusun input search */
        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container input {
            margin-right: 10px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection

@include('component/navbar')
