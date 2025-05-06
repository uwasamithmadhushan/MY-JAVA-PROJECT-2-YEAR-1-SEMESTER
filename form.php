<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit your Application</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="application-form">

    <h1 class="form-heading">Submit Application Details</h1>

    <form id="applicationForm" method="post" action="submit_application.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="column">
                <div class="form-group">
                    <label for="app_name">App Name</label>
                    <input class="form-control" type="text" name="app_name" id="app_name" required>
                </div>

                <div class="form-group">
                    <label for="app_version">Version</label>
                    <input class="form-control" type="text" name="app_version" id="app_version" required>
                </div>

                <div class="form-group">
                    <label for="app_os">Operating System</label>
                    <select class="form-control" name="app_os" id="app_os" required>
                        <option value="iOS">iOS</option>
                        <option value="Android">Android</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="app_ratings">Ratings</label>
                    <input class="form-control" type="text" name="app_ratings" id="app_ratings" required>
                </div>
            </div>

            <div class="column">
                <div class="form-group">
                    <label for="app_description">Description</label>
                    <textarea class="form-control" rows="5" name="app_description" id="app_description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="app_category">Category</label>
                    <select class="form-control" name="app_category" id="app_category" required>
                        <option value="Educational">Educational</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Beauty">Beauty</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="app_image">Upload Image</label>
                    <input class="form-control" type="file" name="app_image" id="app_image" accept="image/*" required>
                </div>
                
                <!-- <div class="form-group">
                    <label for="app_image_url">Image URL</label>
                    <input class="form-control" type="text" name="app_image_url" id="app_image_url">
                </div> -->
            </div>
        </div>

        <input type="submit" value="Submit" class="form-btn">
        <a href="view_applications.php" class="button view-apps-link">View Applications</a>
        

    </form>

</div>
<script src="validasions.js"></script>

</body>
</html>