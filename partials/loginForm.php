<form method="POST" id="loginForm" class="entranceForm shadow-lg p-4 m-auto d-flex flex-column justify-content-around align-items-center">
    <a href="index.php">
        <div class="icon topIcon effect"></div>
    </a>
    <h1 class="entranceFormTitle mb-4 fw-bold">&#8226;Toyoyo&#8226;</h1>

    <div class="w-100 m-0 p-0">
        <p class="entranceFormText">Enter your login details:</p>
        <div class="w-100 form-floating mb-3">
            <input type="text" class="form-control" id="login" name="login" placeholder="Ivan Ivanov" required maxlength="20">
            <label for="input">Login</label>
        </div>
        <div class="w-100 form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required maxlength="20">
            <label for="password">Password</label>
            <?php if (!$authorized) {
                echo '<p class="mt-1 text-danger">Incorrect <b>login</b> or <b>password</b>!</p>';
            } ?>
        </div>

        <button class="w-100 btn btn-lg btn-outline-primary" formaction="handlers\authorization.php">Log in</button>
    </div>
</form>