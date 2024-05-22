@extends('layout.layout')

@section('content')
@include('component.navbar')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Kartu Keluarga</h1>
                <a href="{{ url('dashboard-data-keluarga-add') }}" class="btn btn-primary">TAMBAH DATA</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Kartu Keluarga</th>
                            <th>Id Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>Desa / Kel</th>
                            <th>Kecamatan</th>
                            <th>Kab/Kota</th>
                            <th>Provinsi</th>
                            <th>Negara</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DataKeluarga as $index => $dk)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dk->no_KK }}</td>
                            <td>{{ $dk->Id_KK }}</td>
                            <td>{{ $dk->Alamat }}</td>
                            <td>{{ $dk->desa_lurah }}</td>
                            <td>{{ $dk->kecamatan }}</td>
                            <td>{{ $dk->kab_kota }}</td>
                            <td>{{ $dk->prov }}</td>
                            <td>{{ $dk->negara }}</td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="{{ url('dashboard-data-keluarga-edit/edit/'. $dk->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-data-keluarga-delete/'.$dk->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link custom-icon" type="submit" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash fa-lg"></i></button>
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