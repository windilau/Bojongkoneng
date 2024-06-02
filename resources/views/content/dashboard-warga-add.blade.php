@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">

        @include('component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{ URL::Previous() }}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Data Warga</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>
            <h4>A. Data Pribadi</h4>

            <form action="dashboard-warga-add" method="post">
                @csrf
                <div class="row g-3">
                    <div class="row mb-3">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
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
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
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
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-2">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option disabled {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>-</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
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
                        <textarea type="text" class="form-control @error('alamat_ktp') is-invalid @enderror" id="alamat_ktp" name="alamat_ktp">{{ old('alamat_ktp') }}</textarea>
                        @error('alamat_ktp')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-5">
                        <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                        <textarea type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" name="alamat_domisili">{{ old('alamat_domisili') }}</textarea>
                        @error('alamat_domisili')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-5">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                            <option>Pilih Provinsi..</option>
                            @foreach ($provinces as $provinsi)
                            <option value="{{ $provinsi->id }}" {{ old('provinsi') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->name }}</option>
                            @endforeach

                            @error('provinsi')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="kab_kota" class="form-label">Kabupaten / Kota</label>
                        <select name="kab_kota" id="kab_kota" class="form-control @error('kab_kota') is-invalid @enderror">
                            <option value="">Pilih Kabupaten/Kota..</option>
                            @error('kab_kota')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') }}">
                            <option value="">Pilih Kecamatan..</option>
                            @error('kecamatan')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                        <select name="desa_kelurahan" id="desa_kelurahan" class="form-control @error('desa_kelurahan') is-invalid @enderror" value="{{ old('desa_kelurahan') }}">
                            <option value="">Pilih Desa/Kelurahan..</option>
                            @error('desa_kelurahan')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>
                    </div>
                </div>

                <div class="col-md-2 my-3">
                    <button type="submit" class="btn btn-success px-3"> TAMBAH DATA</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection