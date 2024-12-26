<?php
session_start();
require_once __DIR__ . '/vendor.php';
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {

    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('auth/register.php'), ['error' => 'method_not_allowed']);
} else {

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        setFlashMessage('success', 'One or more fields are empty');
        redirect(baseUrl('auth/register.php'), ['error' => 'empty_fields']);
    } else {

        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $email = mysqli_real_escape_string($connection, validateEmail($_POST['email']));

        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        /* if($_POST['userType'] == "client") { $roleId = CLIENT;}
        if($_POST['userType'] == "mechanic") { $roleId = MECHANIC; } */

        $roleId = MECHANIC;


        if (emailExist($email)) {
            setFlashMessage('error', 'Please try using another email');
            redirect(baseUrl('auth/register.php'), ['error' => 'email_exist']);
        } else {

            $query = "INSERT INTO users(role_id, name, email, password) VALUES($roleId, '$name', '$email', '$hashedPassword')";

            $result = mysqli_query($connection, $query);

            if ($result) {
                setFlashMessage('success', 'Registration Success');
                redirect(baseUrl('auth/login.php'), ['success' => 'registration_success']);
            } else {
                setFlashMessage('error', 'Unexpected Error');
                redirect(baseUrl('auth/register.php'), ['error' => 'unexpected_error']);
            }
        }
    }
}
