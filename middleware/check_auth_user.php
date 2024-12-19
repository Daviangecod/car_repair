<?php 

require_once 'vendor.php';

if(!isset($_SESSION['loginId']) && !isset($_SESSION['role'])) {
    redirect(baseUrl("auth/login.php"));
}