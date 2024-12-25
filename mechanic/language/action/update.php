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

    if(empty($_POST['id']) || empty($_POST['language']) || empty($_POST['shop'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/language/create.php'), ['error' => 'empty_fields']);
    }
    else {
        $language = mysqli_real_escape_string($connection, $_POST['language']);
        $shop = mysqli_real_escape_string($connection, $_POST['shop']);
        $userId = $_SESSION['loginId'];

        $languageId = $_POST['id'];

        $query = "UPDATE languages SET user_id = $userId, shop_id = $shop, name = '$language' WHERE id = $languageId";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Language Update Successful');
            redirect(baseUrl('mechanic/language/edit.php'), ['id' => $languageId , 'success' => 'language_update_success']);
        }
        else {
            setFlashMessage('error', 'Language Update Failed');
            redirect(baseUrl('mechanic/language/edit.php'), ['id' => $languageId , 'error' => 'language_update_failed']);
        }

    }
}