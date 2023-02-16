<div class="card shadow-sm">
  <div class="cardView">
    <img class="cardImg effect d-block mb-3 shadow-lg" src="img\<?= $item["image"]; ?>" alt="<?= $item["name"]; ?>" />
  </div>

  <div class="cardDesc d-flex flex-wrap justify-content-between align-items-center">
    <p class="cardTitle m-0 text-uppercase">
      <?= $item["name"]; ?>
    </p>
    <p class="cardPrice m-0 text-muted fw-light">
      $<?= $item["price"]; ?>
    </p>
  </div>

  <?php if ($amount <= 0) {
    echo '
    <div class="cardBtns d-flex flex-wrap flex-row justify-content-between align-items-center">
      <button form="goodsForm" name="addToCart" value="' . $item["id"] . '" class="cardBtn flex-grow-1 p-2 btn btn-lg" formaction="handlers\addToCart.php">
      Add to cart
      </button>';
  } else {
    echo '<div class="cardBtns d-flex flex-wrap flex-row justify-content-between align-items-center">
      <button disabled class="flex-grow-1 me-2 p-2 cardBtn deleteBtn btn btn-lg">
          In cart: ' . $amount .
      '</button>
      <button form="goodsForm" name="addToCart" value="' . $item["id"] . '" class="cardBtn p-2 btn btn-lg" formaction="handlers\addToCart.php">
          + 1
      </button>';
  }
  if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
    echo '<button form="goodsForm" name="deleteCard" value="' . $item["id"] . '" class="cardBtn deleteBtn binIcon ms-2 p-0 btn btn-lg" formaction="handlers\deleteGoodsFromDb.php"></button>';
  }
  echo '
    </div>';
  ?>
</div>