<?php $pageTitle = "Home"; ?>

<?php require_once __DIR__ . '/templates/header.php' ?>
<?php require_once __DIR__ . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>
<?php 
    $activities = [];

    $query = "SELECT * FROM login_activities ORDER BY id DESC";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
        $activities = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                        </svg>
                                        <span class="d-inline-block ms-1">Total Users</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= totalUsers() ?? 0 ?>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                        </svg>
                                        <span class="d-inline-block ms-1">Blocked Accounts</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= totalBlockedAccounts() ?? 0 ?>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                        <span class="d-inline-block ms-1">Listed Shops</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= totalListedShops() ?? 0 ?>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                        </svg>
                                        <span class="d-inline-block ms-1">Total Admins</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= totalAdmins() ?? 0 ?>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                        </svg>
                                        <span class="d-inline-block ms-1">Active Accounts</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= totalActiveAccounts() ?? 0 ?>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                        </svg>
                                        <span class="d-inline-block ms-1">Total Mechanics</span>
                                    </div>

                                    <div class="fs-5">
                                        <?= totalMechanics() ?? 0 ?>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <i class="fas fa-chart-area me-1"></i>
                                <h2 class="fs-6">Login Activity</h2>
                            </div>

                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Role</th>
                                            <th>Login Time</th>
                                            <th>Agent</th>
                                            <th>Attempt Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User</th>
                                            <th>Role</th>
                                            <th>Login Time</th>
                                            <th>Agent</th>
                                            <th>Attempt Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if (isset($activities) && count($activities) > 0): ?>

                                            <?php foreach ($activities as $activity): ?>

                                                <tr class="text-center">
                                                    <td><?= getUser($activity['user_id'])['name'] ?></td>
                                                    <td><?= getUserRole($activity['user_id'])['name'] ?></td>
                                                    <td><?= $activity['login_time'] ?></td>
                                                    <td><?= $activity['user_agent'] ?></td>
                                                    <td><?= $activity['status'] == true ? "<span class='badge bg-success'>success</span>" : "<span class='badge bg-danger text-white text-dark'>failed</span>" ?></td> 
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