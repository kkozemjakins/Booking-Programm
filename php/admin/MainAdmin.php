<?php require '..\..\FunctionsPHP\session_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Защищенная страница</title>
</head>
<body>
  <h1>Добро пожаловать на защищенную страницу</h1>
  <p>Только авторизованные пользователи могут увидеть эту страницу.</p>

  <?php

    if (isset($_POST['logout'])) {
    session_destroy();
    header("Refresh:0");
    //header('Location: LoginAdmin.php');
    exit;
    }
    ?>

    <form method="post">
    <button type="submit" name="logout">Выйти</button>
    </form>

</form>
</body>
</html>
