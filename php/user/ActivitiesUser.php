<?php
    require '..\..\FunctionsPHP\session_check.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <link rel="stylesheet" href="..\..\css\admin\ActivitiesAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header>
    <div class="container row">
        <a href="UserMain.php" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="ActivitiesUser.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="#" class="nav__link">User data</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Reserved</a></li>
        </ul>
        <ul class="nav__list">
            <li class="nav__item">
              <a class="nav__link">

                <form action='..\..\FunctionsPHP\logout.php' method="post">
                  <button class="button"type="submit" name="logout">Exit</button>

                </form>
              </a>
            </li>
            <li>
              <a class="nav__link" href="../Profile.php">
                <?php
                
                  if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
          
                    echo 'Welcome, ' . $_SESSION['username'] . '!';
                  }
                ?>
              </a>
            </li>
        </ul>
        </nav>
    </div>
    </header>

        <?php
        // Connect to the database
        include '../../FunctionsPHP/DataBaseConn.php';

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


        foreach ($results as $row) {
          echo '<div class="card">';
          echo '<div class="card__image-holder">';
          echo    '<img class="card__image" src="../../'. $row['path'] .'" alt="wave"/>';
          echo '</div>';
          echo '<div class="card-title">';
          echo    '<span class="left"></span>';
          echo    '<span class="right"></span>';
          echo    '</a>';
          echo    '<h2>';
          echo        $row['Name'];
          echo        '<small>'. $row['Address'] .'</small>';
          echo    '</h2>';
          echo        '<a href="../template/template.php?id='. $row['OffersID'] .'"class="btn" onclick="ToTemplate('. $row['OffersID'] .')">Read more</a>';
          echo '</div>';

          echo  '</div>';
        }
        ?>


  <footer>
    <div class="container row">
    </div>
  </footer>
    
</body>
</html>