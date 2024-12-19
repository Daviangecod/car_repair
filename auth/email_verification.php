<?php $pageTitle = "Email Verification"; ?>
<?php require_once __DIR__ . "/../templates/header.php"; ?>

<main class="auth-main bg-light d-flex flex-column flex-md-row">

    <section class="form-area py-5 px-2 d-flex flex-column justify-content-md-center">

        <h1 class="text-center mb-4">Email Verification</h1>

        <form action="<?= baseUrl("auth/action/send_verification_email.php") ?>" method="POST">

            <div class="card w-75 mx-auto bg-white">

                <div class="card-header">
                    <h3 class="text-center fs-5">Check your Email Address</h3>
                </div>

                <div class="card-body">
                    <p> Thanks for signing up! Before you get started, could you please verify your email address, by clicking on the link we just emailed you? </p>
                    <p> If you didn't receive the email, we will gladly send you another.</p>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-lg btn-theme-primary text-white d-block w-50 mx-auto">Resend</button>
                </div>

            </div>

        </form>


            
    </section>

    <div class="auth-image bg-secondary w-50 d-none d-md-block d-flex justify-content-center align-content-center text-center">
        <a href="<?= baseUrl() ?>" class="logo">
            <img src="<?= baseUrl('assets/logo-white.svg') ?>" alt="Logo" class="img-fluid" style="width:280px" />
        </a>
    </div>

</main>

<?php require_once __DIR__ . "/../templates/footer.php"; ?>