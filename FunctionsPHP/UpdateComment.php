<?php
include 'DataBaseConn.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the user ID from the form
    $CommentID = $_POST["CommentID"];

    // Get the updated user data from the form

    date_default_timezone_set('Etc/GMT-3');

    $Date = date('Y-m-d H:i:s');
    $CommentText = $_POST["CommentText"];
    $Rating = $_POST["Rating"];

    // Update the user data in the database
    $query = $conn->prepare("UPDATE comments SET CommentText=:CommentText, Date=:Date, Rating=:Rating WHERE CommentID=$CommentID");
    $query->bindParam(":Date", $Date);
    $query->bindParam(":CommentText", $CommentText);
    $query->bindParam(":Rating", $Rating);
    $query->execute();

    // Redirect the user back to the user data table
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}