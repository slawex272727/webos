<?php
session_start();
$_SESSION['true'] = false;
header('Location: /index.php');
?>