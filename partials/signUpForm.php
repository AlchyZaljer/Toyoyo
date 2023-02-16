<form method="post" id="signUpForm" class="entranceForm signUpForm shadow-lg p-4 pt-2 m-auto d-flex flex-column justify-content-between align-items-center">
    <a href="index.php">
        <div class="icon topIcon effect"></div>
    </a>
    <h1 class="entranceFormTitle mb-4 fw-bold">&#8226;Toyoyo&#8226;</h1>

    <div class="w-100 m-0 p-0">
        <p class="entranceFormText mb-2">Enter your data for registration:</p>
        <div class="w-100 mb-3 d-flex flex-row justify-content-between">
            <div class="w-100 form-floating me-3">
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ivan" required minLength="3" maxlength="20">
                <label for="firstName">First Name</label>
            </div>
            <div class="w-100 form-floating">
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Ivanov" required minLength="3" maxlength="20">
                <label for="lastName">Last Name</label>
            </div>
        </div>

        <div class="w-100 mb-3 d-flex flex-row justify-content-between">
            <div class="w-100 form-floating me-3">
                <input type="text" class="form-control <?= $unavailableLogin ? 'border-danger' : ''; ?>" id="login" name="login" placeholder="Ivan Ivanov" required minLength="5" maxlength="20">
                <label for="login">Login</label>
            </div>
            <div class="w-100 form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="user@domain.zone" required minLength="5" maxlength="30">
                <label for="email">E-mail</label>
            </div>
        </div>

        <div class="w-100 mb-3 d-flex flex-row justify-content-between">
            <div class="w-100 form-floating me-3">
                <input type="password" class="form-control <?= $differentPasswords ? 'border-danger' : ''; ?>" id="password1" name="password1" placeholder="Password" required minLength="8" maxlength="20">
                <label for="password1">Password</label>
            </div>
            <div class="w-100 form-floating">
                <input type="password" class="form-control <?= $differentPasswords ? 'border-danger' : ''; ?>" id="password2" name="password2" placeholder="Password" required minLength="8" maxlength="20">
                <label for="password2">Password confirmation</label>
            </div>
        </div>

        <hr>

        <div class="w-100 mb-3 d-flex flex-row justify-content-between">
            <div class="w-100 form-floating me-3">
                <input type="text" class="form-control" id="birthDate" name="birthDate" placeholder="01-01-1990" minLength="10" maxlength="10">
                <label for="birthDate">Date of Birth</label>
            </div>
            <div class="w-100 form-floating">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="+7(999)9999999" minLength="14" maxlength="17">
                <label for="phone">Phone number</label>
            </div>
        </div>

        <div class="mb-3">
            <div class="w-100 d-flex flex-row justify-content-between">
                <div class="w-100 form-floating me-3">
                    <input type="text" class="form-control" id="site" name="site" placeholder="mysite.com" maxlength="30">
                    <label for="site">Personal site</label>
                </div>
                <div class="w-100 form-floating">
                    <input type="text" class="form-control" id="ip" name="ip" placeholder="85.141.65.231" minLength="1" maxlength="20">
                    <label for="ip">IP address</label>
                </div>
            </div>

            <?php
            if ($required) {
                echo '<p class="mt-1 text-danger">Required data not filled!</p>';
            } else if ($data) {
                echo '<p class="mt-1 text-danger">Incorrectly entered data!</p>';
            } else if ($passwords) {
                echo '<p class="mt-1 text-danger">Passwords do not match!</p>';
            } else if ($login) {
                echo '<p class="mt-1 text-danger">Login is already taken</p>';
            } ?>
        </div>
        <button class="w-100 btn btn-lg btn-outline-primary" formaction="handlers\registration.php">Sign up</button>
    </div>
</form>