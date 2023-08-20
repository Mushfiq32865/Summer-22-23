<?php
require 'db_con.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "DELETE FROM items WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
