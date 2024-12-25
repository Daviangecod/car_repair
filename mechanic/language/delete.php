<?php $pageTitle = "Delete Language"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath . '/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<div id="layoutSidenav">

    <?php require_once $mechanicPath . '/templates/sidebar.php' ?>

    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= ucwords($pageTitle) ?></li>
                </ol>

                <div class="card shadow-sm mb-5 rounded w-full" style="overflow: hidden; cursor:pointer;">

                    <div class="card-header">
                        <h6 class="mb-0">Confirm Delete</h6>
                    </div>

                    <form action="<?= baseUrl('mechanic/language/action/destroy.php') ?>" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">

                        <div class="card-body">
                            <p class="mb-0">Are you sure you want to delete this language?</p>
                            <p>Type your password to validate the delete process.</p>

                            <label for="password" class="fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                        </div>

                        <div class="card-footer text-end">
                            <a href="<?= baseUrl('mechanic/language/index.php') ?>" class="btn btn-theme-primary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                
                <div>


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