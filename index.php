<?php $pageTitle = "Home"; ?>
<?php require_once __DIR__ . "/templates/header.php"; ?>
<?php require_once __DIR__ . "/templates/navigation.php"; ?>

<main class="main-homepage bg-secondary bg-main d-flex justify-content-md-center align-items-md-center py-5 py-md-0">


    <section class="container text-center text-white">
        <p>Find car repair shops near you</p>
        <h1 class="fw-bold display-4 mb-5">Find Your Perfect Car <br> Repair Store</h1>


        <form action="" class="mx-auto px-3 px-md-0">

            <div class="input-group">
                <label for="search" class="visually-hidden">Search Location</label>
                <input type="search" name="search" id="search" class="form-control form-control-lg input-group rounded-start-5" placeholder="Search Location" />
                <button type="submit" class="input-group-text btn btn-theme-primary rounded-end-5">Search</button>
            </div>

        </form>

    </section>



</main>

<?php require_once __DIR__ . "/templates/footer.php"; ?>