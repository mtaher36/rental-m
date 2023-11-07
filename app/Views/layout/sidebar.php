<?php

$currentUri = $_SERVER['REQUEST_URI'];
$dashboardUri = '/mimin/papan'; //
$katalogUri = '/katalog';
$katalogTambahUri = '/katalog/tambah';
$reviewsUri = '/reviews';
$reviewsTambahUri = '/reviews/tambah';

if ($currentUri == $dashboardUri) {
    $activePage = 'dashboard';
    $activeLink = '';
} elseif ($currentUri == $katalogUri) {
    $activePage = 'dataKatalog';
    $activeLink = 'dataKatalogList';
} elseif ($currentUri == $katalogTambahUri) {
    $activePage = 'dataKatalog';
    $activeLink = 'dataTambahKatalog';
} elseif ($currentUri == $reviewsUri) {
    $activePage = 'dataReviews';
    $activeLink = 'dataReviewsList';
} elseif ($currentUri == $reviewsTambahUri) {
    $activePage = 'dataReviews';
    $activeLink = 'dataTambahReviews';
} else {
    $activePage = '';
    $activeLink = '';
}
?>


<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed  <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>" href="/mimin/papan">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed  <?php echo ($activePage == 'dataKatalog') ? 'active' : ''; ?>" data-bs-target="#katalog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Data Katalog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="katalog-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataKatalogList') ? 'active' : ''; ?>" href="<?= base_url('/katalog'); ?>">
                        <i class="bi bi-circle"></i><span>List Katalog</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataTambahKatalog') ? 'active' : ''; ?>" href="<?= base_url('/katalog/tambah'); ?>">
                        <i class="bi bi-circle"></i><span>Tambah Katalog</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed <?php echo ($activePage == 'dataReviews') ? 'active' : ''; ?>" data-bs-target="#reviews-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-star"></i><span>Reviews</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reviews-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataReviewsList') ? 'active' : ''; ?>" href="/reviews">
                        <i class="bi bi-circle"></i><span>List Review</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link <?php echo ($activeLink == 'dataTambahReviews') ? 'active' : ''; ?>" href="/reviews/tambah">
                        <i class="bi bi-circle"></i><span>Tambah Review</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

    </ul>

</aside><!-- End Sidebar-->