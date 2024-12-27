<?php $pageTitle = "View Booking"; ?>

<?php $adminPath = dirname(__DIR__, 1); ?>

<?php require_once $adminPath .'/templates/header.php' ?>
<?php require_once $adminPath . '/templates/navbar.php' ?>
<?php require_once basePath('/config/database.php') ?>

<?php

if (isset($_GET['id'])):

    $booking = [];
    $bookingId = $_GET["id"];

    $query = "SELECT * FROM bookings WHERE id = $bookingId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1):
        $booking = mysqli_fetch_assoc($result);
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



                        <div class="card shadow-sm mb-5 rounded p-5" style="overflow: hidden; cursor:pointer;">

                            <h3 class="fs-5"><span class="fw-bold">Service: </span><?= $booking['service'] ?></h3>
                            <p><span class="fw-bold">Name:</span> <?= $booking['name'] ?></p>
                            <p><span class="fw-bold">Phone Number:</span> <?= $booking['phone_number'] ?></p>
                            <p><span class="fw-bold">Email:</span> <?= $booking['email'] ?></p>
                            <p><span class="fw-bold">Status: </span>
                                <?php if ($booking['status'] == PENDING): ?>
                                    <span class='badge bg-warning text-dark'>pending</span>
                                <?php elseif ($booking['status'] == CONFIRMED): ?>
                                    <span class='badge bg-success text-white'>confirmed</span>
                                <?php elseif ($booking['status'] == DECLINED): ?>
                                    <span class='badge bg-danger text-white'>declined</span>
                                <?php endif ?>
                            </p>
                            
                            <h5 style="text-decoration: underline;">Notes</h5>
                            <p>
                                <?= $booking['notes'] ?>
                            </p>

                            <p><span class="fw-bold">Preferred Date and Time: </span> <?= formattedDayDateTimeString($booking['preferred_date'] )?></p>
                        </div>



                    </div>
                </main>
                <?php require_once $adminPath . '/templates/copyright.php' ?>
            </div>
        </div>
    <?php endif ?>
<?php endif ?>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>

<?php require_once $adminPath . '/templates/footer.php' ?>