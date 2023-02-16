<form id="goodsAddingForm" method="post" enctype="multipart/form-data" class="card addingCard shadow-sm d-flex flex-column justify-content-between align-items-center">
  <h5 class="addingCardTitle m-0 mt-2 fw-bold text-uppercase text-center">Create your own toy</h5>

  <div class="w-100">
    <div class="mb-2">
      <p class="ps-2 m-0 mb-1">Goods image (PNG, JPG):</p>
      <input type="file" class="form-control" id="goodsImg" name="goodsImg" accept=".jpg, .jpeg, .png">
    </div>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" id="goodsName" name="goodsName" placeholder="Cat" required maxlength="20">
      <label for="input">Goods name:</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" id="goodsPrice" name="goodsPrice" placeholder="60" required maxlength="3">
      <label for="input">Goods price ($):</label>
      <?php if (!$additionToDb) {
        echo '<p class="m-0 p-0 text-danger">Incorrectly entered data!</p>';
      } ?>
    </div>

    <button form="goodsAddingForm" name="addNewGoods" class="w-100 mt-2 btn btn-lg btn-outline-primary" formaction="handlers\addGoodsToDb.php">Add new goods</button>
  </div>
</form>