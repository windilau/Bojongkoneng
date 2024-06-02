@extends('layout.layout')
@include('component.navbar')
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('Component.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <a href="{{URL::Previous()}}" class="btn btn-info mt-3"><i class="fa fa-arrow-left"></i> KEMBALI</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Data Ketua RT</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>
            <div class="container">
                <h4>A. Data Ketua RT</h4>

                <form action="dashboard-data-rt-add" class="row g-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_rt" class="form-label">Nama RT:</label>
                        <input type="text" class="form-control" id="nama_rt" name="nama_rt" placeholder="Masukkan nama">
                    </div>
                    <div class="mb-3">
                        <label for="notelp_rt" class="form-label">No Telp:</label>
                        <input class="form-control" id="notelp_rt" name="notelp_rt" rows="1" placeholder="Masukkan deskripsi kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_rt" class="form-label">Alamat:</label>
                        <input class="form-control" id="alamat_rt" name="alamat_rt" rows="1" placeholder="Masukkan deskripsi kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/jpeg, image/jpg, image/gif, image/png">
                    </div>
                    <div class="col-md-2 my-3">
                    <button type="submit" class="btn btn-success px-3"> TAMBAH DATA</button>
                </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection