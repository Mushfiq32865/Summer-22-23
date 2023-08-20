<?php
require 'db_con.php';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $buying_price = $_POST['buying_price'];
    $selling_price = $_POST['selling_price'];
    $profit = $selling_price - $buying_price;
    $display = isset($_POST['display']) ? 1 : 0;

// Insert data into the database
    $sql = "INSERT INTO items (name, profit, display) VALUES ('$name', $profit, $display)";

    if ($conn->query($sql) === TRUE) {
    header("Location: display.php");
    echo "Record added successfully.";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>