<?php require_once __DIR__ . '/vendor.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= siteName() ?> - <?= $pageTitle ?? "" ?></title>
    <link rel="stylesheet" href="<?= assetVendorUrl('bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= assetStyleUrl('main.css') ?>" />
    <link rel="stylesheet" href="<?= assetVendorUrl('sweetalert2/css/sweetalert2.min.css') ?>" />
    <script src="<?= assetVendorUrl('bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= assetVendorUrl('sweetalert2/js/sweetalert2.all.min.js') ?>"></script>
</head>
<body>