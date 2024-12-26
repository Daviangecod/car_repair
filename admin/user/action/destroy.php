<?php 
session_start();
$basePath = dirname(__DIR__ , 3);
require_once $basePath . "/vendor/autoload.php";
require_once $basePath . "/config/database.php";
require_once $basePath . "/includes/constants.php";

if(strtolower($_SERVER['REQUEST_METHOD']) !== "post" || empty($_POST['id'])) {
    setFlashMessage('error', 'Method Not Allowed');
    redirect(baseUrl('admin/user/index.php'), ['error' => 'empty_fields']);
}
else {

    if(empty($_POST['password'])) {
        setFlashMessage('error', 'One or More Fields are Empty');
        redirect(baseUrl('admin/user/index.php'), ['error' => 'empty_fields']);
    }
    else {

        $password = $_POST['password'];
        $userId = $_POST['id'];

        $adminId = $_SESSION['loginId'];

        if($userId == $adminId) {
            setFlashMessage('error', 'Unable to delete account');
            redirect(baseUrl('admin/user/index.php'), ['error' => '0']);
        }

        try {

            $role = ADMIN;
            $query = "SELECT * FROM users WHERE id = $adminId AND role_id = $role";
            $result = mysqli_query($connection, $query);

            if($result) {
                // Verify password

                $data = mysqli_fetch_assoc($result);

                if(password_verify($password, $data['password'])) {

                    $query = "DELETE FROM users WHERE id = $userId";
                    $result = mysqli_query($connection, $query);

                    if($result) {
                        setFlashMessage('success', 'User Deletion Successful');
                        redirect(baseUrl('admin/user/index.php'), ['success' => 'user_delete_success']);
                    }
                    else {
                        setFlashMessage('error', 'User Deletion Failed');
                        redirect(baseUrl('admin/user/index.php'), ['error' => 'user_delete_failed']);
                    }

                }
                else {
                        setFlashMessage('error', 'Invalid Password, Validation Failed');
                        redirect(baseUrl('admin/user/index.php'), ['validate' => '0']);
                }

            }
            else {
                setFlashMessage('error', 'Unexpected Error');
                redirect(baseUrl('admin/user/index.php'), ['error' => 'unexpected_error']);
            }

        } catch (\Exception $e) {
            //setFlashMessage('error', $e->getMessage());
            setFlashMessage('error', 'Unexpected Error');
            redirect(baseUrl('admin/user/index.php'), ['error' => 'unexpected_error']);
        }
        
        

    }
}