<?php
session_start();

if (!isset($_SESSION['authorized'])) {
  header('Location: ..\php\login.php');
  exit;
}
?>