<?php
    require_once __DIR__ . '\..\includes\functions.php';
    session_start();
    session_destroy();
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/Toyoyo/');
        }
    }
    header("Location: ../index.php");
?>