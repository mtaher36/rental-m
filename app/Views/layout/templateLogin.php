<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/library/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/library/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/library/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/library/simple-datatables/style.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>

    <?= $this->renderSection('content'); ?>

    <!-- Vendor JS Files -->

    <script src="<?= base_url(); ?>/library/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/library/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>/library/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url(); ?>/library/tinymce/tinymce.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
</body>

</html>