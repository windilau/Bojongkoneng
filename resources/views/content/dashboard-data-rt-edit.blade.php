@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('Component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{url('dashboard-data-rt')}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Data Ketua RT</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <div class="mt-4">
                <h4>Data Ketua RT</h4>
                <form class="row g-3" action="{{ url('dashboard-data-rt-edit/'. $rt->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_rt" class="form-label">Nama RT:</label>
                        <input type="text" class="form-control @error('nama_rt') is-invalid @enderror" id="nama_rt" name="nama_rt" placeholder="Masukkan nama" value="{{ $rt->nama_rt}}">
                        @error('nama_rt')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="notelp_rt" class="form-label">No Telepon:</label>
                        <input class="form-control @error('notelp_rt') is-invalid @enderror" id="notelp_rt" name="notelp_rt" rows="1" placeholder="Masukkan deskripsi kegiatan" value="{{ $rt->notelp_rt}}">
                        @error('notelp_rt')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat_rt" class="form-label">Alamat:</label>
                        <input class="form-control @error('alamat_rt') is-invalid @enderror" id="alamat_rt" name="alamat_rt" rows="1" placeholder="Masukkan deskripsi kegiatan" value="{{ $rt->alamat_rt}}">
                        @error('alamat_rt')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{ $rt->image}}">
                        @error('image')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        @if ($rt->image)
                        <div class="mt-2">
                            <a href="{{ asset('image/' . $rt->image) }}" target="_blank">Lihat Image yang sebelumnya sudah diunggah</a>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-5 my-3">
                        <button type="submit" class="btn btn-success px-3"> EDIT DATA</button>
                    </div>
                </form>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

        </main>
    </div>
</div>

@endsection