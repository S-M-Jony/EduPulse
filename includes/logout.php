<?php ob_start();?>
<?php session_start();?>
<?php
    $_SESSION['student_id'] = null;
    $_SESSION['first_name'] = null;
    $_SESSION['last_name'] = null;
    $_SESSION['user_name'] = null;
    $_SESSION['roll_no'] = null;
    $_SESSION['reg_no'] = null;
    $_SESSION['user_email'] = null;
    $_SESSION['user_password'] = null;

    header("Location: ../index.php");
?>