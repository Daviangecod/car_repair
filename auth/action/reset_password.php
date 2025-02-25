<?php
require_once __DIR__ . '/vendor.php';
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = mysqli_real_escape_string($connection, $_POST['token']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        setFlashMessage('error', 'Passwords do not match.');
        redirect(baseUrl('auth/reset_password.php', ['token' => $token]));
    }

    $query = "SELECT * FROM users WHERE reset_token = '$token' AND reset_token_expiry > NOW()";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $userId = $user['id'];

        $query = "UPDATE users SET `password` = '$hashedPassword', `reset_token` = NULL, `reset_token_expiry` = NULL WHERE id = $userId";
        $result = mysqli_query($connection, $query);

        if ($result) {
            setFlashMessage('success', 'Password has been reset successfully.');
            redirect(baseUrl('auth/login.php'));
        } else {
            setFlashMessage('error', 'Failed to reset password. Please try again.');
            redirect(baseUrl('auth/reset_password.php', ['token' => $token]));
        }
    } else {
        setFlashMessage('error', 'Invalid or expired token.');
        redirect(baseUrl('auth/forgot_password.php'));
    }
}
?>
