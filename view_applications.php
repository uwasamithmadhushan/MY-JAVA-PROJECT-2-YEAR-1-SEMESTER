<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Application Listings</h2>
<div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" placeholder="Enter Application Name to Search !" name="search">
        <button type="submit" class="button view-apps-link">Search</button>
    </form>
</div>
<br>
 
<?php
include 'db_connection.php';

function getApplications() {
    global $conn;
    $sql = "SELECT * FROM applications";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>appID</th><th>Name</th><th>Version</th><th>OS</th><th>Ratings</th><th>Description</th><th>Category</th><th>Image</th><th>Action</th></tr>";
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
            // echo "<td>" . (isset($row["img_url"]) ? $row["img_url"] : '') . "</td>";
            echo "<td><button class='update-btn'><a href='update_application.php?id=" . $row["appID"] . "'>Update</a></button><br><br><button class='delete-btn'><a href='delete_application.php?id=" . $row["appID"] . "'>Delete</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No applications found";
    }
}

getApplications();
?>
<br>

<center>
<button class='button view-apps-link'><a href="form.php" style="text-decoration: none; color: inherit;">Back</a></button>
</center>
<br>

<footer class="footer">
    <!-- Footer Content -->
</footer>
</body>
</html>
