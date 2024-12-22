<?php if(isset($_GET['success']) && $_GET['success'] === "shop_creation_success"): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "Shop Creation Successful"
        });
    </script>

<?php else: ?>
<?php endif ?>