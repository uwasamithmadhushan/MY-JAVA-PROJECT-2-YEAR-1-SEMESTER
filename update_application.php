<?php
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $appId = $_GET["id"];

        // Retrieve form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $version = mysqli_real_escape_string($conn, $_POST['version']);
        $os = mysqli_real_escape_string($conn, $_POST['os']);
        $ratings = mysqli_real_escape_string($conn, $_POST['ratings']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        
        // Update  
        $sql = "UPDATE applications SET 
                Name='$name', 
                Version='$version', 
                OS='$os', 
                Ratings='$ratings', 
                Description='$description', 
                Category='$category', 
                Image='$image' 
                WHERE appID='$appId'";

        if(mysqli_query($conn, $sql)) {
            echo '<script>alert("Application updated successfully."); window.location.href = "view_applications.php";</script>';
            exit();
        } else {
            echo "Error updating application: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid application ID.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Application</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Update Application</h2>

<?php
// Retrieve application 
if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $appId = $_GET["id"];
    
    $sql = "SELECT * FROM applications WHERE appID='$appId'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <form action="" method="post" class="update-form" onsubmit="return confirm('Are you sure you want to update this application?');">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $row['Name']; ?>"><br><br>
            <label>Version:</label>
            <input type="text" name="version" value="<?php echo $row['Version']; ?>"><br><br>
            <label>Operating System:</label>
            <select name="os">
                <option value="iOS" <?php if($row['OS'] == 'iOS') echo 'selected'; ?>>iOS</option>
                <option value="Android" <?php if($row['OS'] == 'Android') echo 'selected'; ?>>Android</option>
            </select><br><br>
            <label>Ratings:</label>
            <input type="text" name="ratings" value="<?php echo $row['Ratings']; ?>"><br><br>
            <label>Description:</label>
            <textarea name="description"><?php echo $row['Description']; ?></textarea><br><br>
            <label>Category:</label>
            <input type="text" name="category" value="<?php echo $row['Category']; ?>"><br><br>
            <label>Image:</label>
            <input type="text" name="image" value="<?php echo $row['Image']; ?>"><br><br>
            <input type="submit" value="Update Application"><br><br>
            <a href="view_applications.php" class="button view-apps-link">View Applications</a>
        </form>
<?php
    } else {
        echo "No application found with ID: " . $appId;
    }
} else {
    echo "Invalid application ID.";
}
?>

<footer class="y">

 
</body>
</html>
