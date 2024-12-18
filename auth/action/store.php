<?php

$basePath = dirname(__DIR__, 2);

require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if($_SERVER['REQUEST_METHOD'] !== "POST") {
    redirect(baseUrl('auth/register.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        redirect(baseUrl('auth/register.php'), ['error' => 'empty_fields']);
    }
    else {

        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = validateEmail($_POST['email']);
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $roleId = MECHANIC;
    

        if(emailExist($email)) {
            redirect(baseUrl('auth/register.php'), ['error' => 'email_exist']);
        }
        else {
    
            $query = "INSERT INTO users(role_id, name, email, password) VALUES($roleId, '$name', '$email', '$hashedPassword')";
        
            $result = mysqli_query($connection, $query);
        
            if($result) {
                redirect(baseUrl('auth/login.php'), ['success' => 'registration_success']);
            }
            else {
                redirect(baseUrl('auth/register.php'), ['error' => 'unexpected_error']);
            }
    
        }

    }

}


