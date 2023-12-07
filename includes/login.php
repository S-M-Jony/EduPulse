<?php session_start();?>
<?php include "db.php";?>
<?php include "../functions.php"?>
<?php
    if(isset($_POST['login'])){
        userLogin($_POST['user_email'],$_POST['user_password']);
    }
?>
