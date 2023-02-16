<?php require_once __DIR__ . '\includes\functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>

  <main class="entrance w-100 h-100 d-flex flex-column">

    <?php
    $required = (!empty($_GET) && array_key_exists("required", $_GET) && $_GET["required"] == "true") ? true : false;
    $data = (!empty($_GET) && array_key_exists("data", $_GET) && $_GET["data"] == "true") ? true : false;
    $passwords = (!empty($_GET) && array_key_exists("passwords", $_GET) && $_GET["passwords"] == "true") ? true : false;
    $login = (!empty($_GET) && array_key_exists("login", $_GET) && $_GET["login"] == "true") ? true : false;
    echo renderTemplate('partials\signUpForm.php', ["required" => $required, "data" => $data, "passwords" => $passwords, "login" => $login]);
    ?>

  </main>

  <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>