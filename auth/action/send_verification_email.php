<?php 
session_start();

require_once __DIR__ . "/vendor.php";
require_once basePath("/config/database.php");
require_once basePath("/includes/constants.php") ;


if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
   redirect(baseUrl("auth/email_verification.php"), ["error" => "method_not_allowed"]);
}
else {

    if(!isset($_SESSION['loginId'])) {
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
                    $subject = 'Verify your email address';
                    $title = "Email Verification";
                    $greeting = "Hello User";
                    $link = baseUrl('auth/action/verify_email.php', ["token" => $token]);
                    $body = email_verification_message($link);

                    $message = mailTemplate($title, $greeting, $body);
                
                    if (sendMail($email, $subject, $message)) {

                        redirect(baseUrl("auth/email_verification.php"), ["success" => "email_verification_message_sent"]);

                    } else {
                        redirect(baseUrl("auth/email_verification.php"), ["error" => "email_verification_message_not_sent"]);
                    }
            }
            else {
                redirect(baseUrl("auth/email_verification.php"), ["error" => "unexpected_error"]);
            }
    }
    else {
        redirect(baseUrl("auth/email_verification.php"), ["error" => "unexpected_error"]);
    }
}