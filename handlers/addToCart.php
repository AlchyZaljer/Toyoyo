<?php
    require_once __DIR__ . '\..\includes\functions.php'; 
    addToCart();
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>