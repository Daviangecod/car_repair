<?php $pageTitle = "Book Appointment"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>


<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>

<?php require_once basePath('/config/database.php') ?>

<?php

if (isset($_GET['id'])):

    $shop = [];
    $shopId = $_GET["id"];

    $query = "SELECT * FROM shops WHERE id = $shopId AND visibility = 1";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1):
        $shop = mysqli_fetch_assoc($result);
?>

        <?php require_once __DIR__ . "/templates/navbar.php"; ?>


        <main class="bg-light d-flex justify-content-md-center align-items-md-center">

            <div class="container bg-white h-full px-4 py-5" style="min-height: 100vh!important;">

                <div class="card shadow-sm mt-4 mb-5 rounded" style="overflow: hidden; cursor:pointer;">

                    <div class="row" style="overflow: hidden;">

                        <div class="col-12 col-md-3 d-flex justify-content-start align-items-center ps-4">
                            <div class="d-flex justify-content-center align-items-center border rounded" style="width: 250px; height:250px; overflow:hidden">
                                <?php if ($shop['image'] == null): ?>
                                    <img src="<?= assetImageUrl('no-image.jpg') ?>" alt="shop image" class="img-fluid" style="object-fit:cover; width:100%; height:100%">
                                <?php else: ?>
                                    <img src="<?= storageUrl('mechanics/') . $shop['image'] ?>" alt="shop image" class="img-fluid" style="object-fit:cover; width:100%; height:100%">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 py-3">
                            <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold fs-2"><?= $shop['name'] ?></div>
                            <div class="card-body">
                                <p class="text-uppercase text-secondary fs-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                    </svg>
                                    <span><?= $shop['location'] ?></span>
                                </p>

                                <p class="text-uppercase text-secondary fs-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                    <span><?= $shop['phone_number'] ?></span>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-start">
                                <?php if (!empty($shop['website'])): ?>
                                    <a href="<?= $shop['website'] ?>" target="_blank" class="btn btn-warning">Visit Website</a>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 py-3 px-4">
                            <h3 class="text-uppercase fs-6 fw-bold">Hours</h3>
                            <table class="table">

                                <?php
                                $workingHours = [];
                                $shopId = $shop['id'];
                                $query = "SELECT * FROM hours WHERE shop_id = $shopId ORDER BY CASE 
                                                            WHEN day = 'Sunday' THEN 1
                                                            WHEN day = 'Monday' THEN 2
                                                            WHEN day = 'Tuesday' THEN 3
                                                            WHEN day = 'Wednesday' THEN 4
                                                            WHEN day = 'Thursday' THEN 5
                                                            WHEN day = 'Friday' THEN 6
                                                            WHEN day = 'Saturday' THEN 7
                                                            ELSE 8
                                                        END;";

                                $result = mysqli_query($connection, $query);

                                if ($result) {
                                    $workingHours = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                }
                                ?>
                                <?php if (count($workingHours) > 0): ?>
                                    <ul>

                                        <?php foreach ($workingHours as $workingHour): ?>

                                            <tr>
                                                <th><?= substr($workingHour['day'], 0, 3) ?></th>
                                                <td><?= ($workingHour['closed'] == true) ? "CLOSED" : formatTime($workingHour['opening']) . " - " . formatTime($workingHour['closing']) ?></td>
                                            </tr>

                                        <?php endforeach ?>

                                    </ul>
                                <?php endif ?>


                            </table>

                        </div>

                    </div>

                </div>

                <h1 class="mt-5 mb-3 fs-3 text-center">Book An Appointment</h1>
                <p class="text-center">Please fill and submit the form below with the correct information</p>

                <form action="<?= baseUrl('action/submit_booking.php') ?>" method="POST">

                    <input type="hidden" name="id" value="<?= $shop['id'] ?>" />

                    <div class="row gy-4 mb-3">
                        <div class="col-12 col-md-6">
                            <label for="fullName" class="fw-bold">Full Names<span class="text-danger">*</span></label>
                            <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Dr John Mayers" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="phoneNumber" class="fw-bold">Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="+237222222222" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="email" class="fw-bold">Email Address<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="example@service.com" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="service" class="fw-bold">Service Required<span class="text-danger">*</span></label>
                            <input type="text" name="service" id="service" class="form-control" placeholder="Engine Repairs ..." required>
                        </div>


                        <div class="col-12">
                            <label for="notes" class="fw-bold">Notes<span class="text-danger">*</span></label>
                            <textarea type="text" name="notes" id="notes" class="form-control" placeholder="All important aspects ..." style="min-height: 150px; resize:vertical;" required></textarea>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="preferredDate" class="fw-bold">Preferred Date and Time<span class="text-danger">*</span></label>
                            <input type="datetime-local" name="preferredDate" id="preferredDate" class="form-control" min="<?= date('Y-m-d\TH:i') ?>" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-theme-primary">Submit Booking</button>


                </form>


            </div>

        </main>


        
        <?php require_once notification('error') ?>
        <?php require_once notification('success') ?>
        <?php require_once notification('info') ?>

        <?php require_once __DIR__ . "/templates/footer.php"; ?>


    <?php else: ?>

        <?php require_once basePath('/errors/404.php'); ?>


    <?php endif ?>
<?php endif ?>
