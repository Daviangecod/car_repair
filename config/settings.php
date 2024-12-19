<?php 

if(!function_exists("getConfig")){ 

    function getConfig($key) {

        $siteConfig = [
            'site_name' => "D-Cars",
            'admin_email' => "noreply@dcars.com",
            'base_url' => "http://localhost/car_repair",
        ];
                
        return $siteConfig[$key] ?? null; 

    }
}