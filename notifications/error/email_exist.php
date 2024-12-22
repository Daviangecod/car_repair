<?php if(isset($_GET['error']) & $_GET['error'] === "email_exist"): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "The email aready exist in our system"
        });
    </script>
<?php endif ?>