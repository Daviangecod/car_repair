<?php require_once __DIR__ . '/../vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= siteName() ?> | <?= $pageTitle ?? "" ?></title>
    <link rel="stylesheet" href="<?= baseUrl('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= baseUrl('assets/style/main.css') ?>" />
</head>
<body>