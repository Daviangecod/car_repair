<?php require_once __DIR__ . "/../../vendor/autoload.php" ?>

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
        <link rel="stylesheet" href="<?= baseUrl('assets/style/main.css') ?>" />
    </head>
    <body class="sb-nav-fixed">