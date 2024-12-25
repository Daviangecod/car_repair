<?php 
require_once __DIR__ . '/vendor.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    session_start();
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl("index.php"), ["error" => "method_not_allowed"]);
}
else {
    session_start();
    unset($_SESSION['loginId']);
    session_unset();
    session_destroy();

    session_start();
    setFlashMessage('success', 'Logout Successful');
    redirect(baseUrl("auth/login.php"), ["logout" => "1"]);
}