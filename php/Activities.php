<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\css\activities.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

    <header>
    <div class="container row">
        <a href="main.php" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="Activities.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="#" class="nav__link">About</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Contact</a></li>
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
        $host = "127.0.0.1";
        $dbname = "booking";
        $username = "root";
        $password = "";

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

        /*id='UpdateValuesForm" . $row['CustomerID'] . "'
          id='ShowUpdateForm" . $row['CustomerID'] . "' onclick='ShowUpdateForm(" . $row['CustomerID'] . ")'
        */

        /*https://freefrontend.com/css-cards/*/

        foreach ($results as $row) {
            echo "</div>";
            echo "<p>" . $row['Name'] . "</p>";
            echo "<p>" . $row['Address'] . "</p>";
            echo "<p><a href='template/template.php?id=" . $row['OffersID'] . "'>Go to</a></p>";
            echo "</div>";
        }
        ?>
</body>
</html>
