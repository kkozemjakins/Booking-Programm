<?php
include 'DataBaseConn.php';

try {
    $conn->beginTransaction();

    // First, delete the row from the "reservationdetails" table
    $stmt1 = $conn->prepare("DELETE FROM reservationdetails WHERE ReservationID = :ReservationID");
    $stmt1->bindParam(':ReservationID', $_POST['ReservationID']);
    $stmt1->execute();

    // Then, delete the row from the "reservation" table
    $stmt2 = $conn->prepare("DELETE FROM reservation WHERE ReservationID = :ReservationID");
    $stmt2->bindParam(':ReservationID', $_POST['ReservationID']);
    $stmt2->execute();

    $conn->commit();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

} catch(PDOException $e) {
    $e->getMessage();
}
?>



