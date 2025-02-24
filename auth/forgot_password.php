<?php $pageTitle = "Forgot Password"; ?>
<?php require_once __DIR__ . "/path.php" ?>
<?php require_once $templates . "/header.php"; ?>
<?php require_once middlewarePath('check_guest_user') ?>

<main class="auth-main bg-light d-flex flex-column flex-md-row">

    <section class="form-area py-5 px-2 d-flex flex-column justify-content-md-center">

        <h1 class="text-center mb-4">Forgot Password</h1>

        <form action="action/forgot.php" method="POST" class="w-75 mx-auto" autocomplete="off">

            <div class="card mb-4">
                <div class="card-body">
                    <p> Forgot your password? No problem. Just let us know your email address and we will email you a password reset link </p>
                    <p> You will then use the link to create a new password</p>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="email">Email Address</label>
                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Your Email Address" />
            </div>

    

            <button type="submit" class="btn btn-lg btn-theme-primary text-white d-block w-100">Send Password Reset Link</button>

        </form>


            
    </section>

    <div class="auth-image bg-secondary w-50 d-none d-md-block d-flex justify-content-center align-content-center text-center">
        <a href="<?= baseUrl() ?>" class="logo">
            <img src="<?= baseUrl('assets/logo-white.svg') ?>" alt="Logo" class="img-fluid" style="width:280px" />
        </a>
    </div>

</main>

<?php require_once $templates . "/footer.php"; ?>