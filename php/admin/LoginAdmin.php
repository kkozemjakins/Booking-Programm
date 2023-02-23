<?php
session_start();
if (isset($_POST['password'])) {
  $password = $_POST['password'];
  if ($password == '12345') {
    $_SESSION['authorized'] = true;
    header('Location: MainAdmin.php');
    exit;
  } else {
    $error = 'Неверный пароль';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
</head>
<body>
  <form method="post">
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password">
    <button type="submit">Войти</button>
  </form>
  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
</body>
</html>
