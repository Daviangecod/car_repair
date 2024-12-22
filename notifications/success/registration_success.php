<?php if(isset($_GET['success']) & $_GET['success'] === "registration_success"): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "Your Registration was Successful, you can login"
        });
    </script>
<?php endif ?>