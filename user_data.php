<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="css\user_data.css">
</head>
<body>
    <!-- Display data from the users table -->
    <table class="styled-table">
        <tr>
            <th>CustomerID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Password</th>
            <th>Email</th>
            <th></th>
            <th></th>
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
            $query = $conn->prepare("SELECT * FROM customer");
            $query->execute();
            $results = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        foreach ($results as $row) {
            echo "<tr><td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>";
            echo "<form action='FunctionsPHP\delete_user.php' method='post'>";
            echo "<input type='hidden' name='CustomerID' value='".$row['CustomerID']."'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='FunctionsPHP\update_user.php' method='post'>";
            echo "<input type='hidden' name='CustomerID' value='".$row['CustomerID']."'>";
            echo "First Name: <input type='text' name='FirstName'  value='".$row['FirstName']."'><br><br>";
            echo "Last Name: <input type='text' name='LastName' value='".$row['LastName']."'><br><br>";
            echo "Password: <input type='text' name='Password' value='".$row['Password']."'><br><br>";
            echo "Email: <input type='email' name='Email' value='".$row['Email']."'><br><br>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
            echo "</td></tr>";
        }
        ?>

    </table>
</body>
</html>
