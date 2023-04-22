<?php
session_start();

if (!isset($_SESSION['authorized'])) {
  header('Location: ..\login.php');
  exit;

}elseif ($_SESSION['access'] != 1) {
  header('Location: ..\user\UserMain.php');
  exit;
}
?>