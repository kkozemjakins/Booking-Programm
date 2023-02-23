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
</head>
<body>

<header>
    <div class="container row">
        <a href="MainAdmin.php" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="ActivitiesAdmin.php" class="nav__link">Activities</a></li>
            <li class="nav__item"><a href="user_data.php" class="nav__link">User data</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Contact</a></li>
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
          
                    echo 'Welcome, ' . $_SESSION['username'] . '!';
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
            <th>OffersID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Address</th>
            <th>Details</th>
        </tr>
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
            $query = $conn->prepare("SELECT * FROM offers");
            $query->execute();
            $results = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        /*id='UpdateValuesForm" . $row['CustomerID'] . "'
          id='ShowUpdateForm" . $row['CustomerID'] . "' onclick='ShowUpdateForm(" . $row['CustomerID'] . ")'
        */

        foreach ($results as $row) {
            echo "<tr><td>" . $row['OffersID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Details'] . "</td></tr>";
        }
        ?>

    </table>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <input type="text" name="Name" class="login__input"  placeholder="Name" required>

        <input type="text" name="Address" class="login__input"  placeholder="Address" required>

        <input type="text" name="Price" class="login__input"  placeholder="Price" required>

        <input type="text" name="Details" class="login__input"  placeholder="Details" required>

        <input type="submit" name="activity" value="Add activity">
    </form>

    <?php
    try {

        if (isset($_POST['activity'])) {
            $Name = $_POST['Name'];
            $Address = $_POST['Address'];
            $Price = $_POST['Price'];
            $Details = $_POST['Details'];

            $stmt = $conn->prepare("INSERT INTO offers(Name, Address, Price, Details) VALUES ( :Name, :Address, :Price, :Details)");

            $stmt->bindParam(':Name', $Name);
            $stmt->bindParam(':Address', $Address);
            $stmt->bindParam(':Price', $Price);
            $stmt->bindParam(':Details', $Details);
                                    
            // Insert the data
            $stmt->execute();
            header("Refresh:0");
        }

    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    ?>

    
</body>
</html>