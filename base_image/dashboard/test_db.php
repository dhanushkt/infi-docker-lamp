<?php
error_reporting(E_ALL);
ini_set('disaplay_errors', 1);
ini_set('display_startup_errors', 1);

$db_connection = mysqli_connect("localhost", "root", "", null);

if (!$db_connection) {
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    die("Error in DB connect" . mysqli_error($db_connection));
} else {
    echo "Connection successful";
    echo "username: admin password: " . isset($_ENV['MYSQL_ADMIN_PASS']) ? $_ENV['MYSQL_ADMIN_PASS'] : "not set";
}

mysqli_close($db_connection);