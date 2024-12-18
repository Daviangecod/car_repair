<?php

$basePath = dirname(__DIR__, 2);

require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if($_SERVER['REQUEST_METHOD'] !== "POST") {
    redirect(baseUrl('auth/login.php'), ['error' => 'Method Not Allowed']);
}
else {

    $email = validateEmail($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    dump($result);

}