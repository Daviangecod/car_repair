<?php 
    $message = getFlashMessage('error');
?>

<?php if($message): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "<?php echo $message ?>"
        });
    </script>
<?php endif ?>