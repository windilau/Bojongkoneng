@extends('layout.layout')
@include('component.navbar')
@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <div class="row">

        @include('component.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h2 class="mt-0">Data Warga</h2>

                <a href="dashboard-warga-add" class="btn btn-success"><i class="fas fa-plus-circle"></i> TAMBAH DATA</a>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-file-import me-2"></i> IMPORT DATA
            </button>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                    <p>
                                        <span style="color: red;">*</span> Untuk mempermudah proses pengisian data ke dalam sistem, harap pastikan bahwa File Excel yang akan diunggah mengikuti format field berikut:
                                    </p>
                                    <ul>
                                        <li><strong>NIK</strong>: Nomor Induk Kependudukan (harus terdiri dari 16 digit angka).</li>
                                        <li><strong>Nama Lengkap</strong>: Nama lengkap sesuai dengan KTP.</li>
                                        <li><strong>Tempat Lahir</strong>: Nama kota atau kabupaten tempat kelahiran.</li>
                                        <li><strong>Tanggal Lahir</strong>: Tanggal lahir dalam format YYYY-MM-DD.</li>
                                        <li><strong>Jenis Kelamin</strong>: Jenis kelamin diisi dengan "Laki-Laki" atau "Perempuan"</li>
                                        <li><strong>Alamat KTP</strong>: Alamat yang sesuai dengan KTP.</li>
                                        <li><strong>Alamat Domisili</strong>: Alamat domisili saat ini.</li>
                                        <li><strong>Desa/Kel</strong>: Nama desa atau kelurahan saat ini.</li>
                                        <li><strong>Kecamatan</strong>: Nama kecamatan saat ini.</li>
                                        <li><strong>Kab/Kota</strong>: Nama kabupaten atau kota saat ini.</li>
                                        <li><strong>Provinsi</strong>: Nama provinsi saat ini.</li>
                                    </ul>
                                    <p>
                                        Pastikan semua field diisi dengan benar dan lengkap sebelum mengunggah file ke sistem. Terima kasih.
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <td>{{ $dtw->nama_desa }}</td>
                            <td>{{ $dtw->nama_kec }}</td>
                            <td>{{ $dtw->nama_kab_kota }}</td>
                            <td>{{ $dtw->nama_prov }}</td>

                            <td>
                                <div class="d-flex">
                                    <a href="{{ url('dashboard-warga-edit/edit/'. $dtw->id) }}" class="btn btn-link custom-icon"><i class="fa-regular fa-pen-to-square fa-lg"></i></a>
                                    <form action="{{ url('dashboard-warga-delete/'.$dtw->id) }}" method="post" class="d-inline" onsubmit="confirmation(event)">
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

<style>
    .form-group {
        margin: 20px;
        font-family: Arial, sans-serif;
    }

    .form-group input[type="file"] {
        margin-bottom: 20px;
    }

    .form-group p {
        font-size: 16px;
        line-height: 1.5;
    }

    .form-group ul {
        font-size: 16px;
    }
</style>

@endsection