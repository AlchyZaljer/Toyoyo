<?php
require_once __DIR__ . '\includes\functions.php';
require_once __DIR__ . '\includes\connect.php';
ksort($_COOKIE);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>

    <div class="wrapper d-flex flex-column h-100">

        <?php include_once __DIR__ . '\partials\top.php'; ?>

        <main class="main border-bottom flex-grow-1">
            <h1 class="pageTitle text-uppercase text-center">&#8226; Choose your pet &#8226;</h1>

            <div class="d-flex flex-row flex-wrap justify-content-center align-items-center align-content-around">
                <form id="goodsForm" hidden method="post"></form>

                <?php
                require_once 'includes/show.php';

                if ($shop = dbShow($connection, "goods")) {
                    foreach ($shop as $item) {
                        $amount = 0;
                        if (!empty($_COOKIE)) {
                            foreach ($_COOKIE as $id => $addedAmount) {
                                if (!is_numeric($id)) {
                                    continue;
                                }
                                if ($id == $item["id"]) {
                                    $amount = $addedAmount;
                                    continue;
                                }
                            }
                        }
                        echo renderTemplate('partials\goodsCard.php', ['item' => $item, 'amount' => $amount]);
                    }
                } else {
                    echo renderTemplate('partials\goodsEmptyCard.php', []);
                }
                if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                    $additionToDb = (!empty($_GET) && $_GET["additionToDb"] == "false") ? false : true;
                    echo renderTemplate('partials\goodsAddingCard.php', ['additionToDb' => $additionToDb]);
                }
                ?>
            </div>

        </main>

        <?php include_once __DIR__ . '\partials\footer.php'; ?>

    </div>

    <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>