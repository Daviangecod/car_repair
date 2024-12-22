<?php if(isset($_GET['error']) && $_GET['error'] === "empty_fields"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "One or More Fields are Empty"
        });
    </script>
<?php endif ?>