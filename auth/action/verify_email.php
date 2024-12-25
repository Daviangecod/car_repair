<?php
session_start();

require_once __DIR__ . "/vendor.php";
require_once basePath("/config/database.php");
require_once basePath("/includes/constants.php") ;

if(!$_GET['token']) {
    session_destroy();

    session_start();
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl("auth/login.php"), ["error" => "method_not_allowed"]);
}   
else {

      // Get logged user from the session
      $loggedUser = $_SESSION['loginId'];
      $loggedUserRole = $_SESSION['role'];
      $token = $_GET['token'];

      // Check user with token
      $query = "SELECT * FROM users WHERE token = '$token'";
      $result = mysqli_query($connection, $query);

      if(mysqli_num_rows($result) == 1) {

            // Set user as verified
            $query = "UPDATE users SET `email_verified_at` = now(), `token` = null WHERE id = $loggedUser";
            $result = mysqli_query($connection, $query);

            if($result) {

                // check if user is admin or student

              
                if($loggedUserRole == "admin") {

                    setFlashMessage('success', 'Email Verification Succesful');
                    redirect(baseUrl("admin/index.php"), ["success" => "email_verification_success"]);
                }

                elseif($loggedUserRole === "mechanic") {
                    setFlashMessage('success', 'Email Verification Succesful');
                    redirect(baseUrl("mechanic/index.php"), ["success" => "email_verification_success"]);
                }

            }
            else {

                setFlashMessage('error', 'Email Verification Failed');
                redirect(baseUrl("auth/email_verification.php"), ["error" => "email_verification_failed"]);
            }
      } 
      else {
            session_destroy();

            session_start();
            setFlashMessage('error', 'Invalid Request');
            redirect(baseUrl("auth/login.php"), ["error" => "invalid_request"]);
      }
}