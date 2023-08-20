<?php
require 'db_con.php';

$sql = "SELECT * FROM items WHERE display = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Display</title>
</head>
<body>
    <h2>Display Items</h2>

    
    <?php include 'search.php'; 
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Profit</th>
            <th>Display</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        
        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            // Construct a SQL query to search for items
            $sql = "SELECT * FROM items WHERE name LIKE '%$search%'";

            // Execute the query
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "<td>" . $row['name'] . "</td>\n";
                echo "<td>" . $row['profit'] . "</td>\n";
                echo "<td>Yes</td>\n"; 
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>\n";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>\n";
                echo "</tr>\n";
            }
        } else {
            // If no search query is provided, display all items
            while ($row = $result->fetch_assoc()) {
                echo "<tr>\n";
                echo "<td>" . $row['name'] . "</td>\n";
                echo "<td>" . $row['profit'] . "</td>\n";
                echo "<td>Yes</td>\n"; 
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>\n";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>\n";
                echo "</tr>\n";
            }
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
