<?php require '..\..\FunctionsPHP\session_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
	<link rel="stylesheet" href="..\..\css\user\UserMain.css">
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
            <li class="nav__item"><a href="ActivitiesUser.php" class="nav__link">Activities</a></li>
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
          
                    echo 'Welcome, ' . $_SESSION['username'] . '!'.  $_SESSION['access'];
                  }
                ?>
              </a>
            </li>
        </ul>
        </nav>
    </div>
    </header>

    
</body>
</html>
