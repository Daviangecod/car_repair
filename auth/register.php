<?php $pageTitle = "Register"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>

<main class="auth-main bg-light d-flex flex-column flex-md-row">

    <section class="form-area py-5 px-2 d-flex flex-column justify-content-md-center">

        <h1 class="text-center mb-4">User Registration</h1>

        <form action="<?= baseUrl('auth/action/store.php') ?>" class="w-75 mx-auto" method="POST" autocomplete="off">

            <div class="form-group mb-4">
                <label for="name">Full Name</label>
                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Your Full Name" />
            </div>

            <div class="form-group mb-4">
                <label for="email">Email Address</label>
                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Your Email Address" />
            </div>

            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Your Password" />
            </div>


            <div class="form-group mb-4">
                <label for="userType">User Type</label>
                <select class="form-control form-control-lg" name="userType" id="userType"> 
                    <option value="" selected hidden>Select a User Type</option>
                    <option value="">Client</option>
                    <option value="">Mechanic</option>
                </select>
            </div>

            <button type="submit" class="btn btn-lg btn-theme-primary text-white d-block w-100">Create Account</button>

            <p class="mt-4 text-center">Already Have An Account? <a href="<?= baseUrl('auth/login.php') ?>">Login</a></p>
            

        </form>

            
    </section>

    <div class="auth-image bg-secondary w-50 d-none d-md-block d-flex justify-content-center align-content-center text-center">
        <a href="<?= baseUrl() ?>" class="logo">
            <img src="<?= baseUrl('assets/logo-white.svg') ?>" alt="Logo" class="img-fluid" style="width:280px" />
        </a>
    </div>

</main>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>