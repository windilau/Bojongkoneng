<nav class="navbar navbar-expand-lg navbar-light justify-content-between py-2 mb-1 border-bottom" style="background-color: #FEE23E;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col d-flex align-items-center">
                <a href="dashboard">
                    <img src="/images/logo.png" alt="Bojong Koneng Insight" width="60" height="60">
                </a>
                <div class="d-flex flex-column ms-3">
                    <p class="mb-0"><strong>Bojong Koneng Insight</strong></p>
                    <p class="mb-0">Kota Bandung, Jawa Barat</p>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex align-items-center position-relative">
        <p class="mb-0 me-5 dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><strong>Hello! {{ Auth::user()->username }}</strong></p>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('logout.action') }}">Sign out</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal?{{ Auth::user()->id }}">Change password</a></li>
        </ul>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="changePasswordModal?{{Auth::user()->id}}" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="changepasswordModalLabel">Edit Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{ url('dashboard/'.Auth::user()->id) }}" method="post" id="edit-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Sebelumnya</label>
                            <input name="current_password" id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}">
                            @error('current_password')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                            @error('password')
                            <div id="name-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                            <div id="password-error" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary my-2" id="btnUpdateSubmit" name="changePassword">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #FEE23E;
            margin-top: 10px;
            padding: 0;
        }

        .dropdown-item {
            color: black;
            padding: 10px 20px;
            white-space: nowrap;
        }

        .dropdown-item:hover {
            background-color: #CBB431;
        }

        .dropdown-toggle:hover+.dropdown-menu,
        .dropdown-menu:hover {
            display: block;
        }

        .dropdown-toggle {
            cursor: pointer;
            position: relative;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .navbar .position-relative:hover .dropdown-menu {
            display: block;
        }

        .navbar .dropdown-menu {
            top: 100%;
        }
    </style>
</nav>

@include('sweetalert::alert')