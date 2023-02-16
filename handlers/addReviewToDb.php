<?php
require_once __DIR__ . '\..\includes\connect.php';
require_once __DIR__ . '\..\includes\add.php';
session_start();
$error = false;

if (array_key_exists("reviewGoodsId", $_POST) && array_key_exists("reviewRating", $_POST) && array_key_exists("reviewDesc", $_POST)) {
    if (strlen($_POST["reviewDesc"]) <= 500) {
        $newReview = array(
            "goods_id" => $_POST["reviewGoodsId"],
            "rating" => $_POST["reviewRating"],
            "description" => addcslashes($_POST["reviewDesc"], '\'"`'), 
            "user_login" => array_key_exists("anonymously", $_POST) ? NULL : $_SESSION["login"],
            "date" => date('d-m-Y'),
            "images" => NULL
        );

        if (!empty($_FILES)) {
            foreach ($_FILES["goodsImgs"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $name = $_FILES["goodsImgs"]["name"][$key];
                    if ($name[0] != '.') {
                        if (str_contains($name, '.')) {
                            $extension = explode('.', $name)[1];
                            if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                                if ($_FILES["goodsImgs"]["size"][0] <= 3145728)  { 
                                    $dir = "../img/" . $name;
                                    $newReview["images"] .= $name . "|";
                                    move_uploaded_file($_FILES["goodsImgs"]["tmp_name"][$key], $dir);
                                } else { $error = true; }
                            } else { $error = true; }
                        } else { $error = true; }
                    } else { $error = true; }
                } else { $error = true; }
            }
        } 
        
        substr($newReview["images"], -1) == "|" ? $newReview["images"] = substr($newReview["images"], 0, -1) : '';

        if (dbInsert($connection, "reviews", $newReview) && !$error) {
            header("Location: ../reviews.php");
        }
        else {
            echo "<p>Error adding to database</p>";
        }
    } else { $error = true; }
} else { $error = true; }

if ($error) {
    header("Location: ../reviews.php?reviewDataError=true");
}
?>