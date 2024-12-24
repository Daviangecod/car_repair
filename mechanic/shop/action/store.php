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

    if(empty($_POST['shopName']) || empty($_POST['location']) || empty($_POST['phoneNumber']) || empty($_POST['description'])) {
        redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'empty_fields']);
    }
    else {

        $shopName = mysqli_real_escape_string($connection, $_POST['shopName']);
        $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);

        if($_POST['location'] === "other") {

            $location = mysqli_real_escape_string($connection, $_POST['otherLocation']);

            // If it does not already exist, add it
            if(locationJsonSearch($location) == false) {
                $data = [
                    "name" => $location
                ];
                // Incase new location, add the location to the json file
                appendLocationJson($data);
            }

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
        $fileName = '';

        // Check image

        if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            $maxSize = 1024 * 1024; // 1MB
            $uploadDir = basePath('/storage/mechanics/');

            if(!in_array($_FILES['image']['type'], $allowedTypes)){
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'invalid_image_type']);
            }

            if($_FILES['image']['size'] > $maxSize) {
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'image_too_large']);
            }

            // Get the file type
            $fileTypeArray = explode("/", $_FILES['image']['type']);
            $fileType = ".".$fileTypeArray[1];


            $fileName = strtoupper(uniqueId(10)) . time() . $fileType ;

            $destination = $uploadDir . $fileName;

            $move = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if(!$move) {
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'unexpected_image_upload_error']);
            }

        }
       

        $query = "INSERT INTO shops(user_id, name, location, phone_number, website, facebook, twitter, instagram, tiktok, image, description) VALUES($userId, '$shopName', '$location', '$phoneNumber', '$website', '$facebook', '$twitter', '$instagram', '$tiktok', '$fileName', '$description')";

        $result = mysqli_query($connection, $query);

        if($result) {
            redirect(baseUrl('mechanic/shop/index.php'), ['success' => 'shop_creation_success']);
        }
        else {
            redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'shop_creation_failed']);
        }

    }

}