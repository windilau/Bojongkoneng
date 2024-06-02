@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">

        @include('component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{url('dashboard-warga')}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>

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
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ $datawarga->nik }}">
                        @error('nik')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $datawarga->nama_lengkap }}">
                        @error('nama_lengkap')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $datawarga->tempat_lahir }}">
                        @error('tempat_lahir')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ $datawarga->tanggal_lahir }}">
                        @error('tanggal_lahir')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                            <option disabled>-</option>
                            <option value="Laki-Laki" {{$datawarga->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{$datawarga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <h4>B. Data Alamat</h4>

                <div class="col-md-5">
                    <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                    <textarea type="text" class="form-control @error('alamat_ktp') is-invalid @enderror" id="alamat_ktp" name="alamat_ktp">{{ $datawarga->alamat_ktp }}</textarea>
                    @error('alamat_ktp')
                    <div id="name-error" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                    <textarea type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" name="alamat_domisili">{{ $datawarga->alamat_domisili }}</textarea>
                    @error('alamat_domisili')
                    <div id="name-error" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-select">
                        <option disabled>Pilih Provinsi...</option>
                        @foreach ($namaProvinsi as $provinsi)
                        <option value="{{$provinsi->id}}" {{$datawarga->provinsi == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="kab_kota" class="form-label">Kabupaten / Kota</label>
                    <select name="kab_kota" id="kab_kota" class="form-select">
                        <option disabled>Pilih Kabupaten/Kota...</option>
                        @foreach ($namaKabupaten as $kabupaten)
                        <option value="{{$kabupaten->id}}" {{$datawarga->kab_kota == $kabupaten->id ? 'selected' : ''}}>{{ $kabupaten->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-select">
                        <option disabled>Pilih Kecamatan...</option>
                        @foreach ($namaKecamatan as $kecamatan)
                        <option value="{{$kecamatan->id}}" {{$datawarga->kecamatan == $kecamatan->id ? 'selected' : ''}}>{{ $kecamatan->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-5">
                    <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                    <select name="desa_kelurahan" id="desa_kelurahan" class="form-select">
                        <option disabled>Pilih Desa/Kelurahan...</option>
                        @foreach ($namaDesa as $desa)
                        <option value="{{$desa->id}}" {{$datawarga->desa_kelurahan == $desa->id ? 'selected' : ''}}>{{ $desa->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-5 my-3">
                    <button type="submit" class="btn btn-success px-3"> EDIT DATA</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection