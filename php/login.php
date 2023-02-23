<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\css\login.css">
    <script src="..\js\login.js" defer></script>
</head>
<body>

<!--style="display: none"-->
    <div id="container">
		<div class="screen">
			<div class="screen__content">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="login">

					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
                        <input type="email" id="Email" class="login__input" name="Email" placeholder="User name / Email" required>
					</div>

					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
                        <input type="password" id="Password" name="Password" class="login__input" placeholder="Password" required>
					</div>
                    
                    <input type="submit" name="login" class="button login__submit" value="Sign in now" id="submitBtn">
					<?php
					session_start();

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
						
						if (mysqli_num_rows($result) > 0) {//checks if the user is already sign up
							$_SESSION['authorized'] = true;

							$_SESSION['username'] = $Email;
				
					

							$UserAccess = "SELECT * FROM customer WHERE Email = '$Email' and Password = '$Password' and Access = 1";
							$AccessResult = mysqli_query($conn, $UserAccess);

							if (mysqli_num_rows($AccessResult) > 0) {//check what level of access the user has admin or user
								header("Refresh:0; url=admin\MainAdmin.php");
							}
							else{
								header("Refresh:0; url=user\UserMain.php");
							}

						} else {
							echo '<p class="incorrect" >Incorrect Email or Password</p>';
						}
					}
					?>
	
				</form>
                <div class="social-login" >
                    <a id="Sign up">
                        <h3 onclick="SignUp();">Sign up</h3>
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
	


</body>
</html>