<?php
require_once __DIR__ . '\includes\connect.php';
require_once __DIR__ . '\includes\show.php';
require_once __DIR__ . '\includes\functions.php';
ksort($_COOKIE);
session_start();
list($totalAmount, $totalGoods) = calculateSummary(dbShow($connection, "goods"));
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>
    <div class="wrapper d-flex flex-column h-100">

        <?php include_once __DIR__ . '\partials\top.php'; ?>

        <main class="main border-bottom flex-grow-1">
            <h1 class="pageTitle text-uppercase text-center">&#8226; Your cart &#8226;</h1>

            <div class="d-flex flex-row flex-wrap justify-content-center align-items-center align-content-around">
                <form id="cartForm" hidden method="post"></form>

                <?php
                if ($totalGoods == 0) {
                    echo renderTemplate('partials\cartEmptyCard.php', [0]);
                } else {
                    if (!empty($_COOKIE)) {
                        foreach ($_COOKIE as $id => $amount) {
                            if (!is_numeric($id)) {
                                continue;
                            }
                            $goods = dbShow($connection, "goods");
                            foreach ($goods as $item) {
                                if ($id == $item["id"]) {
                                    echo renderTemplate('partials\cartCard.php', ['item' => $item, 'amount' => $amount]);
                                }
                            }
                        }
                    }
                }
                ?>
            </div>

            <div class="cartSummary mt-5 mx-auto d-flex flex-row flex-wrap justify-content-between">
                <p class="totalGoods m-0 text-uppercase">
                    Total goods:<span class="ms-2 fw-light"><?= $totalGoods; ?></span>
                </p>
                <p class="totalAmount m-0 text-uppercase">
                    For the amount:<span class="ms-2 fw-light">$<?= $totalAmount; ?></span>
                </p>
            </div>
        </main>

        <?php include_once __DIR__ . '\partials\footer.php'; ?>

    </div>

    <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>