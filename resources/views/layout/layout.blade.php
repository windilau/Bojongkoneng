<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Bojong Koneng Insight</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
        </script>
        <script src="dashboard.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Inisialisasi DataTables
            $(document).ready(function() {
                var table = $('#dataTable').DataTable({
                    dom: '<"d-flex justify-content-between"lf>rtip',
                });

                // Custom search input
                $('#tableSearch').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>

        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            // Normal
            $(function() {
                $('#provinsi').on('change', function() {
                    let id_provinsi = $('#provinsi').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getKabupaten')}}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kab_kota').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                $('#kab_kota').on('change', function() {
                    let id_kabupaten = $('#kab_kota').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getKecamatan')}}",
                        data: {
                            id_kabupaten: id_kabupaten
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kecamatan').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                $('#kecamatan').on('change', function() {
                    let id_kecamatan = $('#kecamatan').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getDesa')}}",
                        data: {
                            id_kecamatan: id_kecamatan
                        },
                        cache: false,

                        success: function(msg) {
                            $('#desa_kelurahan').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                // Mutasi Sebelum
                $('#prov_sebelum').on('change', function() {
                    let id_provinsi = $('#prov_sebelum').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getKabupaten')}}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kab_sebelum').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                $('#kab_sebelum').on('change', function() {
                    let id_kabupaten = $('#kab_sebelum').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getKecamatan')}}",
                        data: {
                            id_kabupaten: id_kabupaten
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kec_sebelum').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                $('#kec_sebelum').on('change', function() {
                    let id_kecamatan = $('#kec_sebelum').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getDesa')}}",
                        data: {
                            id_kecamatan: id_kecamatan
                        },
                        cache: false,

                        success: function(msg) {
                            $('#desa_sebelum').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                // Mutasi Sesudah
                $('#prov_sesudah').on('change', function() {
                    let id_provinsi = $('#prov_sesudah').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getKabupaten')}}",
                        data: {
                            id_provinsi: id_provinsi
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kab_sesudah').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                $('#kab_sesudah').on('change', function() {
                    let id_kabupaten = $('#kab_sesudah').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getKecamatan')}}",
                        data: {
                            id_kabupaten: id_kabupaten
                        },
                        cache: false,

                        success: function(msg) {
                            $('#kec_sesudah').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })

                $('#kec_sesudah').on('change', function() {
                    let id_kecamatan = $('#kec_sesudah').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{route('getDesa')}}",
                        data: {
                            id_kecamatan: id_kecamatan
                        },
                        cache: false,

                        success: function(msg) {
                            $('#desa_sesudah').html(msg);
                        },
                        error: function(data) {
                            console.log('error: ', data);
                        },
                    })
                })
            });
        </script>


        <script>
            // Delete
            function confirmation(event) {
                event.preventDefault();
                swal({
                    title: "Apakah anda yakin menghapus Data ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        event.target.closest('form').submit();
                    }
                });
                return false;
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @yield('content');
</body>

</html>