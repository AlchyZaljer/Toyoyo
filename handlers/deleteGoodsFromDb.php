<?php
require_once __DIR__ . '\..\includes\connect.php';
require_once __DIR__ . '\..\includes\show.php';
require_once __DIR__ . '\..\includes\delete.php';

if (array_key_exists("deleteCard", $_POST)) {
    $id = (int)$_POST["deleteCard"];
    $goods = dbShow($connection, "goods");
    foreach ($goods as $item) {
        if ($id == $item["id"] && $item["image"] != "Empty.svg") {
            $filepath = "../img/" . $item["image"];
            unlink($filepath);
        }
    }
    
    if (dbDelete($connection, "goods", $id)) {
        $connection->query("ALTER TABLE `goods` AUTO_INCREMENT = $id");
        
        header("Location: ../index.php");
    }
    else {
        echo "<p>Error while deleting from database</p>";
    }
}

?>