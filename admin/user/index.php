<?php $pageTitle = "All Users"; ?>

<?php $adminPath = dirname(__DIR__, 1); ?>

<?php require_once $adminPath .'/templates/header.php' ?>
<?php require_once $adminPath . '/templates/navbar.php' ?>

<?php require_once basePath('/config/database.php') ?>

<?php 
    $users = [];

    $query = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<div id="layoutSidenav">

    <?php require_once $adminPath . '/templates/sidebar.php' ?>

    <div id="layoutSidenav_content" class="bg-light">

    <main>
            <div class="container px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= ucwords($pageTitle) ?></li>
                </ol>
            
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="fs-6">Manage User Accounts</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php if(isset($users) && count($users) > 0): ?>

                                    <?php foreach($users as $user): ?>
                                        
                                        <tr class="text-center">
                                            <td><?= $user['name'] ?></td>
                                            <td><?= getRole($user['role_id'])['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['active'] == true ? "<span class='badge bg-success'>active</span>" : "<span class='badge bg-danger text-white'>inactive</span>" ?></td>
                                            <td><?= $user['created_at'] ?></td>
                                            <td>
                                                
                                                <?php if($_SESSION['loginId'] == $user['id']): ?>
                                                    <a href="<?= baseUrl('admin/profile.php') ?>" class="btn btn-sm btn-info">Profile</a>
                                                <?php else: ?>
                                                    <a href="<?= baseUrl('admin/user/edit.php', ['id' => $user['id']]) ?>" class="btn btn-sm btn-theme-primary">Edit</a>
                                                <?php endif ?>

                                                <a href="<?= baseUrl('admin/user/delete.php', ['id' => $user['id']]) ?>" class="btn btn-sm btn-danger">Delete</a>
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

        <?php require_once $adminPath . '/templates/copyright.php' ?>
    </div>
</div>

<?php require_once $adminPath . '/templates/footer.php' ?>