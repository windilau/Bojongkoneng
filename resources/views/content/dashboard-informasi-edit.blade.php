@extends('layout.layout')
@section('content')
@include('Component.navbar')

<div class="container-fluid">
    <div class="row">
        @include('Component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{URL::Previous()}}" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> BACK</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Data Informasi</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <div class="mt-4">
                <h2>A. Informasi Kegiatan</h2>
                <form class="row g-3" action="{{ url('dashboard-informasi-edit/'. $datainformasi->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan nama kegiatan" value="{{ $datainformasi->nama_kegiatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                        <input class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi kegiatan" value="{{ $datainformasi->deskripsi}}">
                    </div>
                    <div class="mb-3">
                        <label for="pdf" class="form-label">Upload PDF:</label>
                        <input class="form-control" type="file" id="pdf" name="pdf" value="{{ $datainformasi->pdf}}">
                    </div>
                    <div class="col-md-5 my-3">
                        <button type="submit" class="btn btn-primary px-3">Update</button>
                    </div>
                </form>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

        </main>
    </div>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
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
</style>

@endsection