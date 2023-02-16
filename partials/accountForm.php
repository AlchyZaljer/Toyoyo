<form method="POST" id="accountForm" class="accountForm shadow-lg p-4 m-auto mt-4 d-flex flex-column justify-content-around align-items-center">
    <div class="w-100 m-auto mb-3 d-flex flex-row justify-content-around align-items-center">
        <img class="avatarImg d-block shadow-lg" src="img\User.svg" />
        <div class="ms-4">
            <p class="fw-light text-muted m-0">Username:</p>
            <div class="accountUsername fw-bold"><?= $data["firstName"] . ' ' . $data["lastName"] ?></div>
        </div>
    </div>

    <div class="w-100 p-0 m-auto d-flex flex-column justify-content-around align-items-center">
        <h3>Basic info</h3>
        <div class="accountInfoBlock mb-3 d-flex flex-column align-items-start">
            <div>
                <p class="fw-light text-muted m-0">Login:</p>
                <div class="mb-2"><?= $data["login"] ?></div>
            </div>
            <div>
                <p class="fw-light text-muted m-0">E-mail:</p>
                <div class="mb-2"><?= $data["email"] ?></div>
            </div>
        </div>

        <h3>Additional info</h3>
        <div class="accountInfoBlock d-flex flex-column align-items-start">
            <div>
                <p class="fw-light text-muted m-0">Date of birth:</p>
                <div class="mb-2"><?= $data["birthDate"] ?></div>
            </div>
            <div>
                <p class="fw-light text-muted m-0">Phone number:</p>
                <div class="mb-2"><?= $data["phone"] ?></div>
            </div>
            <div>
                <p class="fw-light text-muted m-0">Personal site (parsed):</p>
                <div class="mb-2 d-flex flex-row">

                <?php
                    $url = parse_url($data["site"]);
                    foreach ($url as $key => $value) {
                        echo "<p class='me-1'><strong>".$key.": </strong>".$value.";</p>";
                    }
                ?>

                </div>
            </div>
            <div>
                <p class="fw-light text-muted m-0">Personal IP:</p>
                <div><?= $data["ip"] ?></div>
            </div>
        </div>
    </div>

    <div>

    </div>
</form>