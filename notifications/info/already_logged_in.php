<?php if(isset($_GET['info']) && $_GET['info'] === "already_logged_in"): ?>
    <script>
        Swal.fire({
            icon: "info",
            title: "Notice...",
            text: "You are already logged in"
        });
    </script>
<?php endif ?>