<?php
include '../DataBaseConn.php';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the user ID from the form
    $OffersID = $_POST["OffersID"];

    if (isset($_POST['UpdateActivity'])) {
        // Save the image information to the database
        if (isset($_FILES['Image']) && !empty($_FILES['Image']['name'])) {
            $fileName = $_FILES['Image']['name'];
            $fileType = $_FILES['Image']['type'];
            $fileSize = $_FILES['Image']['size'];
            $fileTmp = $_FILES['Image']['tmp_name'];
            $fileError = $_FILES['Image']['error'];
            $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');

            if (in_array($fileType, $allowedTypes)) {
                $newLocation = 'images/' . $fileName;
                move_uploaded_file($fileTmp, '../../'. $newLocation);
                $queryNewImg = "INSERT INTO images (name, type, size, path) VALUES (:name, :type, :size, :path)";
                $stmt = $conn->prepare($queryNewImg);
                $stmt->execute([
                    'name' => $fileName,
                    'type' => $fileType,
                    'size' => $fileSize,
                    'path' => $newLocation,
                ]);

                // Get the ID of the last inserted image
                $imageId = $conn->lastInsertId();
            } else {
                echo "Only JPG, PNG, and GIF images are allowed.";
            }
        } else {
            // If no new image is selected, keep the existing image and update the information in the database
            $queryOldImg = $conn->prepare("SELECT * FROM offers LEFT JOIN images on offers.ImageID = images.ImageID WHERE OffersID = $OffersID");
            $queryOldImg->execute();
            $resultsOldImg = $queryOldImg->fetchAll();
        
            $row = $resultsOldImg[0];
            $imageId = $row['ImageID'];
            $newLocation = $row['path'];
            
        }
    }


    // Get the updated user data from the form
    $Name = $_POST["Name"];
    $Address = $_POST["Address"];
    $Price = $_POST["Price"];
    $Details = $_POST["Details"];
    $Link = $_POST["Link"];

    // Update the user data in the database
    $query = $conn->prepare("UPDATE offers SET Name=:Name, Address=:Address, Price=:Price, Details=:Details, Link=:Link,ImageID=:ImageID WHERE OffersID=$OffersID");
    $query->bindParam(":Name", $Name);
    $query->bindParam(":Address", $Address);
    $query->bindParam(":Price", $Price);
    $query->bindParam(":Details", $Details);
    $query->bindParam(":Link", $Link);
    $query->bindParam(":ImageID", $imageId);
    $query->execute();

    // Redirect the user back to the user data table
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
