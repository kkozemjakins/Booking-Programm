<?php
    require '..\..\FunctionsPHP\session_check_admin.php'; 
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
    <script src="..\..\js\user_data.js" defer></script>
</head>
<body>

<header>
    <div class="container row">
        <a href="MainAdmin.php" class="logo">Resting</a>
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

        ob_start();
        /*id='UpdateValuesForm" . $row['CustomerID'] . "'
          id='ShowUpdateForm" . $row['CustomerID'] . "' onclick='ShowUpdateForm(" . $row['CustomerID'] . ")'
        */

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
            echo "<form action='..\..\FunctionsPHP\activities\delete_activities.php' method='post'>";
            echo "<input type='hidden' name='OffersID' value='".$row['OffersID']."'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "<button class='ShowUpdateForm'>Update</button>";
            echo "<form class='UpdateValuesForm' action='..\..\FunctionsPHP\activities\update_activities.php' method='post'>";
            echo "<input type='hidden' name='OffersID' value='".$row['OffersID']."'>";
            echo "Name: <input type='text' name='Name'  value='".$row['Name']."'><br><br>";
            echo "Address: <input type='text' name='Address'  value='".$row['Address']."'><br><br>";
            echo "Price: <textarea name='Price' rows='5' cols='20' placeholder='Price' required>".$row['Price']."</textarea><br><br>";
            echo "Details: <textarea name='Details' rows='5' cols='20' placeholder='Details' required>".$row['Details']."</textarea><br><br>";
            echo "Link: <input type='text' name='Link'  value='".$row['Link']."'><br><br>";
            echo "Image: <input type='file' name='Image'><br><br>";
            echo "<input type='submit' name='UpdateActivity' value='Submit Update'>";
            echo "</form>";
            echo '</div>';

        }
        ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    
        <input type="text" name="Name"  placeholder="Name" required>

        <input type="text" name="Address"  placeholder="Address" required>

        <textarea name="Price" rows="5" cols="50" placeholder="Price"  required></textarea>

        <textarea name="Details" rows="5" cols="50" placeholder="Details"  required></textarea>

        <input type="text" name="Link"  placeholder="Link" required>

        <input type="file" name="image" required>

        <input type="submit" name="activity" value="Add activity">
    </form>

<?php
  try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    

      if (isset($_POST['activity'])) {
          // Save the image information to the database
          if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
              $fileName = $_FILES['image']['name'];
              $fileType = $_FILES['image']['type'];
              $fileSize = $_FILES['image']['size'];
              $fileTmp = $_FILES['image']['tmp_name'];
              $fileError = $_FILES['image']['error'];
              $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');

              if (in_array($fileType, $allowedTypes)) {
                  $newLocation = 'images/' . $fileName;
                  move_uploaded_file($fileTmp, '../../'. $newLocation);
                  $query = "INSERT INTO images (name, type, size, path) VALUES (:name, :type, :size, :path)";
                  $stmt = $pdo->prepare($query);
                  $stmt->execute([
                      'name' => $fileName,
                      'type' => $fileType,
                      'size' => $fileSize,
                      'path' => $newLocation,
                  ]);

                  // Get the ID of the last inserted image
                  $imageId = $pdo->lastInsertId();
              } else {
                  echo "Only JPG, PNG, and GIF images are allowed.";
              }
          }

          // Save the information to the table offers
          $Name = $_POST['Name'];
          $Address = $_POST['Address'];

          $Price = $_POST['Price'];
          $Price = htmlspecialchars($Price);

          $Details = $_POST['Details'];
          $Details = htmlspecialchars($Details);

          $Link = $_POST['Link'];

          $stmt = $pdo->prepare("INSERT INTO offers(Name, Address, Price, Details, Link, ImageID) VALUES (:Name, :Address, :Price, :Details, :Link, :ImageID)");

          $stmt->bindParam(':Name', $Name);
          $stmt->bindParam(':Address', $Address);
          $stmt->bindParam(':Price', $Price);
          $stmt->bindParam(':Details', $Details);
          $stmt->bindParam(':Link', $Link);
          $stmt->bindParam(':ImageID', $imageId);

          $stmt->execute();

          // End output buffering and send output to the browser

          header("Refresh:0");

          ob_end_flush();
      }

  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  ?>
  <footer>
    <div class="container row">
    </div>
  </footer>
    
</body>
</html>