<?php
require_once __DIR__ . '\..\includes\connect.php';
require_once __DIR__ . '\..\includes\show.php';
require_once __DIR__ . '\..\includes\delete.php';

if (array_key_exists("deleteReview", $_POST)) {
    $id = (int)$_POST["deleteReview"];
    $reviews = dbShow($connection, "reviews");
    foreach ($reviews as $review) {
        if ($id == $review["id"]) {
            if (gettype($review["images"]) == "array") {
                $images = explode("|", $review["images"]);
                foreach ($images as $img) {
                    $filepath = "../img/" . $img;
                    unlink($filepath);
                }
            }
            else if ($review["images"] != "Empty.svg") {
                $filepath = "../img/" . $review["images"];
                unlink($filepath);
            }
        }
    }

    if (dbDelete($connection, "reviews", $id)) {
        $connection->query("ALTER TABLE `reviews` AUTO_INCREMENT = $id");
        
        header("Location: ../reviews.php");
    }
    else {
        echo "<p>Error while deleting from database</p>";
    }
}

?>