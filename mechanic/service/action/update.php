<?php 

session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/service/create.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['serviceName']) || empty($_POST['shop'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/service/create.php'), ['error' => 'empty_fields']);
    }
    else {
        $serviceName = mysqli_real_escape_string($connection, $_POST['serviceName']);
        $shop = mysqli_real_escape_string($connection, $_POST['shop']);

        $serviceId = $_GET['id'];

        $query = "UPDATE services SET shop_id = $shop, name = '$serviceName' WHERE id = $serviceId";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Service Creation Successful');
            redirect(baseUrl('mechanic/service/edit.php'), ['id' => $_GET['id'] , 'success' => 'service_update_success']);
        }
        else {
            setFlashMessage('error', 'Service Creation Failed');
            redirect(baseUrl('mechanic/service/edit.php'), ['id' => $_GET['id'] , 'error' => 'service_update_failed']);
        }

    }
}