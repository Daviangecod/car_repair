<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['shopName']) || empty($_POST['location']) || empty($_POST['phoneNumber']) || empty($_POST['description'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'empty_fields']);
    }
    else {

        $shopName = mysqli_real_escape_string($connection, $_POST['shopName']);
        $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $old = $_POST; // to save old values

        if($_POST['location'] === "other") {

            if(empty($_POST['otherLocation'])) {
                $_SESSION['old'] == $old;
                setFlashMessage('error', 'Fill in the other location');
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'empty_fields']);
            }
            else {

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
                $_SESSION['old'] == $old;
                setFlashMessage('error', 'Image type is invalid, use either a jpg, png or webp image');
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'invalid_image_type']);
            }

            if($_FILES['image']['size'] > $maxSize) {
                $_SESSION['old'] == $old;
                setFlashMessage('error', 'The size of the shop image is too large');
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'image_too_large']);
            }

            // Get the file type
            $fileTypeArray = explode("/", $_FILES['image']['type']);
            $fileType = ".".$fileTypeArray[1];


            $fileName = strtoupper(uniqueId(10)) . time() . $fileType ;

            $destination = $uploadDir . $fileName;

            $move = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if(!$move) {
                $_SESSION['old'] == $old;
                setFlashMessage('error', 'Unexpected Image Upload Error');
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'unexpected_image_upload_error']);
            }

        }
       

        $query = "INSERT INTO shops(user_id, name, location, phone_number, website, facebook, twitter, instagram, tiktok, image, description) VALUES($userId, '$shopName', '$location', '$phoneNumber', '$website', '$facebook', '$twitter', '$instagram', '$tiktok', '$fileName', '$description')";

        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Shop Creation Successful');
            redirect(baseUrl('mechanic/shop/index.php'), ['success' => 'shop_creation_success']);
        }
        else {
            $_SESSION['old'] == $old;
            setFlashMessage('error', 'Shop Creation Failed');
            redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'shop_creation_failed']);
        }

    }

}