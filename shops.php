<?php $pageTitle = "Home"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>
<?php require_once __DIR__ . "/templates/navbar.php"; ?>
<?php require_once basePath('/config/database.php') ?>

<style>
    #map {
        height: 500px;
        width: 100%;
    }

    .shop {
        transition: all 150ms ease-in-out;
    }

    .shop:hover {
        border: 3px solid #404a76;
    }
</style>

<?php
    $limit = 10; // Number of records per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
    $page = max($page, 1); // Ensure page is at least 1
    $offset = ($page - 1) * $limit; // Offset for SQL query

    // Get the search query from the user (if present)
    $searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';

    // Base query for counting total records (with search condition)
    $totalQuery = "SELECT COUNT(*) AS total FROM shops WHERE name LIKE '%$searchQuery%'"; // Assuming you're searching by 'name'
    $totalResult = mysqli_query($connection, $totalQuery);
    $totalRow = mysqli_fetch_assoc($totalResult);
    $totalRecords = $totalRow['total'];

    // Calculate total pages
    $totalPages = ceil($totalRecords / $limit);

    // Get the shops with search condition applied
    $shops = [];

    $query = "SELECT * FROM shops WHERE name LIKE '%$searchQuery%' ORDER BY id DESC LIMIT $offset, $limit"; 
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $shops = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<main class="bg-light d-flex justify-content-md-center align-items-md-center py-5 py-md-0">

    <div class="container bg-white h-full px-4" style="min-height: 100vh!important;">

        <h1 class="mt-5 fs-3">Find Auto Shops</h1>

        <div class="row py-3">

            <div class="col-12 col-lg-8" style="contain:content">

                <?php if (count($shops) > 0): ?>

                    <?php foreach ($shops as $shop): ?>

                        <div class="card shadow-sm mb-5 rounded shop" style="overflow: hidden; cursor:pointer;" data-location="<?= str_replace(' ', '+', $shop['location']) ?>">

                            <div class="row">

                                <div class="col-12 col-md-3">
                                    <?php if ($shop['image'] == null): ?>
                                        <img src="<?= assetImageUrl('no-image.jpg') ?>" alt="shop image" class="img-fluid border" style="object-fit:cover; width:100%; height:100%">
                                    <?php else: ?>
                                        <img src="<?= storageUrl('mechanics/') . $shop['image'] ?>" alt="shop image" class="img-fluid border" style="object-fit:cover; width:100%; height:100%">
                                    <?php endif ?>
                                </div>

                                <div class="col-12 col-md-9 py-3">
                                    <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold"><?= $shop['name'] ?></div>
                                    <div class="card-body">
                                        <p class="text-uppercase text-secondary fs-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                            </svg>
                                            <small><?= $shop['location'] ?></small>
                                        </p>

                                        <p class="text-uppercase text-secondary fs-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                                </svg>
                                                <span><?= $shop['phone_number'] ?></span>
                                        </p>

                                
                                    </div>
                                    <div class="card-footer bg-white border-top-0 text-start">
                                        <a href="<?= baseUrl('shop-details.php', ['id' => $shop['id']]) ?>" class="btn btn-outline-theme-primary">See More</a>
                                       
                                    </div>
                                </div>

                            </div>

                        </div>

                    <?php endforeach ?>


                <?php endif ?>


                <!-- Pagination -->
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">

                            <?php if($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= baseUrl('shops.php', ['page' => ($page - 1)]) ?>">Previous</a>
                                </li>
                            <?php endif ?>
               

                            <?php  for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>"><a class="page-link" href="<?= baseUrl('shops.php', ['page' => $i]) ?>"><?= $i ?></a></li>
                            <?php endfor ?>
                                
                            <?php if ($page < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= baseUrl('shops.php', ['page' => $page + 1]) ?>">Next</a>
                                </li>
                            <?php endif ?>
                  
                
                    </ul>
                </nav>

            </div>


            <div class="col-12 col-lg-4" style="contain:content;">

                <div class="card shadow-sm mb-5 sticky-top">
                    <div class="card-header">Location Map</div>
                    <div id="map" class="card-body"></div>
                </div>


            </div>

        </div>




    </div>

</main>

<script>
    // Initialize the map and set the view to Yaoundé
    const map = L.map('map').setView([3.848, 11.5021], 13); // Default view for Yaoundé

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Function to fetch latitude and longitude using Nominatim
    async function fetchLatLon(location) {
        // const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}+Yaounde+Cameroon`);

        const response = await fetch(`https://geocode.maps.co/search?q=${encodeURIComponent(location)}+Yaounde+Cameroon&api_key=676c4d55c9d3e594532280egr337ea1`);

        const data = await response.json();
        if (data.length > 0) {
            return { lat: parseFloat(data[0].lat), lon: parseFloat(data[0].lon) };
        } else {
            throw new Error('Location not found');
        }
    }

    // Variable to store the currently displayed marker
    let currentMarker = null;

    // Add hover event to shop listings
    const shops = document.querySelectorAll('.shop');
    shops.forEach(shop => {
        shop.addEventListener('mouseover', async (e) => {
            const location = shop.getAttribute('data-location');
            try {
                // Fetch the coordinates for the location
                const { lat, lon } = await fetchLatLon(location);

                // Remove the current marker if it exists
                if (currentMarker) {
                    map.removeLayer(currentMarker);
                }

                // Add a new marker and set it as the current marker
                currentMarker = L.marker([lat, lon]).addTo(map).bindPopup(location).openPopup();

                // Center the map on the new marker
                map.setView([lat, lon], 13);
            } catch (error) {
                console.error('Error fetching location:', error);
            }
        });
    });

   
</script>

<?php require_once __DIR__ . "/templates/footer.php"; ?>