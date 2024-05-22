@extends('layout.layout')
@section('content')
@include('component.navbar')

    <body>
        <div class="container-fluid">
            <div class="row">
                @include('component.sidebar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <a href="{{ URL::Previous() }}" class="btn btn-primary mt-3"><i class="fa fa-arrow-left"></i> BACK</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Warga Sementara</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>

        <div class="container">
            <h4>A. Data Pribadi</h4>
        
            <form action="dashboard-mutasi-add" class="row g-3" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_kk" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_kk" name="no_kk">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik">
                        @if ($errors->has('nik'))
                            <div class="alert alert-danger py-0 mt-2">
                                NIK Harus 16 Digit Angka
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-2">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option disabled selected>-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                
                <h4>B. Data Tempat Tinggal Sebelumnya</h4>
        
                <div class="col-md-5">
                    <label for="alamat_sebelum" class="form-label">Alamat</label>
                    <textarea type="text" name="alamat_sebelum" class="form-control" id="alamat_sebelum"></textarea>
                </div>
                <div class="col-md-5">
                    <label for="desa_sebelum" class="form-label">Desa / Kelurahan</label>
                    <input type="text" name="desa_sebelum" class="form-control" id="desa_sebelum">
                </div>
                <div class="col-md-5">
                    <label for="kec_sebelum" class="form-label">Kecamatan</label>
                    <input type="text" name="kec_sebelum" class="form-control" id="kec_sebelum">
                </div>
                <div class="col-md-5">
                    <label for="kab_sebelum" class="form-label">Kabupaten / Kota</label>
                    <input type="text" name="kab_sebelum" class="form-control" id="kab_sebelum">
                </div>
                <div class="col-md-5">
                    <label for="prov_sebelum" class="form-label">Provinsi</label>
                    <input type="text" name="prov_sebelum" class="form-control" id="prov_sebelum">
                </div>
                
        
                <h4>B. Data Tempat Tinggal Saat Ini</h4>
        
                <div class="col-md-5">
                    <label for="alamat_sesudah" class="form-label">Alamat</label>
                    <textarea type="text" name="alamat_sesudah" class="form-control" id="alamat_sesudah"></textarea>
                </div>
                <div class="col-md-5">
                    <label for="desa_sesudah" class="form-label">Desa / Kelurahan</label>
                    <input type="text" name="desa_sesudah" class="form-control" id="desa_sesudah">
                </div>
                <div class="col-md-5">
                    <label for="kec_sesudah" class="form-label">Kecamatan</label>
                    <input type="text" name="kec_sesudah" class="form-control" id="kec_sesudah">
                </div>
                <div class="col-md-5">
                    <label for="kab_sesudah" class="form-label">Kabupaten / Kota</label>
                    <input type="text" name="kab_sesudah" class="form-control" id="kab_sesudah">
                </div>
                <div class="col-md-5">
                    <label for="prov_sesudah" class="form-label">Provinsi</label>
                    <input type="text" name="prov_sesudah" class="form-control" id="prov_sesudah" value="Jawa Barat" readonly>
                </div>
                
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
            
        </div>
        </main>
        </div>
    </div>

        

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    </body>

@endsection