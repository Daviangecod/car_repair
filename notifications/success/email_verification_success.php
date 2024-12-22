<?php if(isset($_GET['success']) && $_GET['success'] === "email_verification_success"): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "Email Verification Successful"
        });
    </script>
<?php endif ?>