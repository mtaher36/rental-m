<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('/assets'); ?>/img/icon.jpg" rel="icon">
    <link href="<?= base_url('/assets'); ?>/img/icon.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('/assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('/assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('/assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('/assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('/assets'); ?>/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?= $this->include('client/layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('client/layout/footer'); ?>




    <a href="https://api.whatsapp.com/send?phone=6281359164634" class="btn btn-lg btn-success btn-lg-square rounded-circle scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-whatsapp"></i>
    </a>
    <a href="/" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('/assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/assets'); ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('/assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('/assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('/assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('/assets'); ?>/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('/assets'); ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('/assets'); ?>/js/main.js"></script>
</body>

</html>