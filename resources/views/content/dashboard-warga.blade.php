@extends('layout.layout')
@section('content')
@include('component/navbar')


<div class="container-fluid">
    <div class="row">

        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h2 class="mt-0">Data Warga</h2>

                <a href="dashboard-warga-add" class="btn btn-primary"><i class="fa-solid fa-plus"></i> TAMBAH DATA</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tempat Tanggal Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jemis Kelamin</th>
                            <th scope="col">Alamat KTP</th>
                            <th scope="col">Alamat Domisili</th>
                            <th scope="col">Desa/Kelurahan</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kabupaten/Kota</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datawarga as $dtw)
                        <tr>
                            <td>{{ $dtw->nik}}</td>
                            <td>{{ $dtw->nama_lengkap }}</td>
                            <td>{{ $dtw->tempat_lahir }}</td>
                            <td>{{ $dtw->tanggal_lahir }}</td>
                            <td>{{ $dtw->jenis_kelamin }}</td>
                            <td>{{ $dtw->alamat_ktp }}</td>
                            <td>{{ $dtw->alamat_domisili }}</td>
                            <td>{{ $dtw->desa_kelurahan }}</td>
                            <td>{{ $dtw->kecamatan }}</td>
                            <td>{{ $dtw->kab_kota }}</td>
                            <td>{{ $dtw->provinsi }}</td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="{{ url('dashboard-warga-edit/edit/'. $dtw->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-warga-delete/'.$dtw->id) }}" method="post" class="d-inline">
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