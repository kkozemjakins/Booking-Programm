<?php require '..\..\FunctionsPHP\session_check.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\..\css\admin\user_data.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <div class="container row">
        <a href="UserMain.php" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="ActivitiesUser.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="#" class="nav__link">User data</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Reservations</a></li>
        </ul>
        <ul class="nav__list">
            <li class="nav__item">
              <a class="nav__link">

                <form action='..\..\FunctionsPHP\logout.php' method="post">
                  <button type="submit" name="logout">Exit</button>

                </form>
              </a>
            </li>
            <li>
              <a class="nav__link">
                <?php
                
                  if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
          
                    echo 'Welcome, ' . $_SESSION['username'] . '!'.  $_SESSION['access'];
                  }
                ?>
              </a>
            </li>
        </ul>
        </nav>
    </div>
    </header>
    <!-- Display data from the users table -->
    <table class="styled-table">
        <tr>
            <th>ReservationCode</th>
            <th>DateOfCreation</th>
            <th>OfferName</th>
            <th>PersonAmount</th>
            <th>StartDate</th>
            <th>EndDate</th>
            <th>SumPrice</th>
        </tr>
        <?php
        // Connect to the database
        include '../../FunctionsPHP/DataBaseConn.php';

        $query = $conn->prepare("SELECT * FROM reservation 
                        LEFT JOIN Offers ON reservation.OfferID = Offers.OffersID 
                        LEFT JOIN reservationdetails ON reservation.ReservationID = reservationdetails.ReservationID");
        $query->execute();
        $results = $query->fetchAll();

        foreach ($results as $row) {
            echo "<tr><td>" . $row['ReservationCode'] . "</td>";
            echo "<td>" . $row['DateOfCreation'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['PersonAmount'] . "</td>";
            echo "<td>" . $row['StartDate'] . "</td>";
            echo "<td>" . $row['EndDate'] . "</td>";
            echo "<td>" . $row['SumPrice'] . "</td>";
            echo "<td>";
            echo "<form action='..\..\FunctionsPHP\DeleteReservation.php' method='post'>";
            echo "<input type='hidden' name='ReservationID' value='".$row['ReservationID']."'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "</td></tr>";
        }
        ?>

    </table>
</body>
</html>
