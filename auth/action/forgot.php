<?php
session_start();

require_once __DIR__ . "/vendor.php";
require_once basePath("/config/database.php");
require_once basePath("/includes/constants.php");

if(!$_GET['token']) {
    session_destroy();

    session_start();
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl("auth/login.php"), ["error" => "method_not_allowed"]);
}   
else {
    $token = $_GET['token'];

    // Check user with token
    $query = "SELECT * FROM users WHERE token = '$token'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $userId = $user['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newPassword = $_POST['password'];
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Update user password
            $query = "UPDATE users SET `password` = '$hashedPassword', `token` = null WHERE id = $userId";
            $result = mysqli_query($connection, $query);

            if($result) {
                setFlashMessage('success', 'Password reset successfully');
                redirect(baseUrl("auth/login.php"));
            } else {
                setFlashMessage('error', 'Failed to reset password');
            }
        }
    } else {
        setFlashMessage('error', 'Invalid token');
        redirect(baseUrl("auth/forgot_password.php"));
    }
}
?>