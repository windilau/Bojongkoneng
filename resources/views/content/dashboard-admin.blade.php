@extends('layout.layout')

@section('content')
    @include('Component.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('Component.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container" id="informasi">
                    <h2 class="pb-2 border-bottom">Data Admin</h2>
                    <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
                        @foreach ($users as $admin)
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title fs-5 mb-4">Nama :</h5>
                                            <p class="card-text fs-5 ms-2 mb-4">{{ $admin->name }}</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title fs-5 mb-4">Email :</h5>
                                            <p class="card-text fs-5 ms-2 mb-4">{{ $admin->email }}</p>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#changePasswordModal-{{ $admin->id }}">
                                            Ubah Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection