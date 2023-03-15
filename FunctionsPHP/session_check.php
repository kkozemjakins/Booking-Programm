<?php
session_start();

if (!isset($_SESSION['authorized'])) {
  header('Location: ..\login.php');
  exit;

}elseif ($_SESSION['access'] != 0) {
  header('Location: ..\user\MainAdmin.php');
  exit;
}
?>