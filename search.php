<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    // Perform the search query
    $sql = "SELECT * FROM applications WHERE Name LIKE '%$search%' OR Description LIKE '%$search%' OR Category LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table>";
        echo "<tr><th>appID</th><th>Name</th><th>Version</th><th>OS</th><th>Ratings</th><th>Description</th><th>Category</th><th>Image</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . (isset($row["appID"]) ? $row["appID"] : '') . "</td>";
            echo "<td>" . (isset($row["Name"]) ? $row["Name"] : '') . "</td>";
            echo "<td>" . (isset($row["Version"]) ? $row["Version"] : '') . "</td>";
            echo "<td>" . (isset($row["OS"]) ? $row["OS"] : '') . "</td>";
            echo "<td>" . (isset($row["Ratings"]) ? $row["Ratings"] : '') . "</td>";
            echo "<td>" . (isset($row["Description"]) ? $row["Description"] : '') . "</td>";
            echo "<td>" . (isset($row["Category"]) ? $row["Category"] : '') . "</td>";
            echo "<td>" . (isset($row["Image"]) ? basename($row["Image"]) : '') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No applications found matching your search query.";
    }
} else {
    echo "Search query not provided.";
}

?>
<br>
<br>
<a href="view_applications.php" class="submit" style="display: inline-block; padding: 10px 20px; background-color: #0ca31b; color: #fff; border: none; border-radius: 5px; text-decoration: none; font-size: 16px; transition: background-color 0.3s;">Back to View Page</a>

</body>
</html>