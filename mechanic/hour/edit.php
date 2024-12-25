<?php $pageTitle = "Modify Working Hour"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath . '/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php
if (isset($_GET['id'])):

$shopWorkingHour = [];
$shopWorkingHourId = $_GET["id"];

$query = "SELECT * FROM hours WHERE id = $shopWorkingHourId";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1):
    $shopWorkingHour = mysqli_fetch_assoc($result);
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
                    <form action="<?= baseUrl('mechanic/hour/action/update.php') ?>" method="POST" enctype="multipart/form-data">

                        <div class="row gy-3 mb-4">

                            <input type="hidden" name="id" value="<?= $shopWorkingHour['id'] ?>" />
                            
                            <div class="col-12">
                                <label for="weekDay" class="fw-bold">Week Day <span class="text-danger">*</span></label>
                                <select name="weekDay" id="weekDay" class="form-select" required>
                                    <option disabled selected hidden>Select Week Day</option>
                                    <?php
                                    if (file_exists(basePath("/json/weekdays.json"))) {

                                        $file = file_get_contents(basePath('/json/weekdays.json'));

                                        $weekDays = json_decode($file);
                                    }
                                    ?>

                                    <?php if (isset($weekDays)) : ?>

                                        <?php foreach ($weekDays as $weekDay): ?>

                                            <?php if($shopWorkingHour['day'] == $weekDay->name): ?>
                                                <option value="<?= $weekDay->name ?>" selected><?= $weekDay->name ?></option>

                                            <?php else: ?>
                                                <option value="<?= $weekDay->name ?>"><?= $weekDay->name ?></option>
                                            <?php endif ?>

                                       

                                        <?php endforeach ?>

                                    <?php endif ?>

                                </select>
                                            
                            </div>


                            <div class="col-12 col-md-6">
                                <label for="opening" class="fw-bold">Opening <span class="text-danger">*</span></label>
                                <input type="time" name="opening" id="opening" value="<?= $shopWorkingHour['closed'] == true ? "" : $shopWorkingHour['opening'] ?>" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="closing" class="fw-bold">Closing <span class="text-danger">*</span></label>
                                <input type="time" value="<?= $shopWorkingHour['closed'] == true ? "" : $shopWorkingHour['closing'] ?>" name="closing" id="closing" class="form-control">
                            </div>

                            <div class="col-12">
                                <label for="shop" class="fw-bold">Select Shop <small><em>(The shops working hours)</em></small> <span class="text-danger">*</span></label>
                                <select name="shop" id="shop" class="form-select">
                                    <option value="" selected hidden>Select Shop</option>
        
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

                                            <?php if($shopWorkingHour['shop_id'] == $shop['id']): ?>

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