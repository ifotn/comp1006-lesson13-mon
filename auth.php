<?php
// access the current session
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

?>
