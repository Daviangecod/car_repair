<?php if(isset($_GET['error']) && $_GET['error'] === "method_not_allowed"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "Method not allowed"
        });
    </script>

<?php else: ?>
<?php endif ?>