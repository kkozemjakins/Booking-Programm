<?php
session_start();
include 'DataBaseConn.php';

if (isset($_POST['reservation'])) {
    $CustomerID = $_SESSION['CustomerID'];
    $OfferID = $_SESSION['OfferID'];
    $DateOfCreation = date('d-m-y h:i:s');
    $ReservationCode = uniqid();

    $stmt = $conn->prepare ("INSERT INTO reservation (OfferID, CustomerID, DateOfCreation, ReservationCode) VALUES (:OfferID, :CustomerID, :DateOfCreation, :ReservationCode)");
    $stmt->bindParam(':OfferID', $OfferID);
    $stmt->bindParam(':CustomerID', $CustomerID);
    $stmt->bindParam(':DateOfCreation', $DateOfCreation);
    $stmt->bindParam(':ReservationCode', $ReservationCode);
    

    // Insert the data
    $stmt->execute();

    $stmt = $conn->prepare("SELECT ReservationID FROM reservation WHERE ReservationCode = :ReservationCode");
    $stmt->bindParam(':ReservationCode', $ReservationCode);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $ReservationID = $row['ReservationID'];
    $PersonAmount = $_POST['PersonAmount'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $SumPrice = $_POST['SumPrice'];

    $stmt = $conn->prepare ("INSERT INTO reservationdetails (ReservationID, PersonAmount,StartDate, EndDate, SumPrice) VALUES (:ReservationID, :PersonAmount, :StartDate, :EndDate, :SumPrice)");
    $stmt->bindParam(':ReservationID', $ReservationID);
    $stmt->bindParam(':PersonAmount', $PersonAmount);
    $stmt->bindParam(':StartDate', $StartDate);
    $stmt->bindParam(':EndDate', $EndDate);
    $stmt->bindParam(':SumPrice', $SumPrice);
    

    // Insert the data
    $stmt->execute();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

?>