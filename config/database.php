<?php

$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'car_repair',
];

// Create a connection using MySQLi (Procedural)
$connection = mysqli_connect(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database']
);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
