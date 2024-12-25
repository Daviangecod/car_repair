<?php $pageTitle = "Modify Store"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath . '/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php

if (isset($_GET['id'])):

    $userId = $_SESSION['loginId'];
    $shop = [];
    $shopId = $_GET["id"];

    $query = "SELECT * FROM shops WHERE user_id = $userId AND id = $shopId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1):
        $shop = mysqli_fetch_assoc($result);
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

                        <div class="mb-3">
                            <div class="rounded-circle d-flex justify-content-center align-items-center border" style="width: 150px; height:150px; overflow:hidden">
                                <?php if($shop['image'] == null): ?>
                                    <img src="<?= assetImageUrl('no-image.jpg') ?>" alt="shop image" class="img-fluid" style="object-fit:cover; width:100%; height:100%">
                                <?php else: ?>
                                    <img src="<?= storageUrl('mechanics/') . $shop['image'] ?>" alt="shop image" class="img-fluid" style="object-fit:cover; width:100%; height:100%">
                                <?php endif ?>
                            </div>
                        </div>

                        <div>
                            <form action="<?= baseUrl('mechanic/shop/action/update.php', ['id' => $shop['id']]) ?>" method="POST" id="addShopForm" enctype="multipart/form-data">

                                <div class="row gy-3 mb-4">
                                    <div class="col-12 col-md-6">
                                        <label for="shopName" class="fw-bold">Shop Name</label>
                                        <input type="text" name="shopName" id="shopName" class="form-control" value="<?= $shop['name'] ?>" placeholder="Auto Masters">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="location" class="fw-bold">Location</label>
                                        <select name="location" id="location" class="form-select" required>
                                            <option value="" selected hidden>Select Location</option>
                                            <option value="other">Other Location</option>
                                            <?php
                                            if (file_exists(basePath("/json/locations.json"))) {

                                                $file = file_get_contents(basePath('/json/locations.json'));

                                                $locations = json_decode($file);
                                            }
                                            ?>

                                            <?php if (isset($locations)) : ?>

                                                <?php foreach ($locations as $location): ?>

                                                    <?php if ($location->name == $shop['location']): ?>

                                                        <option value="<?= $location->name ?>" selected><?= $location->name ?></option>

                                                    <?php else: ?>

                                                        <option value="<?= $location->name ?>"><?= $location->name ?></option>

                                                    <?php endif ?>

                                                <?php endforeach ?>

                                            <?php endif ?>

                                        </select>

                                        <div class="mt-2">
                                            <!-- <label for="otherLocation">Other Location</label> -->
                                            <input type="text" class="form-control d-none" name="otherLocation" id="otherLocation" placeholder="Type Location Here" value="<?= $shop["location"] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="description" class="fw-bold">Description</label>
                                        <textarea name="description" id="description" class="form-control" style="min-height: 150px; resize:vertical;"><?= $shop['description'] ?></textarea>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="phoneNumber" class="fw-bold">Phone Number</label>
                                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="<?= $shop['phone_number'] ?>" placeholder="600000000">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="website" class="fw-bold">Website</label>
                                        <input type="url" name="website" value="<?= $shop['website'] ?>" id="website" class="form-control" placeholder="https://www.example.com">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="facebook" class="fw-bold">Facebook</label>
                                        <input type="url" name="facebook" id="facebook" value="<?= $shop['facebook'] ?>" class="form-control" placeholder="https://www.facebook.com/autospace">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="twitter" class="fw-bold">Twitter</label>
                                        <input type="url" name="twitter" id="twitter" value="<?= $shop['twitter'] ?>" class="form-control" placeholder="https://www.x.com/autospace">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="instagram" class="fw-bold">Instagram</label>
                                        <input type="url" name="instagram" id="instagram" value="<?= $shop['instagram'] ?>" class="form-control" placeholder="https://www.instagram.com/autospace">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="tiktok" class="fw-bold">Tiktok</label>
                                        <input type="url" name="tiktok" id="tiktok" class="form-control" value="<?= $shop['tiktok'] ?>" placeholder="https://www.tiktok.com/autospace">
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="image" class="fw-bold">Select Store Image (512 x 512)</label>
                                        <input type="file" name="image" id="image" class="form-control">
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