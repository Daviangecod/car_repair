<?php if(isset($_GET['error']) && $_GET['error'] === "email_verification_failed"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "Email Verification Failed, Resend Link and Try Again"
        });
    </script>
<?php endif ?>