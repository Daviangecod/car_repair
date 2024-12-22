<?php if(isset($_GET['error']) & $_GET['error'] === "invalid_credentials"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "One or More Credentials are Invalid"
        });
    </script>
<?php endif ?>