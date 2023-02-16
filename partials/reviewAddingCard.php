<form method="post" enctype="multipart/form-data" class="card rewiewAddingCard shadow-sm d-flex flex-wrap flex-column justify-content-between align-items-center">
    <h5 class="rewiewCardTitle m-0 mt-1 fw-bold text-uppercase text-center">Leave a reviev</h5>

    <div class="w-100">
        <div class="mb-2">
            <p class="m-0 mb-1">Image (PNG, JPG):</p>
            <input type="file" class="form-control" id="reviewImgs" name="goodsImgs[]" multiple="true" accept=".jpg, .jpeg, .png">
        </div>

        <div class="mb-1 d-flex flex-wrap flex-row justify-content-between align-items-center">
            <p class="m-0 me-2">Goods name:</p>
            <select class="form-select goodsNameSelect w-auto flex-grow-1" name="reviewGoodsId" required size="1" aria-label="Goods list">

                <?php
                require_once __DIR__ . '\..\includes\show.php';
                if ($shop = dbShow($connection, "goods")) {
                    foreach ($shop as $item) {
                        echo '<option value="' . $item["id"] . '">' . $item["name"] . '</option>';
                    }
                }
                ?>

            </select>
        </div>

        <div class="mb-1 d-flex flex-wrap flex-row justify-content-between align-items-center">
            <p class="m-0">Rating:</p>
            <div class="rating me-4">
                <div class="ratingItems d-flex flex-row-reverse ">
                    <input id="ratingItem5" type="radio" value="5" name="reviewRating" class="ratingItem">
                    <label for="ratingItem5" class="ratingLabel"></label>
                    <input id="ratingItem4" type="radio" value="4" name="reviewRating" class="ratingItem">
                    <label for="ratingItem4" class="ratingLabel"></label>
                    <input id="ratingItem3" type="radio" value="3" name="reviewRating" class="ratingItem">
                    <label for="ratingItem3" class="ratingLabel"></label>
                    <input id="ratingItem2" type="radio" value="2" name="reviewRating" class="ratingItem">
                    <label for="ratingItem2" class="ratingLabel"></label>
                    <input id="ratingItem1" type="radio" value="1" name="reviewRating" class="ratingItem">
                    <label for="ratingItem1" class="ratingLabel"></label>
                </div>
            </div>
        </div>

        <div class="mb-2 d-flex flex-wrap flex-row justify-content-between align-items-center">
            <p class="mb-1 me-2">Description:</p>
            <textarea class="form-control" rows="2" name="reviewDesc" required maxlength="500"></textarea>
        </div>

        <div class="d-flex flex-wrap flex-row justify-content-start align-items-center">
            <p class="m-0 me-2">Anonymously</p>
            <input class="form-check-input" type="checkbox" id="reviewAnonymously" value="1" name="anonymously" checked>
        </div>

        <?php if ($error) {
            echo '<p class="text-danger p-0 m-0">Incorrect entered data!</p>';
        }
        ?>

        <button name="addNewReview" class="w-100 p-1 mt-2 btn btn-lg btn-outline-primary" formaction="handlers\addReviewToDb.php">Leave a review</button>
    </div>
</form>