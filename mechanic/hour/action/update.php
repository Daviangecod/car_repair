<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/hour/index.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['id']) || empty($_POST['weekDay']) || empty($_POST['shop'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/hour/index.php'), ['error' => 'empty_fields']);
    }
    else {
        $weekDay = mysqli_real_escape_string($connection, $_POST['weekDay']);
        $opening = mysqli_real_escape_string($connection, $_POST['opening']);
        $closing = mysqli_real_escape_string($connection, $_POST['closing']);
        $shop = mysqli_real_escape_string($connection, $_POST['shop']);
        $userId = $_SESSION['loginId'];
        $closed = false;
        $workingHourId = $_POST['id'];


        if(( empty($closing) && !empty($opening) ) || (empty($opening) && !empty($closing)) ) {
            setFlashMessage('error', 'Incase your shop is not closed by this hour, Make sure both the opening hour and closing hours fields are not empty');
            redirect(baseUrl('mechanic/hour/edit.php'), ['id' => $workingHourId, 'error' => 'invalid_field_value']);
        }

        if(!empty($closing) && !empty($opening)) {
            if($closing <= $opening) {
                setFlashMessage('error', 'The Closing Hour must be greater that the Opening hour');
                redirect(baseUrl('mechanic/hour/edit.php'), [ 'id' => $workingHourId, 'error' => 'invalid_field_value']);
            }
        }

        if(empty($closing) && empty($opening)) {
            $closed = true;
        }

        // Check if the user already added the day

        $query = "SELECT * FROM hours WHERE user_id = $userId AND day = '$weekDay' AND NOT id = $workingHourId";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($result) > 0) {
            setFlashMessage('error', 'You already added the week day! ' . $weekDay);
            redirect(baseUrl('mechanic/hour/edit.php'), ['id' => $workingHourId, 'error' => 'invalid_field_value']);
        }

        $query = "UPDATE hours SET user_id = $userId, shop_id = $shop, day = '$weekDay',opening = '$opening', closing = '$closing', closed = '$closed' WHERE id = $workingHourId";

        $result = mysqli_query($connection, $query);

        if($result) {
            setFlashMessage('success', 'Working Hour Update Successful');
            redirect(baseUrl('mechanic/hour/edit.php'), ['id' => $workingHourId, 'success' => 'working_hour_update_success']);
        }
        else {
            setFlashMessage('error', 'Working Hour Update Failed');
            redirect(baseUrl('mechanic/hour/edit.php'), ['id' => $workingHourId, 'error' => 'working_hour_update_failed']);
        }

    }
}