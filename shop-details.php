<?php $pageTitle = "Home"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>
<?php require_once __DIR__ . "/templates/navbar.php"; ?>

<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>

<main class="bg-light d-flex justify-content-md-center align-items-md-center py-5 py-md-0">

    <div class="container bg-white h-full px-4" style="min-height: 100vh!important;">

        <h1 class="mt-5 mb-3 fs-3">Shop Details</h1>


        <div class="card shadow-sm mb-5 rounded" style="overflow: hidden; cursor:pointer;">

            <div class="row">

                <div class="col-12 col-md-3">
                    <img src="<?= assetImageUrl('mechanic-tools.jpg') ?>" style="width: 100%; height:100%; object-fit:cover;" alt="Store Image">
                </div>

                <div class="col-12 col-md-9 py-3">
                    <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold fs-2">Auto Pro Spare Parts</div>
                    <div class="card-body">
                        <p class="text-uppercase text-secondary fs-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                            </svg>
                            <span>Biyemassi Yaounde</span>
                        </p>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-start">
                        <a href="#" class="btn btn-outline-theme-primary">See More</a>
                        <a href="#" class="btn btn-theme-primary">Book Appointment</a>
                        <a href="#" class="btn btn-warning">Visit Website</a>
                    </div>
                </div>

            </div>

        </div>

        <div class="card shadow-sm mb-5 rounded py-3 px-5">

            <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold fs-2 d-flex justify-content-between align-items-center">
                <h2 class="fs-4">About Auto Pro Spare Parts</h2>
                <div>
                    <a href="#" class="text-decoration-none d-inline-block text-secondary" title="facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>

                    <a href="#" class="text-decoration-none d-inline-block ms-2 text-secondary" title="facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="card-body">
    
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim tempora aliquam eum accusantium nemo! Labore assumenda cupiditate esse. Perspiciatis, dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed perspiciatis commodi totam ipsum, accusamus at odio quam officiis, quo labore, veritatis voluptatum. Alias earum sapiente aperiam quae eum, nam nisi sequi molestiae fugiat voluptates enim, exercitationem doloribus rem error itaque!</p>
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

        <div class="card shadow-sm mb-5 rounded">
            <div class="card-title text-center py-2 text-uppercase">Location Map</div>
            <div class="card-body" id="map"></div>
        </div>
    
    </div>


</main>

<script>
    // Initialize the map and set the view to Yaoundé
    const map = L.map('map').setView([3.848, 11.5021], 13); // Coordinates of Yaoundé

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Example JSON data with locations
    const locations = [{
            name: "Location 1",
            lat: 3.845320,
            lng: 11.486672
        },
        {
            name: "Location 2",
            lat: 3.849,
            lng: 11.505
        },
        {
            name: "Location 3",
            lat: 3.850,
            lng: 11.510
        }
    ];

    // Add markers to the map
    locations.forEach(location => {
        L.marker([location.lat, location.lng])
            .addTo(map)
            // .bindPopup(`<b>${location.name}</b>`);
            .bindTooltip(location.name, {
                permanent: false,
                direction: "top"
            }) // Tooltip on hover
            .openTooltip(); // Automatically opens the tooltip
    });

    L.circle([3.848, 11.5021], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);
</script>

<?php require_once __DIR__ . "/templates/footer.php"; ?>