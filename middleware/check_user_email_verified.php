<?php 
$basePath = dirname(__DIR__, 1);
require_once $basePath . '/config/database.php';

if(isset($_SESSION['loginId']) && isset($_SESSION['role'])) {

    $loggedUser = $_SESSION['loginId'];

    $query = "SELECT email_verified_at FROM users WHERE id = '$loggedUser'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if($user['email_verified_at'] !== null) {
            
            $loggedUserRole = $_SESSION['role'];

            if($loggedUserRole == "admin"){
                setFlashMessage('info', 'Your email is already verified');
                redirect(baseUrl("admin/index.php"), ["info" => "email_already_verified"]);
            }

            elseif($loggedUserRole == "mechanic") {
                setFlashMessage('info', 'Your email is already verified');
                redirect(baseUrl("mechanic/index.php"), ["info" => "email_already_verified"]);
            }
        }
    }
}