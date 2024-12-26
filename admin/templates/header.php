<?php require_once __DIR__ . "/vendor.php" ?>
<?php require_once middlewarePath('check_auth_user') ?>
<?php require_once middlewarePath('check_user_email_not_verified') ?>
<?php require_once middlewarePath('check_is_admin') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= siteName() ?> - <?= $pageTitle ?? "Dashboard" ?></title>
        <link href="<?= baseUrl('admin/assets/simple-datatables/style.min.css') ?>" rel="stylesheet" />
        
        <link href="<?= baseUrl('admin/assets/css/admin.css') ?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?= assetStyleUrl('main.css') ?>" />

        <link rel="stylesheet" href="<?= assetVendorUrl('sweetalert2/css/sweetalert2.min.css') ?>" />
        <link rel="stylesheet" href="<?= assetVendorUrl('leaflet/leaflet.css') ?>" />

        <script src="<?= assetVendorUrl('sweetalert2/js/sweetalert2.all.min.js') ?>"></script>
        <script src="<?= assetVendorUrl('leaflet/leaflet.js') ?>"></script>

    </head>
    <body class="sb-nav-fixed">