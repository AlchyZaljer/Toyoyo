<?php
require_once __DIR__ . '\includes\connect.php';
require_once __DIR__ . '\includes\show.php';

$table = $connection->query("SELECT `goods`.`id`, `name`, ROUND(AVG(`rating`), 2) AS `rating` FROM `goods` RIGHT JOIN `reviews` ON `goods`.`id` = `reviews`.`goods_id` GROUP BY `goods`.`id` ORDER BY `goods`.`id`;");
foreach ($table as $row) {
    $data[] = $row;
}

$height = 500;
$width = 1100;
$mainIndent = 50;
$smallIndent = 8;
$maxRating = 5;
$fontH = 27;
$fontW = 10.81;
$namesHeight = $fontW * 20;
$mainHeight = $height - $mainIndent + $smallIndent + $namesHeight;
$scaleY = ($height - $mainIndent * 2) / $maxRating;
$scaleX = ($width - $mainIndent * 2) / count($data);

$Colors = array('#ff5e39', '#fcb929', '#fff535', '#a7ff34', '#29f500');
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '\partials\head.php'; ?>

<body>
    <div class="wrapper d-flex flex-column h-100">

        <?php include_once __DIR__ . '\partials\top.php'; ?>

        <main class="main border-bottom flex-grow-1">
            <h1 class="pageTitle text-uppercase text-center">&#8226; Goods statistics &#8226;</h1>

            <div class="d-flex flex-row flex-wrap justify-content-center align-items-center align-content-around">

                <svg class="statistics" height="<?= $mainHeight ?>" width="<?= $width ?>">
                    <!-- Ось Y -->
                    <line x1="<?= $mainIndent ?>" x2="<?= $mainIndent ?>" y1="<?= $mainIndent - 15 ?>" y2="<?= $height - $mainIndent + $smallIndent ?>" style="stroke-width:2; stroke:grey; fill:grey" />

                    <?php
                    for ($i = 0; $i <= $maxRating; $i++) {
                        // горизонтальные деления по 1 
                        echo "<line x1='" . $mainIndent - $smallIndent . "' x2='" . $width - $mainIndent . "' y1='" . $scaleY * $i + $mainIndent . "' y2='" . $scaleY * $i + $mainIndent . "' style='stroke-width:2; stroke:grey; fill:grey'/>";
                        // вертикальный текст
                        if ($i != $maxRating)
                            echo "<text x='" . 5 . "' y='" . $scaleY * $i + $mainIndent + $smallIndent . "' style ='font-size:25px; fill:grey'>" . 5 - $i . "&#9733;</text>";
                        // горизонтальные деления по 0.5
                        if ($i < $maxRating - 1)
                            echo "<line x1='" . $mainIndent . "' x2='" . $width - $mainIndent . "' y1='" . $scaleY * $i + $scaleY / 2 + $mainIndent . "' y2='" . $scaleY * $i + $scaleY / 2 + $mainIndent . "' style='stroke-width:1; stroke:grey; fill:grey'/>";
                    }

                    for ($i = 0; $i < count($data); $i++) {
                        // вертикальные засечки
                        echo "<line x1='" . $scaleX * ($i + 1) + $mainIndent . "' x2='" . $scaleX * ($i + 1) + $mainIndent . "' y1='" . $height - $mainIndent . "' y2='" . $height - $mainIndent + 8 . "' style='stroke-width:2; stroke:grey; fill:grey'/>";
                        // прямоугольники
                        echo "<rect rx='8' x='" . $scaleX * ($i + 0.15) + $mainIndent . "' y='" . $height - $mainIndent - $scaleY * $data[$i]["rating"] + 1 . "' width='" . 0.7 * $scaleX . "' height='" . $scaleY * $data[$i]["rating"] - 2 . "' style='fill:" . $Colors[floor($data[$i]["rating"]) - 1] . "'/>";
                        // подписи к прямоугольникам
                        // echo "<text x='" .$scaleX*($i + 0.5) + $mainIndent - $fontW*4/2 . "' y='" . $height - $mainIndent - $scaleY * $data[$i]["rating"] + 25 . " style ='font-size:18px'>" . $data[$i]["rating"] . "</text>";
                        // название товара
                        echo "<text x='" . $scaleX * ($i + 0.5) + $mainIndent - 10 . "' y='" . $mainHeight - $namesHeight + $fontW * iconv_strlen($data[$i]["name"]) . "'transform='rotate(-65 " . $scaleX * ($i + 0.5) + $mainIndent - 10 . " " . $mainHeight - $namesHeight + $fontW * iconv_strlen($data[$i]["name"]) . ")' style ='font-size:18px;'>" . $data[$i]["name"] . "</text>";
                    }
                    ?>

                </svg>
            </div>
        </main>

        <?php include_once __DIR__ . '\partials\footer.php'; ?>

    </div>

    <?php include_once __DIR__ . '\partials\scripts.php'; ?>

</body>

</html>