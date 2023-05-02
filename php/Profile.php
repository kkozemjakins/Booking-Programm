<?php
session_start();

if (!isset($_SESSION['authorized'])) {
  header('Location: login.php');
  exit;

}

include '../FunctionsPHP/DataBaseConn.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" href="..\css\profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="..\js\user_data.js" defer></script>
</head>
<body>

    <header>
    <div class="container row">
        <a href="#" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="user\ActivitiesUser.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="#" class="nav__link">About</a></li>
            <li class="nav__item"><a href="user\UserReservation.php" class="nav__link">Reservation</a></li>
        </ul>
        </nav>
    </div>
    </header>

    <h1 id="UserProfile">User Profile:</h1>

    <?php

    $customer_id = $_SESSION['CustomerID'];
    $query = $conn->prepare("SELECT * FROM customer WHERE CustomerID = '$customer_id'");
    $query->execute();
    $results = $query->fetchAll();
  


    foreach ($results as $row) {
        echo "<div class='divProfile'>";
        echo "<p>FirstName: " . $row["FirstName"] . "</p>";
        echo "<p>LastName: " . $row["LastName"] . "</p>";
        echo "<p>E-mail: " . $row["Email"] . "</p>";
        echo "<p>Password: " . $row["Password"] . "</p>";
        echo "<form action='..\FunctionsPHP\DeleteProfile.php' method='post'>";
        echo "<input type='hidden' name='CustomerID' value='".$row['CustomerID']."'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "<button class='ShowUpdateForm'>Update</button>";
        echo "<form class='UpdateValuesForm' action='..\FunctionsPHP\UpdateProfile.php' method='post'>";
        echo "<input type='hidden' name='CustomerID' value='".$row["CustomerID"]."'>";
        echo "<input type='text' name='FirstName' value='".$row["FirstName"]."'>";
        echo "<input type='text' name='LastName' value='".$row['LastName']."'>";
        echo "<input type='email' name='Email' value='".$row['Email']."'>";
        echo "<input type='password' name='Password' value='".$row['Password']."'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
        echo "</div>";
    }
        
    ?>


    
</body>
</html>
