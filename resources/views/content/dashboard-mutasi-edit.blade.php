@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{ URL::Previous() }}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Data Keluarga Sementara</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <div class="container">
                <h4>A. Data Pribadi</h4>

                <form action="{{ url('dashboard-mutasi-edit/' . $mutasi->id) }}" class="row g-3" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $mutasi->nama_lengkap }}">
                            @error('nama_lengkap')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_kk" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{ $mutasi->no_kk }}">
                            @error('no_kk')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" value="{{ $mutasi->nik }}">
                            @error('nik')
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
                                <option disables selected>-</option>
                                <option value="Laki-Laki" {{$mutasi->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{$mutasi->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <h4>B. Data Tempat Tinggal Sebelumnya</h4>

                    <div class="col-md-5">
                        <label for="alamat_sebelum" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat_sebelum" class="form-control @error('alamat_sebelum') is-invalid @enderror" id="alamat_sebelum">{{ $mutasi->alamat_sebelum }}</textarea>
                        @error('alamat_sebelum')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="prov_sebelum" class="form-label">Provinsi</label>
                        <select name="prov_sebelum" id="pro_sebelum" class="form-select">
                            <option disables selected>Pilih Provinsi...</option>
                            @foreach ($namaProvinsi as $provinsi)
                            <option value="{{$provinsi->id}}" {{$mutasi->prov_sebelum == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="kab_sebelum" class="form-label">Kabupaten / Kota</label>
                        <select name="kab_sebelum" id="kab_sebelum" class="form-select">
                            <option disables selected>Pilih Kabupaten/Kota...</option>
                            @foreach ($namaKabupaten as $kabupaten)
                            <option value="{{$kabupaten->id}}" {{$mutasi->kab_sebelum == $kabupaten->id ? 'selected' : ''}}>{{ $kabupaten->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="kec_sebelum" class="form-label">Kecamatan</label>
                        <select name="kec_sebelum" id="kec_sebelum" class="form-select">
                            <option disables selected>Pilih Kecamatan...</option>
                            @foreach ($namaKecamatan as $kecamatan)
                            <option value="{{$kecamatan->id}}" {{$mutasi->kec_sebelum == $kecamatan->id ? 'selected' : ''}}>{{ $kecamatan->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="desa_sebelum" class="form-label">Desa / Kelurahan</label>
                        <select name="desa_sebelum" id="desa_kelurahan" class="form-select">
                            <option disabled>Pilih Desa/Kelurahan...</option>
                            @foreach ($namaDesa as $desa)
                            <option value="{{$desa->id}}" {{$mutasi->desa_sebelum == $desa->id ? 'selected' : ''}}>{{ $desa->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h4>B. Data Tempat Tinggal Saat Ini</h4>

                    <div class="col-md-5">
                        <label for="alamat_sesudah" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat_sesudah" class="form-control @error('alamat_sesudah') is-invalid @enderror" id="alamat_sesudah">{{ $mutasi->alamat_sesudah }}</textarea>
                        @error('alamat_sesudah')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="prov_sesudah" class="form-label">Provinsi</label>
                        <select name="prov_sesudah" id="prov_sesudah" class="form-select">
                            <option disabled>Pilih Provinsi...</option>
                            @foreach ($namaProvinsi as $provinsi)
                            <option value="{{$provinsi->id}}" {{$mutasi->prov_sesudah == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="kab_sesudah" class="form-label">Kabupaten / Kota</label>
                        <select name="kab_sesudah" id="kab_sesudah" class="form-select">
                            <option disabled>Pilih Kabupaten/Kota...</option>
                            @foreach ($namaKabupaten as $kabupaten)
                            <option value="{{$kabupaten->id}}" {{$mutasi->kab_sesudah == $kabupaten->id ? 'selected' : ''}}>{{ $kabupaten->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="kec_sesudah" class="form-label">Kecamatan</label>
                        <select name="kec_sesudah" id="kec_sesudah" class="form-select">
                            <option disabled>Pilih Kecamatan...</option>
                            @foreach ($namaKecamatan as $kecamatan)
                            <option value="{{$kecamatan->id}}" {{$mutasi->kec_sesudah == $kecamatan->id ? 'selected' : ''}}>{{ $kecamatan->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="desa_sesudah" class="form-label">Desa / Kelurahan</label>
                        <select name="desa_sesudah" id="desa_sesudah" class="form-select">
                            <option disabled>Pilih Desa/Kelurahan...</option>
                            @foreach ($namaDesa as $desa)
                            <option value="{{$desa->id}}" {{$mutasi->desa_sesudah == $desa->id ? 'selected' : ''}}>{{ $desa->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-my-3">
                        <button type="submit" class="btn btn-success px-3"> EDIT DATA</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection