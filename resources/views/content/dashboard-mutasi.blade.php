@extends('layout.layout')
@include('component.navbar')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h2 class="mt-0">Data Warga Sementara</h2>

                <a href="dashboard-mutasi-add" class="btn btn-success"><i class="fas fa-plus-circle"></i> TAMBAH DATA</a>

            </div>


            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">NAMA LENGKAP</th>
                            <th scope="col">NIK</th>
                            <th scope="col">ALAMAT SEBELUM</th>
                            <th scope="col">PROVINSI SEBELUM</th>
                            <th scope="col">ALAMAT SESUDAH</th>
                            <th scope="col">PROVINSI SESUDAH</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mutasi as $mt)

                        <tr>
                            <td>{{ $mt->nama_lengkap }}</td>
                            <td>{{ $mt->nik }}</td>
                            <td>{{ $mt->alamat_sebelum }}</td>
                            <!-- <td>{{ $mt->nama_prov_sebelum }}</td>
                                <td>{{ $mt->nama_prov_sesudah }}</td> -->
                            @foreach ($namaProvinsi as $provinsi)
                            @if ($mt->prov_sebelum == $provinsi->id)
                            <td>{{ $provinsi->name }}</td>
                            @endif
                            @endforeach
                            <td>{{ $mt->alamat_sesudah }}</td>
                            @foreach ($namaProvinsi as $provinsi)
                            @if ($mt->prov_sesudah == $provinsi->id)
                            <td>{{ $provinsi->name }}</td>
                            @endif
                            @endforeach
                            <td>

                                <div class="d-flex">
                                    <a href="{{ url('dashboard-mutasi-edit/edit/'. $mt->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-mutasi-delete/'.$mt->id) }}" method="post" class="d-inline" onsubmit="confirmation(event)">
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