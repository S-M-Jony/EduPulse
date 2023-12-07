<?php session_start();?>
<?php include "db.php";?>
<?php include "../functions.php"?>
<?php
    if(isset($_POST['login'])){
        adminLogin($_POST['admin_email'],$_POST['admin_password']);
    }
?>
