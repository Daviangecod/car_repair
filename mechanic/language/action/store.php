<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/language/create.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['language']) || empty($_POST['shop'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/language/create.php'), ['error' => 'empty_fields']);
    }
    else {
        $language = mysqli_real_escape_string($connection, $_POST['language']);
        $shop = mysqli_real_escape_string($connection, $_POST['shop']);
        $userId = $_SESSION['loginId'];

        $query = "INSERT INTO languages(user_id, shop_id, name) VALUES($userId, $shop, '$language')";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Language Creation Successful');
            redirect(baseUrl('mechanic/language/index.php'), ['id' => "$shop", 'success' => 'language_creation_success']);
        }
        else {
            setFlashMessage('error', 'Language Creation Failed');
            redirect(baseUrl('mechanic/language/create.php'), ['error' => 'language_creation_failed']);
        }

    }
}