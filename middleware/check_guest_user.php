<?php 

require_once __DIR__ . '/vendor.php';

if(isset($_SESSION['loginId']) && isset($_SESSION['role'])) {

    $loggedUserRole = $_SESSION['role'];

    if($loggedUserRole == "admin"){
        redirect(baseUrl("admin/index.php"), ["info" => "already_logged_in"]);
    }

    elseif($loggedUserRole == "mechanic") {
        redirect(baseUrl("mechanic/index.php"), ["info" => "already_logged_in"]);
    }
}