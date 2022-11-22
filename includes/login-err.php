<?php
session_start();
include "db.php";
include "includes/functions.php";

    $_SESSION['status'] = "Invalid username or password!";
    $_SESSION['status_icon'] = "error";
    header("Location: ../index.php");
?>