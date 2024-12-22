<?php if(isset($_GET['error']) && $_GET['error'] === "authentication_required"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "You need to login"
        });
    </script>
<?php endif ?>