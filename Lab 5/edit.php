<?php
require 'db_con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $profit = $_POST['profit'];

    $sql = "UPDATE items SET name='$name', profit='$profit' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h3>Edit </h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br><br>

        <label for="profit">Profit:</label>
        <input type="number" id="profit" name="profit" value="<?php echo $row['profit']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
