@extends('layout.layout')
@include('component.navbar')
@section('content')
@include('sweetalert::alert')

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
                                    <p class="card-text fs-5 ms-2 mb-4">{{ $admin->username }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title fs-5 mb-4">Email :</h5>
                                    <p class="card-text fs-5 ms-2 mb-4">{{ $admin->email }}</p>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal?{{ $admin->id }}">
                                    Ubah Password
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="changePasswordModal?{{$admin->id}}" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="changepasswordModalLabel">Edit Password</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="{{ url('dashboard-admin/'. $admin->id) }}" method="post" id="edit-form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Current Password</label>
                                            <input name="current_password" id="username" type="password" class="form-control" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" id="password" type="password" class="form-control" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" required />
                                        </div>

                                        <button type="submit" class="btn btn-primary my-2" id="btnUpdateSubmit" name="changePassword">Update</button>
                                    </form>
                                </div>
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