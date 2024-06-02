@extends('layout.layout')
@include('component.navbar')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="row">
        @include('Component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Informasi</h1>
                <a href="dashboard-informasi-add" class="btn btn-success"><i class="fas fa-plus-circle"></i> TAMBAH DATA</a>

            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Upload File</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datainformasi as $dti)
                        <tr>
                            <td>{{ $dti->nama_kegiatan }}</td>
                            <td>{{ $dti->deskripsi }}</td>
                            <td>
                                @if ($dti->pdf)
                                <a href="{{ asset('pdf/' . $dti->pdf) }}" target="_blank">{{ $dti->pdf }}</a>
                                @else
                                No PDF uploaded
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ url('dashboard-informasi-edit/edit/'. $dti->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-informasi-delete/'.$dti->id) }}" method="post" class="d-inline" onsubmit="confirmation(event)">
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