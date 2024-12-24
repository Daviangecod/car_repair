<?php 
    $message = getFlashMessage('success');
?>

<?php if($message): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Success...",
            text: "<?php echo $message ?>"
        });
    </script>
<?php endif ?>