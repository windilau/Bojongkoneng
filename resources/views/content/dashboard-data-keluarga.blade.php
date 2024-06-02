@extends('layout.layout')
@include('component.navbar')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Kartu Keluarga</h1>
                <a href="{{ url('dashboard-data-keluarga-add') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> TAMBAH DATA</a>

            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No Kartu Keluarga</th>
                            <th>NIK Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Desa / Kel</th>
                            <th>Kecamatan</th>
                            <th>Kab/Kota</th>
                            <th>Provinsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKeluarga as $index => $dk)
                        <tr>
                            <td>{{ $dk->no_kk }}</td>
                            <td>{{ $dk->nik_kepala_keluarga }}</td>
                            <td>{{ $dk->alamat }}</td>
                            <td>{{ $dk->nama_desa }}</td>
                            <td>{{ $dk->nama_kec }}</td>
                            <td>{{ $dk->nama_kab_kota }}</td>
                            <td>{{ $dk->nama_prov }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ url('dashboard-data-keluarga-edit/edit/'. $dk->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-data-keluarga-delete/'.$dk->id) }}" method="post" class="d-inline" onsubmit="confirmation(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link custom-icon" type="submit"><i class="fa-solid fa-trash fa-lg"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection