<?php 

require_once __DIR__ . '/vendor.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("index.php"), ["error" => "method_not_allowed"]);
}
else {

    session_start();
    unset($_SESSION['loginId']);
    session_unset();
    session_reset();
    session_destroy();

    redirect(baseUrl("auth/login.php"), ["success" => "logout_success"]);
}