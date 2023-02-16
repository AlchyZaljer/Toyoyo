<div id="<?= $review["id"]; ?>" class="card py-3 rewiewCard shadow-sm d-flex flex-wrap flex-column justify-content-around">
    <div class="mb-3 d-flex flex-wrap flex-row justify-content-between align-items-center">
        <div class="cardAlbum d-flex flex-wrap flex-row justify-content-between align-items-center">

            <div class="me-2 arrowIcon arrowL effect"><a href="#"></a></div>

            <div class="slider d-flex flex-wrap flex-row justify-content-around align-items-center">

                <?php
                if (gettype($images) == "array") {
                    for ($i = 0; $i < count($images); $i++) {
                        if ($i == 0) {
                            echo '<img class="albumImg visibleAlbumImg shadow-lg me-1" src="img\\' . $images[$i] . '" alt="' . $images[$i] . '"/>';
                        } else {
                            echo '<img class="albumImg shadow-lg me-1" src="img\\' . $images[$i] . '" alt="' . $images[$i] . '"/>';
                        }
                    }
                } else {
                    echo '<img class="albumImg visibleAlbumImg shadow-lg me-1" src="img\\' . $images . '" alt="' . $images . '"/>';
                }

                ?>

            </div>

            <div class="ms-1 arrowIcon arrowR effect"><a href="#"></a></div>

        </div>

        <div class="cardStatus d-flex flex-wrap flex-column justify-content-center align-items-center">
            <div>
                <p class="fw-light text-muted m-0">Goods name:</p>
                <h4 class="mb-1 text-center"><?= $goodsName ?></h4>
            </div>
            <div class="rating exposedRating">
                <div class="ratingItems exposedRatingItems d-flex flex-row-reverse" data-total-value="<?= $review["rating"] ?>">
                    <input id="item5" type="radio" value="5" name="rating" class="exposedRatingItem">
                    <label for="item5" class="exposedRatingLabel"></label>
                    <input id="item4" type="radio" value="4" name="rating" class="exposedRatingItem">
                    <label for="item4" class="exposedRatingLabel"></label>
                    <input id="item3" type="radio" value="3" name="rating" class="exposedRatingItem">
                    <label for="item3" class="exposedRatingLabel"></label>
                    <input id="item2" type="radio" value="2" name="rating" class="exposedRatingItem">
                    <label for="item2" class=" exposedRatingLabel"></label>
                    <input id="item1" type="radio" value="1" name="rating" class="exposedRatingItem">
                    <label for="item1" class=" exposedRatingLabel"></label>
                </div>
            </div>
        </div>
    </div>

    <div class="cardText">
        <p><?= htmlspecialchars($review["description"], ENT_QUOTES) ?></p>
    </div>

    <hr class="mb-2 mt-3">

    <div class="cardFooter px-1 d-flex flex-wrap flex-row justify-content-between align-items-center">
        <div class="flex-grow-1 d-flex flex-wrap flex-row justify-content-between align-items-end">
            <p class="text-muted m-0"><?= $review["user_login"] ? $review["user_login"] : 'Anonim'  ?></p>
            <p class="rewiewData fw-light text-muted m-0"><?= $review["date"] ?></p>
        </div>

        <?php
        if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
            $userLogin = $_SESSION["login"];
            $userAccess = $connection->query("SELECT `admin` FROM `users` WHERE `login` = '$userLogin'");
            foreach ($userAccess as $admin) {
                if ($admin == true) {
                    echo '<button form="reviewForm" name="deleteReview" value="' . $review["id"] . '" class="binIcon reviewBin m-0 ms-2 p-0 btn" formaction="handlers\deleteReviewFromDb.php"></button>';
                }
            }
        }
        ?>

    </div>

</div>