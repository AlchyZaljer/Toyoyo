<?php
    require_once __DIR__ . '\..\includes\functions.php'; 
    require_once __DIR__ . '\..\includes\connect.php';
    require_once __DIR__ . '\..\includes\show.php';

    if (loginCheck(dbShow($connection, "users"))) {
        session_start(); 
        $_SESSION["login"] = $_POST["login"];
        header("Location: ../index.php");
    }
    else {
        header("Location: ../login.php?authorized=false");
    }
?>