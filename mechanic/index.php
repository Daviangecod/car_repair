<?php $pageTitle = "Home"; ?>

<?php require_once __DIR__ . '/templates/header.php' ?>
<?php require_once __DIR__ . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php 
    $userId = $_SESSION['loginId'];

    $shops = [];

    $query = "SELECT * FROM shops WHERE user_id = $userId ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
        $shops = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $shopQuery = "SELECT * FROM shops WHERE user_id = $userId";
    $shopQueryResult = mysqli_query($connection, $shopQuery);
    $totalShops = mysqli_num_rows($shopQueryResult);


    $serviceQuery = "SELECT * FROM services WHERE user_id = $userId";
    $serviceQueryResult = mysqli_query($connection, $serviceQuery);
    $totalServices = mysqli_num_rows($serviceQueryResult);

    $paymentTypeQuery = "SELECT * FROM payment_types WHERE user_id = $userId";
    $paymentTypeQueryResult = mysqli_query($connection, $paymentTypeQuery);
    $totalPaymentTypes = mysqli_num_rows($paymentTypeQueryResult);
?>

<div id="layoutSidenav">

    <?php require_once  __DIR__ . '/templates/sidebar.php' ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">Dashboard</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= ucwords($pageTitle) ?></li>
                </ol>

                <div class="row mb-3">
                    <div class="col-xl-4 col-md-6">
                        <a href="#" class="text-decoration-none text-black">
                            <div class="card  mb-4" style="min-height: 100px;">
                                <div class="card-body d-flex justify-content-between align-items-center">

                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                                        </svg>
                                        <span class="d-inline-block ms-1">Shops</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= $totalShops ?? 0 ?>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <a href="#" class="text-decoration-none text-black">
                            <div class="card  mb-4" style="min-height: 100px;">
                                <div class="card-body d-flex justify-content-between align-items-center">

                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                        </svg>
                                        <span class="d-inline-block ms-1">Services</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= $totalServices ?? 0 ?>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-xl-4 col-md-6">
                        <a href="#" class="text-decoration-none text-black">
                            <div class="card  mb-4" style="min-height: 100px;">
                                <div class="card-body d-flex justify-content-between align-items-center">

                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                                        </svg>
                                        <span class="d-inline-block ms-1">Payment Types</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= $totalPaymentTypes ?? 0  ?>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="row">

                    <div class="col-xl-12">

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <a href="<?= baseUrl('mechanic/shop/create.php') ?>" class="btn btn-theme-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    <span class="d-inline-block ms-1">Add Shop</span>
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Visibility</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Visibility</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (isset($shops) && count($shops) > 0): ?>

                                            <?php foreach ($shops as $shop): ?>

                                                <tr class="text-center">
                                                    <td><?= $shop['name'] ?></td>
                                                    <td><?= $shop['location'] ?></td>
                                                    <td><?= $shop['visibility'] == true ? "<span class='badge bg-success'>visible</span>" : "<span class='badge bg-warning text-dark'>not visible</span>" ?></td>
                                                    <td><?= $shop['created_at'] ?></td>
                                                    <td>
                                                        <a href="<?= baseUrl('mechanic/shop/edit.php', ['id' => $shop['id']]) ?>" class="btn btn-sm btn-theme-primary">Edit</a>

                                                        <a href="<?= baseUrl('mechanic/shop/view.php', ['id' => $shop['id']]) ?>" class="btn btn-sm btn-warning">View</a>

                                                        <a href="<?= baseUrl('mechanic/shop/delete.php', ['id' => $shop['id']]) ?>" class="btn btn-sm btn-danger">Delete</a>
                                                    </td>
                                                </tr>

                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </main>
        <?php require_once __DIR__ . '/templates/copyright.php' ?>
    </div>
</div>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>

<?php require_once __DIR__ . '/templates/footer.php' ?>