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

        }
    
        dump($result);
        

    } catch (\Exception $e) {
        //throw $th;
    }

   

}