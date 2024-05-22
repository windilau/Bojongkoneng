@extends('layout.layout')
@section('content')
@include('component/navbar')

<body>
    <div class="container-fluid">
        <div class="row">

            @include('component.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <a href="{{URL::Previous()}}" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Data Warga</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    </div>
                </div>

                <div class="mt-4"></div>

                <h4>A. Data Pribadi</h4>

                <form class="row g-3" action="{{ url('dashboard-warga-edit/'. $datawarga->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $datawarga->nik}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $datawarga->nama_lengkap}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $datawarga->tempat_lahir}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $datawarga->tanggal_lahir}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option disables selected>-</option>
                                <option value="Laki-Laki" {{$datawarga->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{$datawarga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <h4>B. Data Alamat</h4>

                    <div class="col-md-5">
                        <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                        <textarea type="text" class="form-control" id="alamat_ktp" name="alamat_ktp">{{ $datawarga->alamat_ktp }}</textarea>
                    </div>
                    <div class="col-md-5">
                        <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                        <textarea type="text" class="form-control" id="alamat_domisili" name="alamat_domisili">{{ $datawarga->alamat_domisili }}</textarea>
                    </div>
                    <div class="col-md-5">
                        <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                        <input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" value="{{ $datawarga->desa_kelurahan}}">
                    </div>
                    <div class="col-md-5">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $datawarga->kecamatan}}">
                    </div>
                    <div class="col-md-5">
                        <label for="kab_kota" class="form-label">Kabupaten / Kota</label>
                        <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="{{ $datawarga->kab_kota}}">
                    </div>
                    <div class="col-md-5">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $datawarga->provinsi}}">
                    </div>
                    <div class="col-md-5 my-3">
                        <button type="submit" class="btn btn-primary px-3">Update</button>
                    </div>
                </form>

            </main>
        </div>

        <script src="/js/bootstrap.bundle.min.js"></script>
</body>

@endsection