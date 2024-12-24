<?php 
    $message = getFlashMessage('info');
?>

<?php if($message): ?>
    <script>
        Swal.fire({
            icon: "info",
            title: "Notice...",
            text: "<?php echo $message ?>"
        });
    </script>
<?php endif ?>