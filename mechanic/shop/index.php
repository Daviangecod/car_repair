<?php $pageTitle = "Mechanic Stores"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath .'/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php 
    $userId = $_SESSION['loginId'];

    $shops = [];

    $query = "SELECT * FROM shops WHERE user_id = $userId ORDER BY id DESC";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
        $shops = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<div id="layoutSidenav">

    <?php require_once $mechanicPath . '/templates/sidebar.php' ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= ucwords($pageTitle) ?></li>
                </ol>
            
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <a href="<?= baseUrl('mechanic/shop/create.php') ?>" class="btn btn-theme-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
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
                                <?php if(isset($shops) && count($shops) > 0): ?>

                                    <?php foreach($shops as $shop): ?>
                                        
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
        </main>
        <?php require_once $mechanicPath . '/templates/copyright.php' ?>
    </div>
</div>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>

<?php require_once $mechanicPath . '/templates/footer.php' ?>