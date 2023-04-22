<?php
session_start();

if (isset($_SESSION['authorized']) && $_SESSION['access'] == 1) {
  header('Location: admin\MainAdmin.php');
  exit;

}elseif (isset($_SESSION['authorized']) && $_SESSION['access'] == 0) {
    header('Location: user\UserMain.php');
    exit;
}

?>