<?php
ob_start();
session_start();

if (!isset($_SESSION['true']) || ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']))
{
    session_regenerate_id();
    $_SESSION['true'] = true;
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
}
?>