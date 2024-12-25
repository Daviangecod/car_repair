<?php 

session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post") {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('mechanic/language/index.php'), ['error' => 'method_not_allowed']);
}
else {

    if(empty($_POST['id']) || empty($_POST['password'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('mechanic/language/index.php'), ['error' => 'empty_fields']);
    }
    else {

        $userId = $_SESSION['loginId'];
        $password = $_POST['password'];

        try {
            
            $query = "SELECT * FROM users WHERE id = $userId";
            $result = mysqli_query($connection, $query);

            if($result) {
                // Verify password

                $data = mysqli_fetch_assoc($result);

                if(password_verify($password, $data['password'])) {

                    $serviceId = $_POST['id'];

                    $query = "DELETE FROM languages WHERE id = $serviceId";
                    $result = mysqli_query($connection, $query);

                    if($result) {
                        setFlashMessage('success', 'Language Deletion Successful');
                        redirect(baseUrl('mechanic/language/index.php'), ['success' => 'language_delete_success']);
                    }
                    else {
                        setFlashMessage('error', 'Language Deletion Failed');
                        redirect(baseUrl('mechanic/language/index.php'), ['error' => 'language_delete_failed']);
                    }

                }
                else {
                        setFlashMessage('error', 'Invalid Password, Validation Failed');
                        redirect(baseUrl('mechanic/language/index.php'), ['validate' => '0']);
                }

            }
            else {
                setFlashMessage('error', 'Unexpected Error');
                redirect(baseUrl('mechanic/language/index.php'), ['error' => 'unexpected_error']);
            }

        } catch (\Exception $e) {
            // setFlashMessage('error', $e->getMessage());
            setFlashMessage('error', 'Unexpected Error');
            redirect(baseUrl('mechanic/language/index.php'), ['error' => 'unexpected_error']);
        }
        
        

    }
}