<?php ob_start(); ?>
<?php include "../includes/db.php"?>
<?php include "../functions.php"?>

<?php session_start();?>

<?php
    if(!isset($_SESSION['admin_email'])){
        header("Location: ../index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>COU || CSE Moodle</title>
	<!-- Bootstrap Link Part Start Here -->
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
	<!-- Font-awesome Link Part Start Here -->
	<link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
	<!-- My customize css Link Part Start Here -->
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>