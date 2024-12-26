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

    if(empty($_POST['newPassword']) || empty($_POST['confirmPassword'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'error' => 'empty_fields']);
    }
    else {

        $newPassword = mysqli_real_escape_string($connection, $_POST['newPassword']);
        $confirmPassword = mysqli_real_escape_string($connection, $_POST['confirmPassword']);
    
        if($newPassword !== $confirmPassword) {
            setFlashMessage('error', 'The confirm password must match the new password');
            redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'error' => 'incorrect_password']);
        }


        $hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = '$hashNewPassword' WHERE id = $userId";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'User Password Updated Successful');
            redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'success' => 'password_update_success']);
        }
        else {
            setFlashMessage('error', 'User Password Update Failed');
            redirect(baseUrl('admin/user/edit.php'), ['id' => $userId, 'error' => 'password_update_failed']);
        }

        
    }
}