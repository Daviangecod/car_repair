<?php $pageTitle = "User Profile"; ?>


<?php $adminPath = dirname(__DIR__, 1); ?>

<?php require_once $adminPath .'/templates/header.php' ?>
<?php require_once $adminPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>


<?php 

        $user = [];

        $userId = $_GET['id'];

        $query = "SELECT * FROM users WHERE id = $userId";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
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

                <div class="card mb-5">

                    <div class="card-header">
                        Modify User Details
                    </div>

                    <div class="card-body">

                        <form action="<?= baseUrl('admin/user/action/update_user_details.php') ?>" method="POST">

                            <input type="hidden" name="id" value="<?= $user['id'] ?>" />

                            <div class="row gy-3 mb-4">
                                <div class="col-12 col-md-6">
                                    <label for="fullName" class="fw-bold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Johnny Walters" value="<?= $user['name'] ?>" required>
                                </div>


                                <div class="col-12 col-md-6">
                                    <label for="email" class="fw-bold">Email Address<span class="text-danger">*</span><em>(New emails will require the user to carry out email verification)</em></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com" value="<?= $user['email'] ?>" required>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-theme-primary">Update</button>

                        </form>

                    </div>


                </div>

                <div class="card mb-5">

                    <div class="card-header">
                        Change Password
                    </div>

                    <div class="card-body">

                        <form action="<?= baseUrl('admin/user/action/change_password.php') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                            <div class="row gy-3 mb-4">
                    
                                <div class="col-12">
                                    <label for="newPassword" class="fw-bold">New Password<span class="text-danger">*</span></label>
                                    <input type="password" name="newPassword" id="newPassword" class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label for="confirmPassword" class="fw-bold">Confirm New Password<span class="text-danger">*</span></label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-theme-primary">Change</button>

                        </form>

                    </div>


                </div>


            </div>
        </main>
        <?php require_once $adminPath . '/templates/copyright.php' ?>
    </div>
</div>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>
<?php require_once notification('warning') ?>

<?php require_once $adminPath . '/templates/footer.php' ?>