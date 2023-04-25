<?php
    require '..\FunctionsPHP\sesion_check_onguests.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\css\activitiesGuest.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="..\js\Activities.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <header>
    <div class="container row">
        <a href="main.php" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="Activities.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="#" class="nav__link">About</a></li>
            <li class="nav__item"><a href="user\UserReservation.php" class="nav__link">Reservation</a></li>
        </ul>
        <ul class="nav__list">
            <li class="nav__item"><a href="login.php" class="nav__link">Sign in</a></li>
            <li class="nav__item">
            <a href="registration.php" class="nav__link nav__link--button">Sign up</a>
            </li>
        </ul>
        </nav>
    </div>
    </header>


    <!-- Display data from the users table -->
        <?php
        // Connect to the database
        include '../FunctionsPHP/DataBaseConn.php';

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("SELECT * FROM offers LEFT JOIN images on offers.ImageID = images.ImageID");
            $query->execute();
            $results = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }


        ?>

        <div class="cards">

        <?php
        foreach ($results as $row) {
        
            echo '<div class="card">';
            echo '<div class="card__image-holder">';
            echo    '<img class="card__image" src="../'. $row['path'] .'" alt="wave"/>';
            echo '</div>';
            echo '<div class="card-title">';
            echo    '<a href="#" class="toggle-info btn">';
            echo    '<span class="left"></span>';
            echo    '<span class="right"></span>';
            echo    '</a>';
            echo    '<h2>';
            echo        $row['Name'];
            echo        '<small>'. $row['Address'] .'</small>';
            echo    '</h2>';
            echo '</div>';
            echo '<div class="card-flap flap1">';
            echo   '<div class="card-description">';
            echo    $row['Details'];
            echo        '<div class="card-actions"><a href="template/template.php?id='. $row['OffersID'] .'"class="btn" onclick="ToTemplate('. $row['OffersID'] .')">Read more</a></div>';
            echo    '</div>';
            echo  '</div>';
            echo '</div>';
        }
        ?>

        </div>




</body>
</html>
