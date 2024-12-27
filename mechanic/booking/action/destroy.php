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

    if(empty($_POST['password'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'empty_fields']);
    }
    else {

        $userId = $_SESSION['loginId'];
        $password = $_POST['password'];
        

        try {

           
           
            $query = "SELECT * FROM bookings WHERE id = $bookingId";
            $result = mysqli_query($connection, $query);
          
            if($result) {

                $data = mysqli_fetch_assoc($result);

                if(shopBelongsToUser($userId, $data['shop_id'])) {
    
                    $role = MECHANIC;
                    $query = "SELECT * FROM users WHERE id = $userId AND role_id = $role";
                    $result = mysqli_query($connection, $query);
        
                    if($result) {
                        // Verify password
        
                        $data = mysqli_fetch_assoc($result);
        
                        if(password_verify($password, $data['password'])) {
        
                            $query = "DELETE FROM bookings WHERE id = $bookingId";
                            $result = mysqli_query($connection, $query);
        
                            if($result) {
                                setFlashMessage('success', 'Booking Deletion Successful');
                                redirect(baseUrl('mechanic/booking/index.php'), ['success' => 'booking_delete_success']);
                            }
                            else {
                                setFlashMessage('error', 'Booking Deletion Failed');
                                redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'booking_delete_failed']);
                            }
        
                        }
                        else {
                                setFlashMessage('error', 'Invalid Password, Validation Failed');
                                redirect(baseUrl('mechanic/booking/index.php'), ['validate' => '0']);
                        }
        
                    }
                    else {
                        setFlashMessage('error', 'Unexpected Error');
                        redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'unexpected_error']);
                    }
    
                }
                else {
                    setFlashMessage('error', 'You are not authorized to delete this booking');
                    redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'invalid_request']);
                }
            }

            else {

                setFlashMessage('error', 'Unexpected Error');
                redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'unexpected_error']);
            }



        } catch (\Exception $e) {
            setFlashMessage('error', $e->getMessage());
            // setFlashMessage('error', 'Unexpected Error');
            redirect(baseUrl('mechanic/booking/index.php'), ['error' => 'unexpected_error']);
        }
        
        

    }
}