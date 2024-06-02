@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('Component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{URL::Previous()}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Data Informasi</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>

            <div class="mt-4">
                <h2>A. Informasi Kegiatan</h2>
                <form class="row g-3" action="{{ url('dashboard-informasi-edit/'. $datainformasi->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan:</label>
                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan nama kegiatan" value="{{ $datainformasi->nama_kegiatan}}">
                        @error('nama_kegiatan')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                        <input class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi kegiatan" value="{{ $datainformasi->deskripsi}}">
                        @error('deskripsi')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pdf" class="form-label">Upload PDF:</label>
                        <input class="form-control @error('pdf') is-invalid @enderror" type="file" id="pdf" name="pdf" value="{{ $datainformasi->pdf}}">
                        @error('pdf')
                        <div id="name-error" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        @if ($datainformasi->pdf)
                        <div class="mt-2">
                            <a href="{{ asset('pdf/' . $datainformasi->pdf) }}" target="_blank">Lihat PDF yang sebelumnya sudah diunggah</a>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-5 my-3">
                        <button type="submit" class="btn btn-success px-3"> EDIT DATA</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection