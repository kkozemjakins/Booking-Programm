<?php
include 'DataBaseConn.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the user ID from the form
    $ReservationID = $_POST["ReservationID"];

    // Get the updated user data from the form
    $PersonAmount = $_POST["PersonAmount"];
    $StartDate = $_POST["StartDate"];
    $EndDate = $_POST["EndDate"];

    // Update the user data in the database
    $query = $conn->prepare("UPDATE reservationdetails SET PersonAmount=:PersonAmount, StartDate=:StartDate, EndDate=:EndDate WHERE ReservationID=$ReservationID");
    $query->bindParam(":PersonAmount", $PersonAmount);
    $query->bindParam(":StartDate", $StartDate);
    $query->bindParam(":EndDate", $EndDate);
    $query->execute();

    // Redirect the user back to the user data table
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}