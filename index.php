<?php require "./vendor/autoload.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D-Cars | Home</title>
    <link rel="stylesheet" href="<?= baseUrl('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= baseUrl('assets/style/main.css') ?>" />
</head>

<body>

    
    <header class="py-3 bg-theme-primary">
        
        <div class="container d-flex flex-column flex-md-row justify-content-md-between text-center text-md-start">
            <a href="#" class="logo">
                <img src="<?= baseUrl('assets/logo-white.svg') ?>" alt="Logo" class="img-fluid" style="width:150px" />
            </a>
            
            <nav class="nav flex-column flex-md-row gap-3 text-center text-md-start">
                <a class="nav-link text-white" aria-current="page" href="#">
                        Home
                    </a>
                    <a class="nav-link text-white" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                        Register a Store
                    </a>
                    <a class="btn btn-light rounded-5" href="#">Find Shop</a>
                    
                </nav>
            </div>
            
    </header>
        
        
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

    <script src="<?= baseUrl('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>