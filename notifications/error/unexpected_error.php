<?php if(isset($_GET['error']) && $_GET['error'] === "unexpected_error"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "An Unexpected Error Occured"
        });
    </script>
<?php endif ?>