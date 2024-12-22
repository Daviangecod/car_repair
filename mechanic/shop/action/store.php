<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['shopName']) || empty($_POST['location']) || empty($_POST['phoneNumber'])) {
        redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'empty_fields']);
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
       

        $query = "INSERT INTO shops(user_id, name, location, phone_number, website, facebook, twitter, instagram, tiktok) VALUES($userId, '$shopName', '$location', '$phoneNumber', '$website', '$facebook', '$twitter', '$instagram', '$tiktok')";

        $result = mysqli_query($connection, $query);

        if($result) {
            redirect(baseUrl('mechanic/shop/index.php'), ['success' => 'shop_creation_success']);
        }
        else {
            redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'shop_creation_failed']);
        }

    }

}