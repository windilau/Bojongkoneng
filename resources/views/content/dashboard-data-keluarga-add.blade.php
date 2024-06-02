@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{URL::Previous()}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>

            <h1 class="border-bottom">Data Kartu Keluarga</h1>

            <h4>A. Data Pribadi</h4>
            <form action="dashboard-data-keluarga-add" class="row g-3" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="no_kk" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                    <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" value="{{ old('no_kk') }}">
                    @error('no_kk')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="row mb-3">
                    <label for="nik_kepala_keluarga" class="col-sm-2 col-form-label">NIK Kepala Keluarga</label>
                    <input type="text" name="nik_kepala_keluarga" class="form-control @error('nik_kepala_keluarga') is-invalid @enderror" id="nik_kepala_keluarga" value="{{ old('nik_lepala_keluarga') }}">
                    @error('nik_kepala_keluarga')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <h4>B. Data Alamat</h4>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
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
                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="kab_kota" class="form-label">Kabupaten / Kota</label>
                    <select name="kab_kota" id="kab_kota" class="form-control @error('kab_kota') is-invalid @enderror">
                        <option value="">Pilih Kabupaten/Kota..</option>

                    </select>
                </div>
                <div class="col-md-5">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                        <option value="">Pilih Kecamatan..</option>

                    </select>
                </div>
                <div class="col-md-5">
                    <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                    <select name="desa_kelurahan" id="desa_kelurahan" class="form-control @error('desa_keluarahan') is-invalid @enderror">
                        <option value="">Pilih Desa/Kelurahan..</option>

                    </select>
                </div>
                <div class="col-my-3">
                    <button type="submit" class="btn btn-success px-3"> TAMBAH DATA</button>
                </div>
            </form>
        </main>
    </div>
</div>