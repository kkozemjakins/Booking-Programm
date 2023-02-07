<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="css/login.css">
    <script src="js/login.js" defer></script>
</head>
<body>

<!--style="display: none"-->
    <div class="container">
		<div class="screen">
			<div class="screen__content">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="login">

					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
                        <input type="email" id="Email" class="login__input" name="Email" placeholder="User name / Email" required>
					</div>

					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
                        <input type="text" id="Password" name="Password" class="login__input" placeholder="Password" required>
					</div>
                    
                    <input type="submit" name="login" class="button login__submit" value="Sign in now" id="submitBtn">
	
				</form>
                <div class="social-login">
                    <a id="SignUp" onclick="SignUp();">
                        <h3>Sign up</h3>
                    </a>
			    </div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>		
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>		
		</div>
	</div>
	
    <?php

// Connect to the database
$host = "127.0.0.1";
$dbname = "booking";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (isset($_POST['login'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    
    $sql = "SELECT * FROM customer WHERE Email = '$Email' and Password = '$Password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        header("location: user_data.php");
    } else {
        echo "Incorrect Email or Password";
    }
}
?>

<!-- Form to insert new data into the userstable -->
<p>
	<div class="tip left">
		<a>Registation</a>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="CustomerID">CustomerID:</label>
		<input type="text" id="CustomerID" name="CustomerID" required><br>

		<label for="FirstName">FirstName:</label>
		<input type="text" id="FirstName" name="FirstName" required><br>

        <label for="LastName">LastName:</label>
		<input type="text" id="LastName" name="LastName" required><br>

        <label for="Password">Password:</label>
		<input type="text" id="Password" name="Password" required><br>

        <label for="Email">Email:</label>
		<input type="email" id="Email" name="Email" required><br>

		<input type="submit" name="submit" value="Insert" id="submitBtn">
		</form>
	</div>
	</p>


    <div class="container2">
		<div class="screen">
			<div class="screen__content">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="signup">

                    <div class="login__field">
                        <input type="text" id="CustomerID" name="CustomerID" class="login__input"  placeholder="CustomerID" required>
                    </div>

                    <div class="login__field">
                        <input type="text" id="FirstName" name="FirstName" class="login__input"  placeholder="FirstName" required>
                    </div>

                    <div class="login__field">
                        <input type="text" id="LastName" name="LastName" class="login__input"  placeholder="LastName" required>
                    </div>

					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
                        <input type="email" id="Email" class="login__input" name="Email" class="login__input"  placeholder="Email" required>
					</div>

					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
                        <input type="text" id="Password" name="Password" class="login__input" placeholder="Password" required>
					</div>

                    <div class="login__field">
						<i class="login__icon fas fa-lock"></i>
                        <input type="text" id="Password" name="Password" class="login__input" placeholder="Repeat Password" required>
					</div>
                    
                    <input type="submit" name="login" class="button login__submit" value="Sign in now" id="submitBtn">
	
				</form>
                <div class="social-login">
                    <a id="SignUp" onclick="SignUp();">
                        <h3>Sign up</h3>
                    </a>
			    </div>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>		
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>		
		</div>
	</div>
	

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
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if (isset($_POST['submit'])) {
    $CustomerID = $_POST['CustomerID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    
    // Prepare and bind the SQL statement
    $sql = "SELECT * FROM customer WHERE Email = :Email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Email', $Email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0){
        echo "Error u tebja";
    } else {
        $sql = "INSERT INTO customer VALUES (:CustomerID, :FirstName, :LastName, :Password, :Email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CustomerID', $CustomerID);
        $stmt->bindParam(':FirstName', $FirstName);
        $stmt->bindParam(':LastName', $LastName);
        $stmt->bindParam(':Password', $Password);
        $stmt->bindParam(':Email', $Email);
        
        // Insert the data
        $stmt->execute();
        echo "New record created successfully";
        header("location: user_data.php");
    }
}
?>






</body>
</html>