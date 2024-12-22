<?php if(isset($_GET['error']) & $_GET['error'] === "authentication_required"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "You need to login to access that area"
        });
    </script>
<?php endif ?>