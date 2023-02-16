<?php
require_once __DIR__ . '\includes\functions.php';
require_once __DIR__ . '\includes\connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>
    <div class="wrapper d-flex flex-column h-100">

        <?php include_once __DIR__ . '\partials\top.php'; ?>

        <main class="main border-bottom d-flex flex-grow-1">
            <?php
            require_once 'includes/show.php';

            if ($users = dbShow($connection, "users")) {
                foreach ($users as $user) {
                    if ($_SESSION["login"] == $user["login"]) {
                        $data = array(
                            "firstName" => $user["firstName"],
                            "lastName" => $user["lastName"],
                            "login" => $user["login"],
                            "email" => $user["email"],
                            "birthDate" => array_key_exists("birthDate", $user) ? $user["birthDate"] : "01-01-1999",
                            "phone" => array_key_exists("birthDate", $user) ? $user["phone"] : "+7(999)999-99-99",
                            "site" => array_key_exists("birthDate", $user) ? $user["site"] : "https://mysite.com",
                            "ip" => array_key_exists("birthDate", $user) ? $user["ip"] : "192.168.1.1"
                        );
                        echo renderTemplate('partials\accountForm.php', ['data' => $data]);
                        break;
                    }
                }
            } else {
                echo "<p>Данные не найдены</p>";
            }
            ?>

        </main>

        <?php include_once __DIR__ . '\partials\footer.php'; ?>

    </div>

    <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>