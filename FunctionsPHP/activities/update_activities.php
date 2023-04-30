<?php
include 'DataBaseConn.php';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the user ID from the form
    $OffersID = $_POST["OffersID"];

    // Get the updated user data from the form
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $password = $_POST["Password"];
    $email = $_POST["Email"];
    $access = $_POST["Access"];

    // Update the user data in the database
    $query = $conn->prepare("UPDATE customer SET FirstName=:firstName, LastName=:lastName, Password=:password, Email=:email, Access=:access WHERE CustomerID=:customerID");
    $query->bindParam(":firstName", $firstName);
    $query->bindParam(":lastName", $lastName);
    $query->bindParam(":password", $password);
    $query->bindParam(":email", $email);
    $query->bindParam(":access", $access);
    $query->bindParam(":customerID", $customerID);
    $query->execute();

    // Redirect the user back to the user data table
    header("Location: ..\php\admin\user_data.php");
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
