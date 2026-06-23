<?php
//database connection
$host = 'db';
$username = 'root';
$password = 'root';
$database = 'accura_db';

$db = new mysqli($host, $username, $password, $database);
if ($db->connect_error) {
    die('Database connection failed: ' . $db->connect_error);
}
?>