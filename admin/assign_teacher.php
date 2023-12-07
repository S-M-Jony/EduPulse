<?php
    if(isset($_POST['update_course'])){
        
        $course_code = $_POST['course_code'];
        $course_teacher = $_POST['course_teacher'];
        
        $query = "UPDATE courses SET ";
        $query .="course_teacher = '{$course_teacher}' ";
        $query .="WHERE course_code = {$course_code} ";
        
        $user_edit_query = mysqli_query($connection, $query);
        
        if(!$user_edit_query){
            die("Query Failed". mysqli_error());
        }
    }
?>