<?php
session_start();

if (!isset($_COOKIE['auth']) || $_COOKIE['auth'] !== 'valid') {
    header("Location: login.php");
    exit;
}
?>
