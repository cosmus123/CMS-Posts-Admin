<?php include "includes/db.php"; ?>

<?php session_start() ?>

<?php

$_SESSION['username'] = null;
$_SESSION['password'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['role'] = null;

header("Location: ../index.php");

?>

