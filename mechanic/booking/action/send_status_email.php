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

    if(empty($_POST['status']) || empty($_POST['email']) || empty($_POST['name']) || empty($_POST['date']) || empty($_POST['service'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'error' => 'empty_fields']);
    }
    else {


        $status = $_POST['status'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $service = $_POST['service'];

        try {
            $send = sendBookingStatusEmail($email, $name, $date, $service, $status);

            if($send) {
                setFlashMessage('success', 'Status Email Sent Successful');
                redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'success' => 'status_email_sent']);
            }

            else {
                setFlashMessage('error', 'Status Email Not Sent!');
                redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'error' => 'status_email_sent_failed']);
            }
        }
        catch(\Exception $e) {
            setFlashMessage('error', 'Unexpected Error');
            redirect(baseUrl('mechanic/booking/view.php'), ['id' => $bookingId, 'error' => 'unexpected_error']);
        }

    }
}
