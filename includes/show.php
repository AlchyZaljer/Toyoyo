<?php
function dbShow($connection, $table) {
    $query = $connection->query("SELECT id FROM `$table`");
    $count = $query->rowCount();

    if ($count) {
        return $connection->query("SELECT * FROM `$table` ORDER BY `id` DESC");
    }
    else {
        return false;
    }
}

?>