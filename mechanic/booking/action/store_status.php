<?php 

session_start();
$basePath = dirname(__DIR__ , 3);

require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post" || empty($_POST['id'])) {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'method_not_allowed']);
}
else {

    $bookingId = $_POST['id'];  

    if(empty($_POST['status'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'error' => 'empty_fields']);
    }

    else {

        $status = mysqli_real_escape_string($connection, $_POST['status']);

        $query = "UPDATE bookings SET status = '$status' WHERE id = $bookingId";
        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Status Update Successful');
            redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'success' => 'status_update_success']);
        }
        else {
            setFlashMessage('error', 'Status Update Failed');
            redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'error' => 'status_update_failed']);
        }

    }

}