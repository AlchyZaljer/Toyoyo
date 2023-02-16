<?php require_once __DIR__ . '\includes\functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>

  <main class="entrance w-100 h-100 d-flex flex-column">

    <?php
    $authorized = (!empty($_GET) && array_key_exists("authorized", $_GET) && $_GET["authorized"] == "false") ? false : true;
    echo renderTemplate('partials\loginForm.php', ['authorized' => $authorized]);
    ?>

  </main>

  <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>