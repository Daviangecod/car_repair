<?php
session_start();
require_once __DIR__ . '/vendor.php';
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('auth/login.php'), ['error' => 'method_not_allowed']);
} else {


    $email = mysqli_real_escape_string($connection, validateEmail($_POST['email']));
    $password = $_POST['password'];

    try {

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $query);


        if (mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);
            $hashedPassword = $user['password'];

            // If user email is not verified during authentication send mail
            if(emailNotVerified($user['email'])) {

                $token = uniqueId();
                $userId = $user['id'];

                $query = "UPDATE users SET `token` = '$token' WHERE id = $userId";
                $result = mysqli_query($connection, $query);

                if($result) {
                    $email = $user['email'];
                    $name = $user['name'];
                    $link = baseUrl('auth/action/verify_email.php', ["token" => $token]);
                    sendEmailVerificationMail($email, $name, $link);
                }
               
            }


            // Verify Password
            if (password_verify($password, $hashedPassword) == false) {
                setFlashMessage('error', 'Invalid Credentials');
                redirect(baseUrl('auth/login.php'), ['error' => 'invalid_credentials']);
            }

            if($user['active'] == 0) {
                setFlashMessage('info', 'Your account has been deactivated, contact the administrators');
                redirect(baseUrl('auth/login.php'), ['error' => 'deactivated_account']);
            }

                $_SESSION['loginId'] = $user['id'];


                // Check role and redirect to dashboard

                if ($user['role_id'] == ADMIN) {

                    // Save Admin Full Names in Session
                    $admin = [];
                    $fullName = "";

                    $userId = $_SESSION['loginId'];
                    $query = "SELECT * FROM users WHERE id = $userId";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) == 1) {
                        $admin = mysqli_fetch_assoc($result);
                    }

                    // dump($admin);
                    // exit;

                    $fullName = $admin['name'];
                    $_SESSION['role'] = "admin";
                    $_SESSION['fullName'] = ucwords($fullName);

                    setFlashMessage('success', 'Login Successful');
                    redirect(baseUrl("admin/index.php"), ["auth" => "1"]);

                } elseif ($user['role_id'] == MECHANIC) {


                    // Save Mechanic Full Names in Session
                    $mechanic = [];
                    $fullName = "";

                    $userId = $_SESSION['loginId'];
                    $query = "SELECT * FROM users WHERE id = $userId";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) == 1) {
                        $mechanic = mysqli_fetch_assoc($result);
                    }


                    $fullName = $mechanic['name'];
                    $_SESSION['role'] = "mechanic";
                    $_SESSION['fullName'] = ucwords($fullName);

                    setFlashMessage('success', 'Login Successful');
                    redirect(baseUrl("mechanic/index.php"), ["auth" => "1"]);
                }
            
        } 
    } catch (\Exception $e) {
        setFlashMessage('error', 'Unexpected Error');
        redirect(baseUrl('auth/login.php'), ['error' => 'unexpected_error']);
    }
}
