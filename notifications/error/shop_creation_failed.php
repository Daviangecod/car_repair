<?php if(isset($_GET['error']) && $_GET['error'] === "shop_creation_failed"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "Shop Creation Failed"
        });
    </script>

<?php else: ?>
<?php endif ?>