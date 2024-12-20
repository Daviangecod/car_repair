<?php

$basePath = dirname(__DIR__, 2);

require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl('auth/login.php'), ['error' => 'method_not_allowed']);
}
else {


    $email = mysqli_real_escape_string($connection, validateEmail($_POST['email']));
    $password = $_POST['password'];

    try {

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $query);

    
        if(mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result); 
            $hashedPassword = $user['password']; 


               // Verify Password
               if(password_verify($password, $hashedPassword)) {

                     // Start the session and save some user details in the session
                     session_start();
                     $_SESSION['loginId'] = $user['id'];


                     // Check role and redirect to dashboard

                     if($user['role_id'] == ADMIN) {

                        // Save Admin Full Names in Session
                        $admin = [];
                        $fullName = "";

                        $userId = $_SESSION['loginId'];
                        $query = "SELECT * FROM users WHERE id = $userId";
                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) == 1) {
                            $admin = mysqli_fetch_assoc($result);
                        }

                        // dump($admin);
                        // exit;

                        $fullName = $admin['name'];
                        $_SESSION['role'] = "admin";
                        $_SESSION['fullName'] = ucwords($fullName);

                        redirect(baseUrl("/admin/index.php"), ["success" => "login_success"]);
                    }

               }

        }
    
       
        

    } catch (\Exception $e) {
        //throw $th;
    }

   

}