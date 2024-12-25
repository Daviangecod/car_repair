<?php $pageTitle = "Modify Service"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath . '/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php

if (isset($_GET['id'])):

    $service = [];
    $serviceId = $_GET["id"];

    $query = "SELECT * FROM services WHERE id = $serviceId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1):
        $service = mysqli_fetch_assoc($result);
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

                    <div>
                        <form action="<?= baseUrl('mechanic/service/action/update.php') ?>" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $service['id'] ?>" />

                            <div class="row gy-3 mb-4">
                                <div class="col-12">
                                    <label for="shopName" class="fw-bold">Service Name <span class="text-danger">*</span></label>
                                    <input type="text" name="serviceName" id="serviceName" class="form-control" value="<?= $service['name'] ?>" placeholder="Wheels Repair" required>
                                </div>

                                <div class="col-12">
                                    <label for="shop" class="fw-bold">Select Shop <small><em>(The shop that offers the service)</em></small> <span class="text-danger">*</span></label>
                                    <select name="shop" id="shop" class="form-select" required>
                                        <option  value="" selected hidden>Select Shop</option>

                                        <?php

                                        $shops = [];

                                        $query = "SELECT * FROM shops";
                                        $result = mysqli_query($connection, $query);

                                        if (mysqli_num_rows($result) > 0) {
                                            $shops = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        }
                                        ?>

                                        <?php if (count($shops) > 0) : ?>

                                            <?php foreach ($shops as $shop): ?>

                                                <?php if ($shop['id'] == $service['shop_id']): ?>

                                                    <option value="<?= $shop['id'] ?>" selected><?= $shop['name'] ?></option>

                                                <?php else: ?>

                                                    <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>

                                                <?php endif ?>

                                            <?php endforeach ?>

                                        <?php endif ?>

                                    </select>

                                    <div class="mt-2">
                                        <!-- <label for="otherLocation">Other Location</label> -->
                                        <input type="text" class="form-control d-none" name="otherLocation" id="otherLocation" placeholder="Type Location Here" />
                                    </div>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-theme-primary">Update</button>

                        </form>
                    </div>

                </div>
            </main>
            <?php require_once $mechanicPath . '/templates/copyright.php' ?>
        </div>
    </div>

<?php endif ?>
<?php endif ?>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>

<?php require_once $mechanicPath . '/templates/footer.php' ?>