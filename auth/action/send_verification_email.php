<?php 
session_start();
require_once __DIR__ . "/vendor.php";
require_once basePath("/config/database.php");
require_once basePath("/includes/constants.php") ;


if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
   setFlashMessage('error', 'Method Not Allowed');
   redirect(baseUrl("auth/email_verification.php"), ["error" => "method_not_allowed"]);
}
else {

    if(!isset($_SESSION['loginId'])) {
        setFlashMessage('error', 'Login to your account');
        redirect(baseUrl("auth/login.php"), ["error" => "authentication_required"]);
    }
  
    $loggedUser = $_SESSION['loginId'];

    $query = "SELECT * FROM users WHERE id = $loggedUser";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) { 
            $user = mysqli_fetch_assoc($result); // Getting the users records as an associative array

            // Generate token and update email verification token field in database;
            $token = uniqueId();

            $query = "UPDATE users SET `token` = '$token' WHERE id = $loggedUser";
            $result = mysqli_query($connection, $query);

            if($result) {

                    // Send email verification mail
                    $email = $user['email'];
                    $name = $user['name'];
                    $link = baseUrl('auth/action/verify_email.php', ["token" => $token]);
                
                    if (sendEmailVerificationMail($email, $name, $link)) {

                        setFlashMessage('success', 'Email Verification Message Sent');
                        redirect(baseUrl("auth/email_verification.php"), ["success" => "email_verification_message_sent"]);

                    } else {
                        setFlashMessage('error', 'Email Verification Message Not Sent');
                        redirect(baseUrl("auth/email_verification.php"), ["error" => "email_verification_message_not_sent"]);
                    }
            }
            else {
                setFlashMessage('error', 'Unexpected Error');
                redirect(baseUrl("auth/email_verification.php"), ["error" => "unexpected_error"]);
            }
    }
    else {
        setFlashMessage('error', 'Unexpected Error');
        redirect(baseUrl("auth/email_verification.php"), ["error" => "unexpected_error"]);
    }
}