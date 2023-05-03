<?php     require '..\..\FunctionsPHP\session_check_admin.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\..\css\admin\MainAdmin.css">
  <link rel="stylesheet" href="..\..\css\admin\ActivitiesAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

    <header>
    <div class="container row">
        <a href="#" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="ActivitiesAdmin.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="user_data.php" class="nav__link">User data</a></li>
            <li class="nav__item"><a href="ReservationAdmin.php" class="nav__link">Users Reservations</a></li>
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
              <a class="nav__link" href="../Profile.php">
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

    <h1>Search Field</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Search: <input type="text" name="search">
  <input type="submit" name="submit" value="Search">
</form>

<?php
// Code for retrieving search result goes here
include '../../FunctionsPHP/DataBaseConn.php';

if (isset($_POST['submit'])) {
  $search = $_POST['search'];

  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT * FROM offers LEFT JOIN images on offers.ImageID = images.ImageID WHERE offers.Name LIKE '%$search%' OR offers.Details LIKE '%$search%'");

    $query->execute();
    $results = $query->fetchAll();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }

  // Display the search results in an HTML table
  if (!empty($results)) {
    //echo "<h2>Search Results:</h2>";
    //echo "<table>";
    //echo "<tr><th>Name</th><th>Details</th></tr>";

    foreach ($results as $row) {
      echo '<div class="card">';
      echo '<div class="card__image-holder">';
      echo    '<img class="card__image" src="../../'. $row['path'] .'" alt="wave"/>';
      echo '</div>';
      echo '<div class="card-title">';
      echo    '<span class="left"></span>';
      echo    '<span class="right"></span>';
      echo    '<a href="../template/template.php?id='. $row['OffersID'] .'"class="btn" onclick="ToTemplate('. $row['OffersID'] .')">';
      echo    '<h2>';
      echo        $row['Name'];
      echo        '<small>'. $row['Address'] .'</small>';
      echo    '</h2></a>';
      echo '</div>';
      echo '<div class="card-flap flap1">';
      echo '</div>';
  
      

      //echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Details"] . "</td></tr>";
    }
    //echo "</table>";
  } else {
    echo "<p>No results found.</p>";
    $results = array();
  }

  // Close the database connection
  $conn = null;
}
?>

    
</body>
</html>
