<?php $pageTitle = "Create Service"; ?>

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

                <div>
                    <form action="<?= baseUrl('mechanic/service/action/store.php') ?>" method="POST" enctype="multipart/form-data">

                        <div class="row gy-3 mb-4">
                            <div class="col-12">
                                <label for="shopName" class="fw-bold">Service Name <span class="text-danger">*</span></label>
                                <input type="text" name="serviceName" id="serviceName" class="form-control" placeholder="Wheels Repair" required>
                            </div>

                            <div class="col-12">
                                <label for="shop" class="fw-bold">Select Shop <small><em>(The shop that offers the service)</em></small></label>
                                <select name="shop" id="shop" class="form-select">
                                    <option selected hidden>Select Shop</option>
        
                                    <?php 

                                        $shops = [];

                                        $query = "SELECT * FROM shops";
                                        $result = mysqli_query($connection, $query);

                                        if(mysqli_num_rows($result) > 0) {
                                            $shops = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        }
                                    ?>

                                    <?php if (count($shops) > 0) : ?>

                                        <?php foreach ($shops as $shop): ?>

                                            <option value="<?= $shop['id'] ?>"><?= $shop['name'] ?></option>

                                        <?php endforeach ?>

                                    <?php endif ?>

                                </select>
                                            
                                 <div class="mt-2">
                                    <!-- <label for="otherLocation">Other Location</label> -->
                                    <input type="text" class="form-control d-none" name="otherLocation" id="otherLocation" placeholder="Type Location Here" />
                                 </div>
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

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>

<?php require_once $mechanicPath . '/templates/footer.php' ?>