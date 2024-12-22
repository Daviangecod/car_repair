<?php if(isset($_GET['error']) && $_GET['error'] === "invalid_request"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "Invalid Request!"
        });
    </script>
<?php endif ?>