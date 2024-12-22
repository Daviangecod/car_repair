<?php if(isset($_GET['success']) & $_GET['success'] === "login_success"): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "Authentication Successful"
        });
    </script>
<?php endif ?>