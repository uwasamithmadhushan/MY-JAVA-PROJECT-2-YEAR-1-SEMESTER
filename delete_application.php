<?php
include 'db_connection.php';

 
if (isset($_GET['id'])) {
    $appID = $_GET['id'];

    //   delete  
    $sql = "DELETE FROM applications WHERE appID = $appID";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Application deleted successfully."); window.location.href = "view_applications.php";</script>';
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No application ID provided";
}

$conn->close();
?>
