<?php session_start();?>
<?php include "db.php";?>
<?php include "../functions.php"?>
<?php
    if(isset($_POST['login'])){
        teacherLogin($_POST['teacher_email'],$_POST['teacher_password']);
    }
?>
