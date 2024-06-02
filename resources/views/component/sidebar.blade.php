<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item custom-icon">
                <a class="nav-link active" aria-current="page" href="dashboard" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                    <i class="fa-solid fa-house fa-lg"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item custom-icon">
                <a class="nav-link" href="dashboard-warga" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Warga">
                    <i class="fa-solid fa-people-line fa-lg"></i>
                    <span class="nav-text">Data Warga</span>
                </a>
            </li>
            <li class="nav-item custom-icon">
                <a class="nav-link" href="dashboard-data-keluarga" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Kartu Keluarga">
                    <i class="fa-solid fa-people-roof fa-lg"></i>
                    <span class="nav-text">Data Kartu Keluarga</span>
                </a>
            </li>
            <li class="nav-item custom-icon">
                <a class="nav-link" href="dashboard-mutasi" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Warga Sementara">
                    <i class="fa-solid fa-person-arrow-down-to-line fa-lg"></i>
                    <span class="nav-text">Data Warga Sementara</span>
                </a>
            </li>
            <li class="nav-item custom-icon">
                <a class="nav-link" href="dashboard-informasi" data-bs-toggle="tooltip" data-bs-placement="right" title="Informasi">
                    <i class="fa-solid fa-circle-info fa-lg"></i>
                    <span class="nav-text">Informasi</span>
                </a>
            </li>
            <li class="nav-item custom-icon">
                <a class="nav-link" href="dashboard-data-rt" data-bs-toggle="tooltip" data-bs-placement="right" title="Data Ketua RT">
                    <i class="fa-solid fa-user-tie fa-lg"></i>
                    <span class="nav-text">Data Ketua RT</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>