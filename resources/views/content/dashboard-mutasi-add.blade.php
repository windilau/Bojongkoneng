@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{ URL::Previous() }}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Warga Sementara</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <div class="container">
                <h4>A. Data Pribadi</h4>

                <form action="dashboard-mutasi-add" class="row g-3" method="POST">
                    @csrf
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
                        <label for="no_kk" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{ old('no_kk') }}">
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
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
                            @error('nik')
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

                    <h4>B. Data Tempat Tinggal Sebelumnya</h4>

                    <div class="col-md-5">
                        <label for="alamat_sebelum" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat_sebelum" class="form-control @error('alamat_sebelum') is-invalid @enderror" id="alamat_sebelum">{{ old('alamat_sebelum') }}</textarea>
                        @error('alamat_sebelum')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="prov_sebelum" class="form-label">Provinsi</label>
                        <select name="prov_sebelum" id="prov_sebelum" class="form-control">
                            <option>Pilih Provinsi..</option>
                            @foreach ($provinces as $provinsi)
                            <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="kab_sebelum" class="form-label">Kabupaten / Kota</label>
                        <select name="kab_sebelum" id="kab_sebelum" class="form-control">
                            <option value="">Pilih Kabupaten/Kota..</option>

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="kec_sebelum" class="form-label">Kecamatan</label>
                        <select name="kec_sebelum" id="kec_sebelum" class="form-control">
                            <option value="">Pilih Kecamatan..</option>

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="desa_sebelum" class="form-label">Desa / Kelurahan</label>
                        <select name="desa_sebelum" id="desa_sebelum" class="form-control">
                            <option value="">Pilih Desa/Kelurahan..</option>

                        </select>
                    </div>


                    <h4>B. Data Tempat Tinggal Saat Ini</h4>

                    <div class="col-md-5">
                        <label for="alamat_sesudah" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat_sesudah" class="form-control @error('alamat_sesudah') is-invalid @enderror" id="alamat_sesudah">{{ old('alamat_sesudah') }}</textarea>
                        @error('alamat_sesudah')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="prov_sesudah" class="form-label">Provinsi</label>
                        <select name="prov_sesudah" id="prov_sesudah" class="form-control">
                            <option>Pilih Provinsi..</option>
                            @foreach ($provinces as $provinsi)
                            <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="kab_sesudah" class="form-label">Kabupaten / Kota</label>
                        <select name="kab_sesudah" id="kab_sesudah" class="form-control">
                            <option value="">Pilih Kabupaten/Kota..</option>

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="kec_sesudah" class="form-label">Kecamatan</label>
                        <select name="kec_sesudah" id="kec_sesudah" class="form-control">
                            <option value="">Pilih Kecamatan..</option>

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="desa_sesudah" class="form-label">Desa / Kelurahan</label>
                        <select name="desa_sesudah" id="desa_sesudah" class="form-control">
                            <option value="">Pilih Desa/Kelurahan..</option>

                        </select>
                    </div>

                    <div class="col-my-3">
                        <button type="submit" class="btn btn-success px-3"> TAMBAH DATA</button>
                    </div>

                </form>

            </div>
        </main>
    </div>
</div>

@endsection