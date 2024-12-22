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

        <h1 class="mt-5 fs-3">Find Auto Shops</h1>

        <div class="row py-3">

            <div class="col-12 col-lg-8" style="contain:content">


                <div class="card shadow-sm mb-5 rounded" style="overflow: hidden; cursor:pointer;">

                    <div class="row">

                        <div class="col-12 col-md-3">
                            <img src="<?= assetImageUrl('mechanic-tools.jpg') ?>" style="width: 100%; height:100%; object-fit:cover;" alt="Store Image">
                        </div>

                        <div class="col-12 col-md-9 py-3">
                            <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold">Auto Pro Spare Parts</div>
                            <div class="card-body">
                                <p class="text-uppercase text-secondary fs-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                    </svg>
                                    <small>Biyemassi Yaounde</small>
                                </p>

                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim tempora aliquam eum accusantium nemo! Labore assumenda cupiditate esse. Perspiciatis, dolore.</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-start">
                                <a href="#" class="btn btn-outline-theme-primary">See More</a>
                                <a href="#" class="btn btn-theme-primary">Book Appointment</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card shadow-sm mb-5 rounded" style="overflow: hidden; cursor:pointer;">

                    <div class="row">

                        <div class="col-12 col-md-3">
                            <img src="<?= assetImageUrl('mechanic-tools.jpg') ?>" style="width: 100%; height:100%; object-fit:cover;" alt="Store Image">
                        </div>

                        <div class="col-12 col-md-9 py-3">
                            <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold">Auto Pro Spare Parts</div>
                            <div class="card-body">
                                <p class="text-uppercase text-secondary fs-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                    </svg>
                                    <small>Biyemassi Yaounde</small>
                                </p>

                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim tempora aliquam eum accusantium nemo! Labore assumenda cupiditate esse. Perspiciatis, dolore.</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-start">
                                <a href="#" class="btn btn-outline-theme-primary">See More</a>
                                <a href="#" class="btn btn-theme-primary">Book Appointment</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card shadow-sm mb-5 rounded" style="overflow: hidden; cursor:pointer;">

                    <div class="row">

                        <div class="col-12 col-md-3">
                            <img src="<?= assetImageUrl('mechanic-tools.jpg') ?>" style="width: 100%; height:100%; object-fit:cover;" alt="Store Image">
                        </div>

                        <div class="col-12 col-md-9 py-3">
                            <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold">Auto Pro Spare Parts</div>
                            <div class="card-body">
                                <p class="text-uppercase text-secondary fs-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                    </svg>
                                    <small>Biyemassi Yaounde</small>
                                </p>

                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim tempora aliquam eum accusantium nemo! Labore assumenda cupiditate esse. Perspiciatis, dolore.</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-start">
                                <a href="#" class="btn btn-outline-theme-primary">See More</a>
                                <a href="#" class="btn btn-theme-primary">Book Appointment</a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card shadow-sm mb-5 rounded" style="overflow: hidden; cursor:pointer;">

                    <div class="row">

                        <div class="col-12 col-md-3">
                            <img src="<?= assetImageUrl('mechanic-tools.jpg') ?>" style="width: 100%; height:100%; object-fit:cover;" alt="Store Image">
                        </div>

                        <div class="col-12 col-md-9 py-3">
                            <div class="card-header bg-white border-bottom-0 text-uppercase fw-bold">Auto Pro Spare Parts</div>
                            <div class="card-body">
                                <p class="text-uppercase text-secondary fs-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411" />
                                    </svg>
                                    <small>Biyemassi Yaounde</small>
                                </p>

                                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim tempora aliquam eum accusantium nemo! Labore assumenda cupiditate esse. Perspiciatis, dolore.</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-start">
                                <a href="#" class="btn btn-outline-theme-primary">See More</a>
                                <a href="#" class="btn btn-theme-primary">Book Appointment</a>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Pagination -->
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                        </li>
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