<?php 
session_start();
$basePath = dirname(__DIR__ , 1);

require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post" || empty($_POST['id'])) {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('index.php'), ['error' => 'method_not_allowed']);
}
else {

    $shopId = $_POST['id'];

    if (empty($_POST['fullName']) || empty($_POST['phoneNumber']) || empty($_POST['email']) || empty($_POST['preferredDate'])) {
        setFlashMessage('success', 'One or more required fields are empty');
        redirect(baseUrl('book_appointment.php'), ['id' => $shopId ]);
    } 
    else {


        try {
            
            $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
            $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
            $service = mysqli_real_escape_string($connection, $_POST['service']);
            $notes = mysqli_real_escape_string($connection, $_POST['notes']);
            $preferredDate = mysqli_real_escape_string($connection, $_POST['preferredDate']);
            $email = mysqli_real_escape_string($connection, validateEmail($_POST['email']));


            $query = "INSERT INTO bookings(shop_id, name, phone_number, service, notes, preferred_date, email)
                    VALUES($shopId, '$fullName', '$phoneNumber', '$service', '$notes', '$preferredDate', '$email')";

            $result = mysqli_query($connection, $query);

            if ($result) {
                setFlashMessage('success', 'Booking Appointment Submitted, Please wait patiently you will recieve a Confirmation Email!');
                redirect(baseUrl('shop_details.php'), ['id' => $shopId ]);
            } else {
                setFlashMessage('error', 'Booking Appointment not submitted');
                redirect(baseUrl('book_appointment.php'), ['id' => $shopId ]);
            }


        } catch (\Exception $e) {
            setFlashMessage('error', 'Unexpected Error, please resubmit');
            redirect(baseUrl('book_appointment.php'), ['id' => $shopId ]);
        }

    
    }

}