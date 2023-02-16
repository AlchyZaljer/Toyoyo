<?php
require_once __DIR__ . '\includes\functions.php';
require_once __DIR__ . '\includes\connect.php';
require_once __DIR__ . '\includes\show.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>
    <div class="wrapper d-flex flex-column h-100">

        <?php include_once __DIR__ . '\partials\top.php'; ?>

        <main class="main border-bottom flex-grow-1">
            <h1 class="pageTitle text-uppercase text-center">&#8226; Customer reviews &#8226;</h1>

            <div class="d-flex flex-row flex-wrap justify-content-center align-items-center align-content-around">
                <form id="reviewForm" hidden method="post"></form>

                <?php
                if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                    $error = (!empty($_GET) && $_GET["reviewDataError"] == "true") ? true : false;
                    echo renderTemplate('partials\reviewAddingCard.php', ["connection" => $connection, "error" => $error]);
                }

                if ($reviews = dbShow($connection, "reviews")) {
                    foreach ($reviews as $review) {
                        $goodsId = $review["goods_id"];
                        $goodsDetails = $connection->query("SELECT `name`, `image` FROM `goods` WHERE `id` = $goodsId");
                        $goodsName = '';

                        foreach ($goodsDetails as $detail) {
                            if ($review["images"] == NULL) {
                                $images = $detail["image"];
                            } else {
                                $images = explode("|", $review["images"]);
                            }
                            $goodsName =  $detail["name"];
                        }
                        echo renderTemplate('partials\reviewCard.php', ['review' => $review, 'images' => $images, 'goodsName' => $goodsName, 'connection' => $connection]);
                    }
                }
                ?>

            </div>

        </main>

        <?php include_once __DIR__ . '\partials\footer.php'; ?>

    </div>

    <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>