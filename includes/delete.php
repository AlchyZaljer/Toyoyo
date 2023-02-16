<?php
function dbDelete($connection, $table, $id) {
    $query = "DELETE FROM `$table` WHERE `id` = $id ";
    return $connection->exec($query);
}
?>