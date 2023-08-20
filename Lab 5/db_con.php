<?php
$servername = "localhost";
$username = "webtech";
$password = "1234";
$dbname = "item_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>