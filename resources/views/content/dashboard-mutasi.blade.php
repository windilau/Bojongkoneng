@extends('layout.layout')

@section('content')
@include('component.navbar')

<div class="container-fluid">
    <div class="row">
        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Data Keluarga Pindah</h2>
                <a href="{{ url('dashboard-mutasi-add') }}" class="btn btn-primary">Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No KK</th>
                            <th scope="col">Desa / Kelurahan</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kabupaten / Kota</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Negara</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasi as $index => $mt)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mt->no_kk }}</td>
                            <td>{{ $mt->desa_sesudah }}</td>
                            <td>{{ $mt->kec_sesudah }}</td>
                            <td>{{ $mt->kab_sesudah }}</td>
                            <td>{{ $mt->prov_sesudah }}</td>
                            <td>{{ $mt->negara_sesudah }}</td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="{{ url('dashboard-mutasi-edit/edit/'. $mt->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-mutasi-delete/'.$mt->id) }}" method="post" class="d-inline">
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