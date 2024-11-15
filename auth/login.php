<?php $pageTitle = "Login"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>

<main class="auth-main bg-light d-flex flex-column flex-md-row">

    <section class="form-area py-5 px-2 d-flex flex-column justify-content-md-center">

        <h1 class="text-center mb-4">Authentication</h1>

        <form action="" class="w-75 mx-auto" autocomplete="off">

            <div class="form-group mb-4">
                <label for="email">Email Address</label>
                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Your Email Address" />
            </div>

            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Your Password" />
            </div>

            <button type="submit" class="btn btn-lg btn-theme-primary text-white d-block w-100">Login</button>

            <p class="mt-4 text-center">No Account? <a href="<?= baseUrl('auth/register.php') ?>">Create an Account</a></p>

        </form>


            
    </section>

    <div class="auth-image bg-secondary w-50 d-none d-md-block d-flex justify-content-center align-content-center text-center">
        <a href="<?= baseUrl() ?>" class="logo">
            <img src="<?= baseUrl('assets/logo-white.svg') ?>" alt="Logo" class="img-fluid" style="width:280px" />
        </a>
    </div>

</main>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>