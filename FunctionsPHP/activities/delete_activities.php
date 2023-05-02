<?php
// Connect to the database
$host = "127.0.0.1";
$dbname = "booking";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conn->prepare("SELECT * FROM offers LEFT JOIN images ON offers.ImageID = images.ImageID WHERE OffersID = :OffersID");
    $query->bindParam(':OffersID', $_POST['OffersID']);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    // Delete the image from the disk
    if (isset($row['path'])) {
        unlink('../../' . $row['path']);
    }

    // Delete the image information from the database
    $query = $conn->prepare("DELETE offers, images FROM offers LEFT JOIN images ON offers.ImageID = images.ImageID WHERE OffersID = :OffersID");
    $query->bindParam(':OffersID', $_POST['OffersID']);
    $query->execute();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

