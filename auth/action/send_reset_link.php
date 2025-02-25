<?php
require_once __DIR__ . '/vendor.php';
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($connection, validateEmail($_POST['email']));

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $token = uniqueId();
        $userId = $user['id'];

        $query = "UPDATE users SET `reset_token` = '$token', `reset_token_expiry` = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = $userId";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $name = $user['name'];
            $link = baseUrl('auth/reset_password.php', ["token" => $token]);
            sendPasswordResetMail($email, $name, $link);

            setFlashMessage('success', 'Password reset link has been sent to your email.');
            redirect(baseUrl('auth/forgot_password.php'));
        } else {
            setFlashMessage('error', 'Failed to send reset link. Please try again.');
            redirect(baseUrl('auth/forgot_password.php'));
        }
    } else {
        setFlashMessage('error', 'Email address not found.');
        redirect(baseUrl('auth/forgot_password.php'));
    }
}
?>