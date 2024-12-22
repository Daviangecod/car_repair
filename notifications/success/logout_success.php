<?php if(isset($_GET['success']) && $_GET['success'] === "logout_success"): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "Logout Successful"
        });
    </script>
<?php endif ?>