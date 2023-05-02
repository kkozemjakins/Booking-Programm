<?php
include 'DataBaseConn.php';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("DELETE FROM customer WHERE CustomerID = :CustomerID");
    $query->bindParam(':CustomerID', $_POST['CustomerID']);
    $query->execute();
    header('Location: ..\php\admin\user_data.php');
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>