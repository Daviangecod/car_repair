<?php $pageTitle = "View Booking"; ?>

<?php $mechanicPath = dirname(__DIR__, 1); ?>

<?php require_once $mechanicPath . '/templates/header.php' ?>
<?php require_once $mechanicPath . '/templates/navbar.php' ?>
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

            <?php require_once $mechanicPath . '/templates/sidebar.php' ?>

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


                            <div class="d-flex">
                                <?php if($booking['status'] == PENDING): ?>

                                    <form action="<?= baseUrl('mechanic/booking/action/store_status.php') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                    </form>

                                    <form action="<?= baseUrl('mechanic/booking/action/store_status.php') ?>" class="ms-2" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="status" value="declined">
                                        <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                    </form>

                                <?php elseif($booking['status'] == CONFIRMED): ?>

                                    <form action="<?= baseUrl('mechanic/booking/action/store_status.php') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="status" value="declined">
                                        <button type="submit" class="btn btn-sm btn-danger">Decline</button>
                                    </form>

                                    <form action="<?= baseUrl('mechanic/booking/action/store_status.php') ?>" class="ms-2" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-sm btn-warning">Set As Pending</button>
                                    </form>

                                    <form action="<?= baseUrl('mechanic/booking/action/send_status_email.php') ?>" class="ms-2" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="email" value="<?= $booking['email'] ?>">
                                        <input type="hidden" name="name" value="<?= $booking['name'] ?>">
                                        <input type="hidden" name="status" value="confirmed">
                                        <input type="hidden" name="date" value="<?= $booking['preferred_date'] ?>">
                                        <input type="hidden" name="service" value="<?= $booking['service'] ?>">
                                        <button type="submit" class="btn btn-sm btn-info">Send Confirmation Email</button>
                                    </form>

                                <?php elseif($booking['status'] == DECLINED): ?>

                                    <form action="<?= baseUrl('mechanic/booking/action/store_status.php') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                    </form>

                                    <form action="<?= baseUrl('mechanic/booking/action/store_status.php') ?>" class="ms-2" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-sm btn-warning">Set As Pending</button>
                                    </form>

                                    <form action="<?= baseUrl('mechanic/booking/action/send_status_email.php') ?>" class="ms-2" method="POST">
                                        <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                        <input type="hidden" name="email" value="<?= $booking['email'] ?>">
                                        <input type="hidden" name="name" value="<?= $booking['name'] ?>">
                                        <input type="hidden" name="status" value="declined">
                                        <input type="hidden" name="date" value="<?= $booking['preferred_date'] ?>">
                                        <input type="hidden" name="service" value="<?= $booking['service'] ?>">
                                        <button type="submit" class="btn btn-sm btn-info">Send Decline Email</button>
                                    </form>

                                <?php endif ?>
                            </div>


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