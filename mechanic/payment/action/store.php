<?php 

session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/payment/create.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['paymentType']) || empty($_POST['shop'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/payment/create.php'), ['error' => 'empty_fields']);
    }
    else {
        $paymentType = mysqli_real_escape_string($connection, $_POST['paymentType']);
        $shop = mysqli_real_escape_string($connection, $_POST['shop']);
        $userId = $_SESSION['loginId'];

        $query = "INSERT INTO payment_types(user_id, shop_id, name) VALUES($userId, $shop, '$paymentType')";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Payment Creation Successful');
            redirect(baseUrl('mechanic/payment/index.php'), ['id' => "$shop", 'success' => 'payment_creation_success']);
        }
        else {
            setFlashMessage('error', 'Payment Creation Failed');
            redirect(baseUrl('mechanic/payment/create.php'), ['error' => 'payment_creation_failed']);
        }

    }
}