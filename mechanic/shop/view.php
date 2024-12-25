<?php $pageTitle = "View Store"; ?>

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


                        <div>
                            <div class="card shadow-sm mb-5 rounded" style="overflow: hidden; cursor:pointer;">

                                <div class="row" style="overflow: hidden;">

                                    <div class="col-12 col-md-3 d-flex justify-content-start align-items-center ps-3">
                                        <div class="d-flex justify-content-center align-items-center border rounded" style="width: 250px; height:250px; overflow:hidden">
                                            <?php if ($shop['image'] == null): ?>
                                                <img src="<?= assetImageUrl('no-image.jpg') ?>" alt="shop image" class="img-fluid" style="object-fit:cover; width:100%; height:100%">
                                            <?php else: ?>
                                                <img src="<?= storageUrl('mechanics/') . $shop['image'] ?>" alt="shop image" class="img-fluid" style="object-fit:cover; width:100%; height:100%">
                                            <?php endif ?>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-9 py-3">
                                        <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold fs-2">Auto Pro Spare Parts</div>
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
                                            <?php if (isset($shop['website'])): ?>
                                                <a href="<?= $shop['website'] ?>" target="_blank" class="btn btn-warning">Visit Website</a>
                                            <?php endif ?>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card shadow-sm mb-5 rounded py-3 px-5">

                                <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold fs-2 d-flex justify-content-between align-items-center">
                                    <h2 class="fs-4">About <?= $shop['name'] ?></h2>
                                    <div>

                                        <?php if (!empty($shop['facebook'])): ?>
                                            <a href="<?= $shop['facebook'] ?>" target="_blank" class="text-decoration-none d-inline-block text-secondary" title="facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                                </svg>
                                            </a>
                                        <?php endif ?>

                                        <?php if (!empty($shop['twitter'])): ?>
                                            <a href="<?= $shop['twitter'] ?>" class="text-decoration-none d-inline-block ms-2 text-secondary" title="twitter">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                                                </svg>
                                            </a>
                                        <?php endif ?>

                                        <?php if (!empty($shop['instagram'])): ?>
                                            <a href="<?= $shop['instagram'] ?>" class="text-decoration-none d-inline-block ms-2 text-secondary" title="instagram">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                                </svg>
                                            </a>
                                        <?php endif ?>

                                        <?php if (!empty($shop['tiktok'])): ?>
                                            <a href="<?= $shop['tiktok'] ?>" class="text-decoration-none d-inline-block ms-2 text-secondary" title="tiktok">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                                                </svg>
                                            </a>
                                        <?php endif ?>

                                    </div>
                                </div>
                                <div class="card-body">

                                    <p class="mb-0">
                                        <?= $shop['description'] ?>
                                    </p>
                                </div>

                                <div class="row px-5 py-5">
                                    <div class="col-12 col-md-3">
                                        <h3 class="text-uppercase fs-6 fw-bold">Services</h3>
                                        <ul>
                                            <li>Free Estimates</li>
                                            <li>Insurance Company Assistance</li>
                                            <li>Lifetime Warranty</li>
                                            <li>Automotive Glass Replacement</li>
                                            <li>Detailing</li>
                                            <li>Paintless Dent Repair</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <h3 class="text-uppercase fs-6 fw-bold">Payment Types</h3>
                                        <ul>
                                            <li>Mobile Money</li>
                                            <li>Cash</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <h3 class="text-uppercase fs-6 fw-bold">Languages</h3>
                                        <ul>
                                            <li>English</li>
                                            <li>French</li>
                                        </ul>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <h3 class="text-uppercase fs-6 fw-bold">Hours</h3>
                                        <table class="table">
                                            <tr>
                                                <th>Sun</th>
                                                <td>CLOSED</td>
                                            </tr>
                                            <tr>
                                                <th>Mon</th>
                                                <td>7:30 am - 5:30 pm </td>
                                            </tr>
                                            <tr>
                                                <th>Tue</th>
                                                <td>7:30 am - 5:30 pm </td>
                                            </tr>
                                            <tr>
                                                <th>Wed</th>
                                                <td>7:30 am - 5:30 pm </td>
                                            </tr>
                                            <tr>
                                                <th>Thurs</th>
                                                <td>7:30 am - 5:30 pm </td>
                                            </tr>
                                            <tr>
                                                <th>Fri</th>
                                                <td>7:30 am - 5:30 pm </td>
                                            </tr>
                                            <tr>
                                                <th>Sat</th>
                                                <td>CLOSED</td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>

                            </div>

                            <div class="card shadow-sm mb-5 rounded" style="height: 500px;">
                                <div class="card-title text-center py-2 text-uppercase">Location Map</div>
                                <div class="card-body" id="map"></div>
                            </div>
                        </div>

                    </div>
                </main>
                <?php require_once $mechanicPath . '/templates/copyright.php' ?>
            </div>
        </div>

        <script>
            // Initialize the map and set the view to Yaoundé
            const map = L.map('map').setView([3.848, 11.5021], 13); // Coordinates of Yaoundé

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Function to fetch latitude and longitude using Nominatim
            async function fetchLatLon(location) {
                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`);
                const data = await response.json();
                if (data.length > 0) {
                    return {
                        lat: parseFloat(data[0].lat),
                        lon: parseFloat(data[0].lon)
                    };
                } else {
                    throw new Error('Location not found');
                }
            }

            // Wrap everything inside an IIFE (Immediately Invoked Function Expression) to use `await`
            (async () => {
                try {
                    // Get the location from PHP
                    const location = "<?php echo $shop['location']; ?>";

                    // Fetch latitude and longitude
                    const { lat, lon } = await fetchLatLon(location);

                    // Center map and add a temporary marker
                    const marker = L.marker([lat, lon]).addTo(map).bindPopup(location).openPopup();
                    map.setView([lat, lon], 13);

                } catch (err) {
                    console.error(err.message);
                }
            })();
        </script>

    <?php endif ?>
<?php endif ?>

<?php require_once notification('error') ?>
<?php require_once notification('success') ?>
<?php require_once notification('info') ?>

<?php require_once $mechanicPath . '/templates/footer.php' ?>