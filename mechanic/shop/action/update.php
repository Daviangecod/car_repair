<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post" || !isset($_GET['id'])) {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/shop/index.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['shopName']) || empty($_POST['location']) || empty($_POST['phoneNumber']) || empty($_POST['description'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/shop/edit.php'), ['id' => $_GET['id'], 'error' => 'empty_fields']);
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
        $website = mysqli_real_escape_string($connection, $_POST['website']) ?? NULL;
        $facebook = mysqli_real_escape_string($connection, $_POST['facebook']) ?? NULL;
        $twitter = mysqli_real_escape_string($connection, $_POST['twitter']) ?? NULL;
        $instagram = mysqli_real_escape_string($connection, $_POST['instagram']) ?? NULL;
        $tiktok = mysqli_real_escape_string($connection, $_POST['tiktok']) ?? NULL;
       

        $shopId = $_GET['id'];


        // Get current image from the db and set as default image instead of empty string
        $query = "SELECT image FROM shops WHERE id = $shopId";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $fileName = $data['image'];
        }
        else {
            $fileName = null;
        }
        


        if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            $maxSize = 1024 * 1024; // 1MB
            $uploadDir = basePath('/storage/mechanics/');

            if(!in_array($_FILES['image']['type'], $allowedTypes)){
                setFlashMessage('error', 'Image type is invalid, use either a jpg, png or webp image');
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'invalid_image_type']);
            }

            if($_FILES['image']['size'] > $maxSize) {
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
                setFlashMessage('error', 'Unexpected Image Upload Error');
                redirect(baseUrl('mechanic/shop/create.php'), ['error' => 'unexpected_image_upload_error']);
            }

        }
       

        $query = "UPDATE shops SET user_id = $userId, location = '$location', phone_number = '$phoneNumber', website = '$website', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', tiktok = '$tiktok', image = '$fileName', description = '$description' WHERE id = $shopId";

        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Shop Updated Successful');
            redirect(baseUrl('mechanic/shop/edit.php'), ['id' => $_GET['id'], 'success' => 'shop_update_success']);
        }
        else {
            setFlashMessage('error', 'Shop Update Failed');
            redirect(baseUrl('mechanic/shop/edit.php'), ['id' => $_GET['id'], 'error' => 'shop_update_error']);
        }

    }

}