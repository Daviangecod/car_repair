<?php 

require_once __DIR__ . '/vendor.php';

if(isset($_SESSION['loginId']) && isset($_SESSION['role'])) {
    redirect(baseUrl());
}