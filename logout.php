<?php
include 'include/config.php';
session_start();
if (isset($_SESSION['password']) || isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
    connection_aborted();
    $pdo = null;
    header("location:login.php");
}
