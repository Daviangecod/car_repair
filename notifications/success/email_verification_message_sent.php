<?php if(isset($_GET['success']) && $_GET['success'] === "email_verification_message_sent"): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "Email Verification Message Sent! Verify your email"
        });
    </script>
<?php endif ?>