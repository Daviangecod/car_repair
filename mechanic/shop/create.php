<?php $pageTitle = "Create Store"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath . '/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>

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
                    <form action="<?= baseUrl('mechanic/shop/action/store.php') ?>" method="POST" id="addShopForm" enctype="multipart/form-data">

                        <div class="row gy-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label for="shopName" class="fw-bold">Shop Name</label>
                                <input type="text" name="shopName" id="shopName" class="form-control" placeholder="Auto Masters">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="location" class="fw-bold">Location</label>
                                <select name="location" id="location" class="form-select">
                                    <option selected hidden>Select Location</option>
                                    <option value="other">Other Location</option>
                                    <?php
                                    if (file_exists(basePath("/json/locations.json"))) {

                                        $file = file_get_contents(basePath('/json/locations.json'));

                                        $locations = json_decode($file);
                                    }
                                    ?>

                                    <?php if (isset($locations)) : ?>

                                        <?php foreach ($locations as $location): ?>

                                            <option value="<?= $location->name ?>"><?= $location->name ?></option>

                                        <?php endforeach ?>

                                    <?php endif ?>

                                </select>
                                            
                                 <div class="mt-2">
                                    <!-- <label for="otherLocation">Other Location</label> -->
                                    <input type="text" class="form-control d-none" name="otherLocation" id="otherLocation" placeholder="Type Location Here" />
                                 </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="fw-bold">Description</label>
                                <textarea name="description" id="description" class="form-control" style="min-height: 150px; resize:vertical;"></textarea>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="phoneNumber" class="fw-bold">Phone Number</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="600000000">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="website" class="fw-bold">Website</label>
                                <input type="url" name="website" id="website" class="form-control" placeholder="https://www.example.com">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="facebook" class="fw-bold">Facebook</label>
                                <input type="url" name="facebook" id="facebook" class="form-control" placeholder="https://www.facebook.com/autospace">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="twitter" class="fw-bold">Twitter</label>
                                <input type="url" name="twitter" id="twitter" class="form-control" placeholder="https://www.x.com/autospace">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="instagram" class="fw-bold">Instagram</label>
                                <input type="url" name="instagram" id="instagram" class="form-control" placeholder="https://www.instagram.com/autospace">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="tiktok" class="fw-bold">Tiktok</label>
                                <input type="url" name="tiktok" id="tiktok" class="form-control" placeholder="https://www.tiktok.com/autospace">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="image" class="fw-bold">Select Store Image (512 x 512)</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-theme-primary">Create</button>

                    </form>
                </div>

            </div>
        </main>
        <?php require_once $mechanicPath . '/templates/copyright.php' ?>
    </div>
</div>

<?php require_once errorNotification('method_not_allowed') ?>
<?php require_once errorNotification('empty_fields') ?>
<?php require_once errorNotification('shop_creation_failed'); ?>

<?php require_once $mechanicPath . '/templates/footer.php' ?>