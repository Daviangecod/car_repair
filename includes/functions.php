<?php 

require_once __DIR__ . "/../config/settings.php";

if (!function_exists("siteName")) {
    function siteName()
    {
        return getConfig('site_name') ?? null;
    }
}

if (!function_exists("baseUrl")) {
    function baseUrl(string $path = null, array $query = null)
    {

        if ($path !== null && $query !== null) {
            $build = http_build_query($query);
            return getConfig('base_url') . "/" . $path . "?" . $build;
        } elseif ($path !== null) {
            return getConfig('base_url') . "/" . $path;
        }

        return getConfig('base_url');
    }
}

if (!function_exists("resourceUrl")) {
    function resourceUrl(string $path = null)
    {
        if ($path !== null) {
            return baseUrl('resources' .  "/" . $path);
        }
        return baseUrl('resources');
    }
}


if (!function_exists("basePath")) {
    function basePath(string $path = null)
    {
        if ($path !== null) {
            return getConfig('base_path') . "/" . $path;
        }
        return getConfig('base_path');
    }
}


if (!function_exists("redirect")) {
    function redirect(string $to, array $query = null)
    {
        if ($query !== null) {
            $httpQuery = http_build_query($query);
            return header("Location: $to?$httpQuery");
        }
        return header("Location: $to");
    }
}