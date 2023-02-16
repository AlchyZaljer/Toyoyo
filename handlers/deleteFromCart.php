<?php
    require_once __DIR__ . '\..\includes\functions.php'; 
    deleteFromCart();
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>