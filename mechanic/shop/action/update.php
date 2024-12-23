<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post" || !isset($_GET['id'])) {
    redirect(baseUrl('mechanic/shop/index.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['shopName']) || empty($_POST['location']) || empty($_POST['phoneNumber'])) {
        redirect(baseUrl('mechanic/shop/edit.php'), ['id' => $_GET['id'], 'error' => 'empty_fields']);
    }
    else {


        $shopName = mysqli_real_escape_string($connection, $_POST['shopName']);
        $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);

        if($_POST['location'] === "other") {

            $location = mysqli_real_escape_string($connection, $_POST['otherLocation']);
        }
        else{
            $location = mysqli_real_escape_string($connection, $_POST['location']);
        }
        
        $userId = $_SESSION['loginId'];
        $website = mysqli_real_escape_string($connection, $_POST['website']);
        $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
        $twitter = mysqli_real_escape_string($connection, $_POST['twitter']);
        $instagram = mysqli_real_escape_string($connection, $_POST['instagram']);
        $tiktok = mysqli_real_escape_string($connection, $_POST['tiktok']);

        $shopId = $_GET['id'];

        $query = "UPDATE shops SET user_id = $userId, location = '$location', phone_number = '$phoneNumber', website = '$website', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', tiktok = '$tiktok' WHERE id = $shopId";

        $result = mysqli_query($connection, $query);

        if($result) {
            redirect(baseUrl('mechanic/shop/edit.php'), ['id' => $_GET['id'], 'success' => 'shop_update_success']);
        }
        else {
            redirect(baseUrl('mechanic/shop/edit.php'), ['id' => $_GET['id'], 'success' => 'shop_update_error']);
        }

    }

}