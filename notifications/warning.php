<?php 
    $message = getFlashMessage('warning');
?>

<?php if($message): ?>
    <script>
        Swal.fire({
            icon: "warning",
            title: "Warning...",
            text: "<?php echo $message ?>"
        });
    </script>
<?php endif ?>