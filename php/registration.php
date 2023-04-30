<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="..\css\registration.css">
    <script src="..\js\login.js" defer></script>
</head>
<body>

<?php

// Connect to the database
include '../FunctionsPHP/DataBaseConn.php';
?>

<div id="container2">
		<div class="screen">
			<div class="screen__content">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="signup">

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
                        <input type="password" id="Password" name="Password" class="login__input" placeholder="Password" required>
					</div>

                    <div class="login__field">
						<i class="login__icon fas fa-lock"></i>
                        <input type="password" id="RepeatPassword" name="RepeatPassword" class="login__input" placeholder="Repeat Password" required>
					</div>
                    
                    <input type="submit" name="reg" class="button login__submit" value="Sign up now" id="submitBtn">
	
				</form>

                
                <?php


                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    
                    if (isset($_POST['reg'])) {
                        //check for data from form
                        $FirstName = $_POST['FirstName'];
                        $LastName = $_POST['LastName'];
                        $Password = $_POST['Password'];
                        $RepeatPassword = $_POST['RepeatPassword'];
                        $Email = $_POST['Email'];
    
                        if ($Password ===  $RepeatPassword && filter_var($Email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8){

                            // Prepare and bind the SQL statement
                            $sql = "SELECT * FROM customer WHERE Email = :Email";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':Email', $Email);
                            $stmt->execute();
                            
                            if ($stmt->rowCount() > 0){
                                echo '<p class="incorrect" >This email is already used</p>';
                            } else {
                                $stmt = $conn->prepare ("INSERT INTO customer (FirstName, LastName, Password, Email) VALUES (:FirstName, :LastName, :Password, :Email)");
                                //$stmt->bindParam(':CustomerID', $CustomerID);
                                $stmt->bindParam(':FirstName', $FirstName);
                                $stmt->bindParam(':LastName', $LastName);
                                $stmt->bindParam(':Password', $Password);
                                $stmt->bindParam(':Email', $Email);
                                
                                // Insert the data
                                $stmt->execute();

                                $to = $Email;
                                $subject =  "Welcome to Resting!";
                                $message =  "Hello, now you are registered on the Resting service!";
                                $headers =  "From: kdmk.st@gmail.com\r\n";
                                $headers .= "Reply-To: sender@example.com\r\n";
                                $headers .= "CC: cc@example.com\r\n"; // Дополнительный получатель
                                $headers .= "BCC: bcc@example.com\r\n"; // Скрытая копия

                                // Отправляем письмо
                                if(mail($to, $subject, $message, $headers)) {
                                    echo "Email sent successfully";
                                } else {
                                    echo "Email delivery failed";
                                }


                                header("Refresh:0, url=login.php");
                            }
                        }
                        else{
                            echo '<p class="incorrect" >Something gone wrong</p>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }


                ?>

                <div class="social-login" >
                    <a id="SignIn">
                        <h3 onclick="SignIn();" >Sign in</h3>
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