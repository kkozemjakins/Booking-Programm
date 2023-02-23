<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Connect to the database
    $host = "127.0.0.1";
    $dbname = "booking";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check if the file input field is set and not empty
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        // Get the file information
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];
        $fileSize = $_FILES['image']['size'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileError = $_FILES['image']['error'];

        // Check if the file is a valid image file
        $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
        if (in_array($fileType, $allowedTypes)) {
            // Move the uploaded file to a new location
            $newLocation = 'images/' . $fileName;
            move_uploaded_file($fileTmp, $newLocation);

            // Save the image information to the database
            $query = "INSERT INTO images (name, type, size, path) VALUES ('$fileName', '$fileType', '$fileSize', '$newLocation')";
            mysqli_query($conn, $query);

            // Display a success message
            echo "File uploaded successfully.";

            header("Refresh:0");

        } else {
            // Display an error message if the file is not a valid image file
            echo "Only JPG, PNG, and GIF images are allowed.";
        }
    } else {
        // Display an error message if no file was uploaded
        echo "Please choose a file to upload.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Upload Image</title>
</head>
<body>

<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>


</body>
</html>
