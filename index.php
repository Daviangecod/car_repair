<?php $pageTitle = "Home"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>
<?php require_once __DIR__ . "/templates/navbar.php"; ?>

<main class="main-homepage bg-secondary bg-main d-flex justify-content-md-center align-items-md-center py-5 py-md-0">


    <section class="container text-center text-white px-5 px-md-0">
        <p>Find car repair shops near you</p>
        <h1 class="fw-bold display-2 mb-5 d-none d-md-block">Find Your Perfect Car <br> Repair Shop</h1>
        <h1 class="fw-bold display-5 mb-5 d-block d-md-none">Find Your Perfect Car <br> Repair Shop</h1>


        <form action="" class="mx-auto">

            <div class="input-group">
                <label for="search" class="visually-hidden">Search Car Repair Shop</label>
                <input type="search" name="search" id="search" class="form-control form-control-lg input-group rounded-start-5 px-4 py-md-3" placeholder="Search Car Repair Shop" />
                <button type="submit" class="input-group-text btn btn-lg btn-theme-primary rounded-end-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-1" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                    Find
                </button>
            </div>

        </form>

    </section>



</main>

<?php require_once __DIR__ . "/templates/footer.php"; ?>