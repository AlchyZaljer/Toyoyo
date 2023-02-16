<?php
try {
    $host    = "localhost";
    $db_name = "Toyoyo";
    $user    = "root";
    $pass    = "";

    $connection = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
}
catch(PDOException $e)
{
    die('Database connection error'); 
}   
?>