<?php 

session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post" || empty($_POST['id'])) {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('admin/user/index.php'), ['error' => 'method_not_allowed']);
}
else {

    $userId = $_POST['id'];

    if(empty($_POST['fullName']) || empty($_POST['email'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'error' => 'empty_fields']);
    }
    else {

        $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        $checkQuery = "SELECT * FROM users WHERE id = $userId";
        $checkResult = mysqli_query($connection, $checkQuery);

        // If the new email is different from the old email the user has to verify their email
        if(mysqli_num_rows($checkResult) == 1) { 
            $check = mysqli_fetch_assoc($checkResult);

            if($check['email'] !== $email) {

                $query = "UPDATE users SET name = '$fullName', email = '$email', email_verified_at = NULL WHERE id = $userId";
                $result = mysqli_query($connection, $query);
            }
            else {
                $query = "UPDATE users SET name = '$fullName', email = '$email' WHERE id = $userId";
                $result = mysqli_query($connection, $query);
            }
        }
        else {
            setFlashMessage('error', 'Unexpected Error');
            redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'error' => 'unexpected_error']);
        }
        
        if($result) {
            setFlashMessage('success', 'User Details Update Successful');
            redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'success' => 'user_details_update_creation_success']);
        }
        else {
            setFlashMessage('error', 'User Details Update Failed');
            redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'error' => 'user_details_update_failed']);
        }

    }
}