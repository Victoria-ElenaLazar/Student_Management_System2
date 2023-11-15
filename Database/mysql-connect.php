<?php
declare(strict_types=1);
$mysqli = null;
/**
 * @return false|mysqli
 * function to connect to mysql database
 */

function connect(): false|mysqli
{
    global $mysqli;

    $mysqli = mysqli_connect('localhost', 'root', '', 'management');

    if (!$mysqli) {
        echo "Failed connecting to the database: " . mysqli_connect_error();
    }

    return $mysqli;
}
