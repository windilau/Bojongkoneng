@extends('layout.layout')
@section('content')
@include('component/navbar')

<body>
    <div class="container-fluid">
        <div class="row">
            @include('component.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <a href="{{URL::Previous()}}" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> BACK</a>
                <h1 class="border-bottom">Data Kartu Keluarga</h1>

                <h4>A. Data Pribadi</h4>
                <form action="dashboard-data-keluarga-add" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <form class="row g-3">
                        <div class="row mb-3">
                            <label for="no_KK" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                            <input type="text" name="no_KK" class="form-control" id="no_KK">
                        </div>
                        <div class="row mb-3">
                            <label for="Id_KK" class="col-sm-2 col-form-label">NIK Kepala Keluarga</label>
                            <input type="text" name="Id_KK" class="form-control" id="Id_KK">
                        </div>
                        <h4>B. Data Alamat</h4>

                        <div class="row mb-3">
                            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <input type="text" name="Alamat" class="form-control" id="Alamat">
                        </div>

                        <div class="row mb-3">
                            <label for="desa_lurah" class="col-sm-2 col-form-label">Desa / Kelurahan</label>
                            <input type="text" name="desa_lurah" class="form-control" id="desa_lurah">
                        </div>

                        <div class="row mb-3">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" id="kecamatan">
                        </div>

                        <div class="row mb-3">
                            <label for="kab_kota" class="col-sm-2 col-form-label">Kabupaten / Kota </label>
                            <input type="text" name="kab_kota" class="form-control" id="kab_kota">
                        </div>

                        <div class="row mb-3">
                            <label for="prov" class="col-sm-2 col-form-label">Provinsi</label>
                            <input type="text" name="prov" class="form-control" id="prov">
                        </div>

                        <div class="row mb-3">
                            <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                            <input type="text" name="negara" class="form-control" id="negara">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

        </div>
    </div>
    </main>
</body>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>

@endsection