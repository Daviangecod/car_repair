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

    if(empty($_POST['id']) || empty($_POST['paymentType']) || empty($_POST['shop'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/payment/create.php'), ['error' => 'empty_fields']);
    }
    else {
        $paymentType = mysqli_real_escape_string($connection, $_POST['paymentType']);
        $shop = mysqli_real_escape_string($connection, $_POST['shop']);

        $userId = $_SESSION['loginId'];
        $paymentTypeId = $_POST['id'];

        $query = "UPDATE payment_types SET user_id = $userId,  shop_id = $shop, name = '$paymentType' WHERE id = $paymentTypeId";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Payment Type Update Successful');
            redirect(baseUrl('mechanic/payment/edit.php'), ['id' => $paymentTypeId , 'success' => 'payment_type_update_success']);
        }
        else {
            setFlashMessage('error', 'Payment Type Update Failed');
            redirect(baseUrl('mechanic/payment/edit.php'), ['id' => $paymentTypeId , 'error' => 'payment_type_update_failed']);
        }

    }
}