<?php 

if(!function_exists("getConfig")){ 

    function getConfig($key) {

        global $connection;
        require_once __DIR__ . '/database.php';

        $connection = dbConnect();

        $query = "SELECT * FROM settings";
        $result = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($result) > 0) {

            $settings = mysqli_fetch_all($result);

            $siteConfig = [
                'base_url' => "http://localhost/car_repair",     
                'base_path' => dirname(__DIR__, 1)
            ];
        }
        
        return $siteConfig[$key] ?? null; 

    }
}