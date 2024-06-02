@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{url('dashboard-data-keluarga')}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>

            <h1> Edit Data Kartu Keluarga</h1>

            <h4>A. Data Pribadi</h4>
            <form action="{{ url('dashboard-data-keluarga-edit/' . $dataKeluarga->id) }}" class="row g-3" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="no_kk" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                    <input type="text" name="no_kk" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" value="{{ $dataKeluarga->no_kk }}">
                    @error('no_kk')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="row mb-3">
                    <label for="nik_kepala_keluarga" class="col-sm-2 col-form-label">NIK Kepala Keluarga</label>
                    <input type="text" name="nik_kepala_keluarga" class="form-control @error('nik_kepala_keluarga') is-invalid @enderror" id="nik_kepala_keluarga" value="{{ $dataKeluarga->nik_kepala_keluarga }}">
                    @error('nik_kepala_keluarga')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <h4>B. Data Alamat</h4>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $dataKeluarga->alamat }}">
                    @error('alamat')
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
                        <option value="{{$provinsi->id}}" {{$dataKeluarga->provinsi == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-5">
                    <label for="kab_kota" class="form-label">Kabupaten / Kota</label>
                    <select name="kab_kota" id="kab_kota" class="form-select">
                        <option disabled>Pilih Kabupaten/Kota...</option>
                        @foreach ($namaKabupaten as $kabupaten)
                        <option value="{{$kabupaten->id}}" {{$dataKeluarga->kab_kota == $kabupaten->id ? 'selected' : ''}}>{{ $kabupaten->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-select">
                        <option disabled>Pilih Kecamatan...</option>
                        @foreach ($namaKecamatan as $kecamatan)
                        <option value="{{$kecamatan->id}}" {{$dataKeluarga->kecamatan == $kecamatan->id ? 'selected' : ''}}>{{ $kecamatan->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-5">
                    <label for="desa_kelurahan" class="form-label">Desa / Kelurahan</label>
                    <select name="desa_kelurahan" id="desa_kelurahan" class="form-select">
                        <option disabled>Pilih Desa/Kelurahan...</option>
                        @foreach ($namaDesa as $desa)
                        <option value="{{$desa->id}}" {{$dataKeluarga->desa_kelurahan == $desa->id ? 'selected' : ''}}>{{ $desa->name }}</option>
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