<?php
require_once __DIR__ . '\..\includes\connect.php';
require_once __DIR__ . '\..\includes\add.php';

if (array_key_exists("goodsName", $_POST) && array_key_exists("goodsPrice", $_POST)) {
    if (strlen($_POST["goodsName"]) <= 20 && is_numeric($_POST["goodsPrice"])) {
        $newGoods = array(
            "name" => $_POST["goodsName"],
            "price" => $_POST["goodsPrice"],
            "image" => "Empty.svg"
        );

        if (!empty($_FILES) && $_FILES["goodsImg"]["error"] == UPLOAD_ERR_OK) {
            $name = $_FILES["goodsImg"]["name"];
            if ($name[0] != '.') {
                if (str_contains($name, '.')) {
                    $extension = explode('.', $name)[1];
                    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
                        $dir = "../img/" . $name;
                        $newGoods["image"] = $name;
                        move_uploaded_file($_FILES["goodsImg"]["tmp_name"], $dir);
                    }    
                }

            }
            
            
        }
        if (dbInsert($connection, "goods", $newGoods)) {
            header("Location: ../index.php");
        }
        else {
            echo "<p>Error adding to database</p>";
        }
    }
    else {
        header("Location: ../index.php?additionToDb=false");
    }
}

?>