<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\css\login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="..\js\login.js" defer></script>
</head>
<body>

	<header>
    <div class="container row">
        <a href="main.php" class="logo">Resting</a>
        <nav class="nav">
        <ul class="nav__list nav__list--primary">
            <li class="nav__item"><a href="main.php" class="nav__link">Main page</a></li>
        </ul>
        </nav>
    </div>
    </header>

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
					include '../FunctionsPHP/DataBaseConn.php';

					$conn = mysqli_connect($host, $username, $password, $dbname);

					if (isset($_POST['login'])) {
						$Email = $_POST['Email'];
						$Password = $_POST['Password'];
						
						$sql = "SELECT * FROM customer WHERE Email = '$Email' and Password = '$Password'";
						$result = mysqli_query($conn, $sql);
					
						if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$_SESSION['authorized'] = true;
							$_SESSION['username'] = $row['FirstName'] . ' ' . $row['LastName']; // Устанавливаем $_SESSION['username'] равным имени и фамилии пользователя
							$_SESSION['access'] = $row['Access'];

							if ($row['Access'] == 1) {
								header("Refresh:0; url=admin\MainAdmin.php");
							} else {
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
				<div class="social-main" >
                    <a id="Sign up">
                        <h3 onclick="ToMain();">As guest</h3>
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