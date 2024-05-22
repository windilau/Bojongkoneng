@extends('layout.layout')
@section('content')
@include('component/navbar')

<body>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <a href="{{URL::Previous()}}" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> BACK</a>
                <h1> Edit Data Kartu Keluarga</h1>

                <h4>A. Data Pribadi</h4>
                <form action="{{ url('dashboard-data-keluarga-edit/' . $dake->id) }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')
                    <form class="row g-3">
                        <div class="row mb-3">
                            <label for="no_KK" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                            <input type="text" name="no_KK" class="form-control" id="no_KK" value="{{ $dake->no_KK }}">
                        </div>
                        <div class="row mb-3">
                            <label for="Id_KK" class="col-sm-2 col-form-label">NIK Kepala Keluarga</label>
                            <input type="text" name="Id_KK" class="form-control" id="Id_KK" value="{{ $dake->Id_KK }}">
                        </div>
                        <h4>B. Data Alamat</h4>

                        <div class="row mb-3">
                            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <input type="text" name="Alamat" class="form-control" id="Alamat" value="{{ $dake->Alamat }}">
                        </div>

                        <div class="row mb-3">
                            <label for="desa_lurah" class="col-sm-2 col-form-label">Desa / Kelurahan</label>
                            <input type="text" name="desa_lurah" class="form-control" id="desa_lurah" value="{{ $dake->desa_lurah }}">
                        </div>

                        <div class="row mb-3">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="{{ $dake->kecamatan }}">
                        </div>

                        <div class="row mb-3">
                            <label for="kab_kota" class="col-sm-2 col-form-label">Kabupaten / kota</label>
                            <input type="text" name="kab_kota" class="form-control" id="kab_kota" value="{{ $dake->kab_kota }}">
                        </div>

                        <div class="row mb-3">
                            <label for="prov" class="col-sm-2 col-form-label">Provinsi</label>
                            <input type="text" name="prov" class="form-control" id="prov" value="{{ $dake->prov }}">
                        </div>

                        <div class="row mb-3">
                            <label for="negara" class="col-sm-2 col-form-label">Negara</label>
                            <input type="text" name="negara" class="form-control" id="negara" value="{{ $dake->negara }}">
                        </div>
                        <div class="col-md-5 my-3">
                            <button type="submit" class="btn btn-primary px-3">Update</button>
                        </div>
                    </form>

        </div>
    </div>
    </main>
</body>


<script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>