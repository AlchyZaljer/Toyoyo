<div class="card shadow-sm d-flex flex-wrap flex-column justify-content-around">
    <div class="mb-3 d-flex flex-wrap flex-row justify-content-around">
        <div class="cardView ">
            <img class="cardImg effect d-block shadow-lg" src="img\<?= $item["image"]; ?>" alt="<?= $item["name"]; ?>" />
        </div>

        <div class="cardDesc px-3 d-flex flex-wrap flex-column justify-content-start">
            <small class="d-block text-muted">Title:</small>
            <p class="cardTitle m-0">
                <?= $item["name"]; ?>
            </p>
            <small class="d-block text-muted">Amount:</small>
            <p class="cardCount m-0">
                <?= $amount; ?>
            </p>
            <small class="d-block text-muted">Price:</small>
            <p class="cardPrice m-0 fw-light">
                $<?= $amount * $item["price"]; ?>
            </p>
        </div>
    </div>

    <div class="cardBtns d-flex flex-wrap flex-row justify-content-between align-items-center">
        <div class="cardBtnGroup">
            <button form="cartForm" name="addToCart" value="<?= $item["id"]; ?>" class="cardBtn btn btn-lg" formaction="handlers\addToCart.php">
                + 1
            </button>
            <button form="cartForm" name="deleteFromCart" value="<?= $item["id"]; ?>" class="cardBtn deleteBtn btn btn-lg" formaction="handlers\deleteFromCart.php">
                &#8211; 1
            </button>
        </div>

        <p class="m-0 text-uppercase">or</p>

        <button form="cartForm" name="deleteAllFromCart" value="<?= $item["id"]; ?>" class="cardBtn deleteBtn btn btn-lg" formaction="handlers\deleteFromCart.php">
            Delete all
        </button>
    </div>
</div>