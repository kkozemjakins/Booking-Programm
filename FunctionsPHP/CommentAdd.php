<?php
session_start();
include 'DataBaseConn.php';

if (isset($_POST['CommentAdd'])) {
    $CustomerID = $_SESSION['CustomerID'];
    $OffersID = $_SESSION['OfferID'];
    $Date = date('d-m-y h:i:s');

    $CommentText = $_POST['CommentText'];
    $Rating = $_POST['rating'];


    $stmt = $conn->prepare ("INSERT INTO comments (CustomerID,OffersID,Date,Rating,CommentText) VALUES (:CustomerID,:OffersID,:Date,:Rating,:CommentText)");
    $stmt->bindParam(':OffersID', $OffersID);
    $stmt->bindParam(':CustomerID', $CustomerID);
    $stmt->bindParam(':Date', $Date);
    $stmt->bindParam(':Rating', $Rating);
    $stmt->bindParam(':CommentText', $CommentText);

    

    // Insert the data
    $stmt->execute();

}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>