@extends('layout.layout')
@include('component.navbar')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="row">
        @include('Component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Data Ketua RT</h2>
                <!-- <a href="{{ url('dashboard-data-rt-add') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> TAMBAH DATA</a> -->
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Nama Ketua RT</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Upload Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rt as $drt)
                        <tr>
                            <td>{{ $drt->nama_rt }}</td>
                            <td>{{ $drt->notelp_rt }}</td>
                            <td>{{ $drt->alamat_rt }}</td>
                            <td>
                                @if ($drt->image)
                                <img src="{{ asset('image/' . $drt->image) }}" target="_blank" style="width: 50px; height: auto;">
                                @else
                                No Image uploaded
                                @endif
                            </td>
                            <td>
                                <div class="d-inline-block">
                                    <a href="{{ url('dashboard-data-rt-edit/edit/'. $drt->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <!-- <form action="{{ url('dashboard-data-rt-delete/'.$drt->id) }}" method="post" class="d-inline" onsubmit="confirmation(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link custom-icon" type="submit"><i class="fa-solid fa-trash fa-lg"></i></button>
                                    </form> -->
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