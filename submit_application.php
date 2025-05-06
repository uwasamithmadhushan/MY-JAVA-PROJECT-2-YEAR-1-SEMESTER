<?php
include 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $appName = mysqli_real_escape_string($conn, $_POST["app_name"]);
    $appVersion = mysqli_real_escape_string($conn, $_POST["app_version"]);
    $appOS = $_POST["app_os"];
    $appRatings = mysqli_real_escape_string($conn, $_POST["app_ratings"]);
    $appDescription = mysqli_real_escape_string($conn, $_POST["app_description"]);
    $appCategory = $_POST["app_category"];
    
    if(isset($_FILES["app_image"]["name"]) && !empty($_FILES["app_image"]["name"])) {
        $appImage = $_FILES["app_image"]["name"];
        $imageTempName = $_FILES["app_image"]["tmp_name"];
        $imageType = $_FILES["app_image"]["type"];

        $targetDirectory = "uploads/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        $targetFile = $targetDirectory . basename($appImage);

        $allowedTypes = array("image/jpeg", "image/png", "image/gif");
        if(in_array($imageType, $allowedTypes)) {
            if(move_uploaded_file($imageTempName, $targetFile)) {
                $sql = "INSERT INTO applications (Name, Version, OS, Ratings, Description, Category, Image)
                        VALUES ('$appName', '$appVersion', '$appOS', '$appRatings', '$appDescription', '$appCategory', '$appImage')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("New record created successfully"); window.location.href = "view_applications.php";</script>';
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Invalid file type. Allowed types are JPG, PNG, and GIF.";
        }
    } else {
        echo "Please select an image.";
    }
}
?>