<?php 

if(!function_exists("getConfig")){ 

    function getConfig($key) {

        $siteConfig = [
            'site_name' => 'D-Cars',
            'base_url' => "http://localhost/car_repair",     
            'base_path' => dirname(__DIR__, 1)
        ];
                
        return $siteConfig[$key] ?? null; 

    }
}