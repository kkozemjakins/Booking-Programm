<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>

<button onclick="location.href = 'user_data.php';">User Data</button>
<button onclick="location.href = 'login.php';">Login</button>

<!-- Display data from the users table -->
<table>
    <tr>
        <th>ID</th>
        <th>Test(text)</th>
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
        $query = $conn->prepare("SELECT * FROM demo1");
        $query->execute();
        $results = $query->fetchAll();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    foreach ($results as $row) {
        echo "<tr><td>" . $row['DemoID'] . "</td>";
        echo "<td>" . $row['test'] . "</td></tr>";
    }
    ?>

</table>

<!-- Form to insert new data into the userstable -->
	<p>
	<div class="tip left">
		<a>Insert data</a>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="DemoID">DemoID:</label>
		<!--<input type="text" id="DemoID" name="DemoID" required><br>-->
		<label for="test">test:</label>
		<input type="text" id="test" name="test" required><br>
		<input type="submit" name="Submit" value="Insert">
		</form>
	</div>
	</p>

	<?php
// Insert new data into the users table
if (isset($_POST['Submit'])) {
    //$DemoID = $_POST['DemoID'];
    $test = $_POST['test'];
	
	if(empty($_POST['test'])){
		$_POST['test'] = 'default value';
	}

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare and bind the SQL statement
		
        $stmt = $conn->prepare("INSERT INTO demo1 (test) VALUES ( :test)");
        //$stmt->bindParam(':DemoID',$DemoID);
		$stmt->bindParam(':test', $test);
		// Insert the data
		$stmt->execute();

		echo "New record created successfully. ";
		} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
		}
		}



	?>
	
	<!-- Form to update an existing record in the demo1 table -->
	<p>
	<div class="tip left">
		<a>Update data</a>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="update_DemoID">DemoID:</label>
			<input type="text" id="update_DemoID" name="update_DemoID" required><br>
			<label for="update_test">test:</label>
			<input type="text" id="update_test" name="update_test" required><br>
			<input type="submit" name="update" value="Update">
		</form>
	</div>
	</p>
	

	<!-- Form to delete a record from the demo1 table -->
	<p>
	<div class="tip left">
		<a>Delete data</a>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="delete_DemoID">DemoID:</label>
			<input type="text" id="delete_DemoID" name="delete_DemoID" required><br>
			<input type="submit" name="delete" value="Delete">
		</form>
	</div>
	<p>
	
	<?php
// Update an existing record in the demo1 table
	if (isset($_POST['update'])) {
		$update_DemoID = $_POST['update_DemoID'];
		$update_test = $_POST['update_test'];

		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Prepare and bind the SQL statement
			$stmt = $conn->prepare("UPDATE demo1 SET test=:update_test WHERE DemoID=:update_DemoID");
			$stmt->bind;
			// $stmt->bindParam(':update_DemoID', $update_DemoID);
			$stmt->bindParam(':update_test', $update_test);
			// Update the record
			$stmt->execute();
			echo "Record updated successfully";
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	// Delete a record from the demo1 table
	if (isset($_POST['delete'])) {
		$delete_DemoID = $_POST['delete_DemoID'];

		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Prepare and bind the SQL statement
			$stmt = $conn->prepare("DELETE FROM demo1 WHERE DemoID=:delete_DemoID");
			$stmt->bindParam(':delete_DemoID', $delete_DemoID);
			// Delete the record
			$stmt->execute();
			echo "Record deleted successfully";
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
?>


</body>
</html>