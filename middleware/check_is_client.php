<?php 

require_once 'vendor.php';

if(isset($_SESSION['loginId']) && isset($_SESSION['role'])) {
    if($_SESSION['role'] !== "client") {
        redirect(baseUrl());
    }
}