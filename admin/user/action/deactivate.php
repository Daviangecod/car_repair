<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(!isset($_GET['id'])) {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('admin/user/index.php'), ['error' => 'method_not_allowed']);
}
else {

    $adminId = $_SESSION['loginId'];
    $role = ADMIN;
    $userId = $_GET['id'];


    $query = "SELECT * FROM users WHERE id = $adminId AND role_id = $role";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {

        $query = "UPDATE users SET active = 0 WHERE id = $userId";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'User blocked successfully');
            redirect(baseUrl('admin/user/index.php'), ['success' => 'user_deactivated']);
        }
        else {
            setFlashMessage('error', 'User deacactivation failed');
            redirect(baseUrl('admin/user/index.php'), ['error' => 'user_deactivation_failed']);
        }

    }
    else {
        setFlashMessage('error', 'Unauthorized Request');
        redirect(baseUrl('admin/user/index.php'), ['error' => 'forbidden']);
    }
}