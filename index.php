<?php $pageTitle = "Home"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>
<?php require_once __DIR__ . "/templates/navigation.php"; ?>

<main class="main-homepage bg-secondary bg-main d-flex justify-content-md-center align-items-md-center py-5 py-md-0">


    <section class="container text-center text-white px-5 px-md-0">
        <p>Find car repair shops near you</p>
        <h1 class="fw-bold display-2 mb-5 d-none d-md-block">Find Your Perfect Car <br> Repair Store</h1>
        <h1 class="fw-bold display-5 mb-5 d-block d-md-none">Find Your Perfect Car <br> Repair Store</h1>


        <form action="" class="mx-auto">

            <div class="input-group">
                <label for="search" class="visually-hidden">Search Location</label>
                <input type="search" name="search" id="search" class="form-control form-control-lg input-group rounded-start-5 px-4 py-md-3" placeholder="Search Location" />
                <button type="submit" class="input-group-text btn btn-lg btn-theme-primary rounded-end-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                    Search
                </button>
            </div>

        </form>

    </section>



</main>

<?php require_once __DIR__ . "/templates/footer.php"; ?>