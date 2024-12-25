<?php 

session_start();
$basePath = dirname(__DIR__ , 2);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/profile.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['oldPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/profile.php'), ['error' => 'empty_fields']);
    }
    else {
        $oldPassword = mysqli_real_escape_string($connection, $_POST['oldPassword']);
        $newPassword = mysqli_real_escape_string($connection, $_POST['newPassword']);
        $confirmPassword = mysqli_real_escape_string($connection, $_POST['confirmPassword']);
      
        $userId = $_SESSION['loginId'];


        if($newPassword !== $confirmPassword) {
            setFlashMessage('error', 'The confirm password must match the new password');
            redirect(baseUrl('mechanic/profile.php'), ['error' => 'incorrect_password']);
        }

        $checkQuery = "SELECT * FROM users WHERE id = $userId";
        $checkResult = mysqli_query($connection, $checkQuery);

        // If the new email is different from the old email the user has to verify their email
        if(mysqli_num_rows($checkResult) == 1) { 
            
            $check = mysqli_fetch_assoc($checkResult);

            if(password_verify($oldPassword, $check['password'])) {

                $hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $query = "UPDATE users SET password = '$hashNewPassword' WHERE id = $userId";
                $result = mysqli_query($connection, $query);

                if($result) {
                    setFlashMessage('success', 'User Password Updated Successful');
                    redirect(baseUrl('mechanic/profile.php'), ['success' => 'password_update_success']);
                }
                else {
                    setFlashMessage('error', 'User Password Update Failed');
                    redirect(baseUrl('mechanic/profile.php'), ['error' => 'password_update_failed']);
                }

            }
            else {
                setFlashMessage('error', 'Incorrect Old Password');
                redirect(baseUrl('mechanic/profile.php'), ['error' => 'incorrect_password']);
            }


        }
        else {
            setFlashMessage('error', 'Unexpected Error');
            redirect(baseUrl('mechanic/profile.php'), ['error' => 'unexpected_error']);
        }
        

    }
}