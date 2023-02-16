<?php
function dbInsert($connection, $table, $data) {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO `$table` ($columns) VALUES ($values)";

    return $connection->exec($query);
}
?>