<?php
//    //escape function for security
//    function escape($string){
//        global $connection;
//        return mysqli_real_escape_string($connection, trim(strip_tags($string)));
//    }
    
    //To redirect the page
    function reDirect($location){
       return header("Location: ". $location);
    }
    
    //confirm query
    function confirmQuery($result){
        global $connection;

        if(!$result){
            die("Query Failed". mysqli_error());
        }
    }
    // user registration function
    function userRegistration($user_name, $user_email, $user_password){
        global $connection;

        $user_name = mysqli_real_escape_string($connection,$user_name);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_password = mysqli_real_escape_string($connection,$user_password);

        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`, `user_role`)";
        $query .= "VALUES('{$user_name}','{$user_email}','{$user_password}','subscriber')";
        $register_query = mysqli_query($connection,$query);
        confirmQuery($register_query);

    }
//    user/students login
    function userLogin($user_email, $user_password){
        global $connection;
        $user_email = trim($user_email);
        $user_password = trim($user_password);

        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $query = "SELECT * FROM students WHERE user_email = '{$user_email}'";
        $select_user_query = mysqli_query($connection, $query);

        if(!$select_user_query){
            die("Query Failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_user_query)){
            $db_student_id = $row['student_id'];
            $db_first_name = $row['first_name'];
            $db_last_name = $row['last_name'];
            $db_user_name = $row['user_name'];
            $db_roll_no = $row['roll_no'];
            $db_reg_no = $row['reg_no'];
            $db_semester = $row['semester'];
            $db_user_email = $row['user_email'];
            $db_user_password = $row['user_password'];
            $db_user_image = $row['user_image'];
            //$db_user_role = $row['user_role'];
            //$db_user_image = $row['user_image'];
        }

        //$user_password = crypt($user_password, $db_user_password);

        if($user_password == $db_user_password){
            $_SESSION['student_id'] = $db_student_id;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name;
            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['roll_no'] = $db_roll_no;
            $_SESSION['reg_no'] = $db_reg_no;
            $_SESSION['semester'] = $db_semester;
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['user_password'] = $db_user_password;
            //$_SESSION['user_role'] = $db_user_role;
            

            reDirect("/cse_moodle/students/all_posts.php");
        }
        else{
            reDirect("/cse_moodle/index.php");
        }
    }

//admin login
    function adminLogin($admin_email, $admin_password){
        global $connection;
        $admin_email = trim($admin_email);
        $admin_password = trim($admin_password);

        $admin_email = mysqli_real_escape_string($connection, $admin_email);
        $admin_password = mysqli_real_escape_string($connection, $admin_password);

        $query = "SELECT * FROM admin WHERE admin_email = '{$admin_email}'";
        $select_admin_query = mysqli_query($connection, $query);

        if(!$select_admin_query){
            die("Query Failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_admin_query)){
            $db_admin_id = $row['admin_id'];
            $db_admin_email = $row['admin_email'];
            $db_admin_name = $row['admin_name'];
            $db_admin_password = $row['admin_password'];
            //$db_user_image = $row['user_image'];
            //$db_user_role = $row['user_role'];
        }

        //$user_password = crypt($user_password, $db_user_password);

        if(($admin_password == $db_admin_password) && ($admin_email == $db_admin_email)){
            $_SESSION['admin_id'] = $db_admin_id;
            $_SESSION['admin_email'] = $db_admin_email;
            $_SESSION['admin_name'] = $db_admin_name;
            
            reDirect("/cse_moodle/admin/all_courses.php");
        }
        else{
            reDirect("/cse_moodle/admin_login.php");
        }
    }
//teacher login
    //admin login
    function teacherLogin($teacher_email, $teacher_password){
        global $connection;
        $teacher_email = trim($teacher_email);
        $teacher_password = trim($teacher_password);

        $teacher_email = mysqli_real_escape_string($connection, $teacher_email);
        $teacher_password = mysqli_real_escape_string($connection, $teacher_password);

        $query = "SELECT * FROM teacher WHERE teacher_email = '{$teacher_email}'";
        $select_teacher_query = mysqli_query($connection, $query);

        if(!$select_teacher_query){
            die("Query Failed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($select_teacher_query)){
            $db_teacher_id = $row['teacher_id'];
            $db_teacher_name = $row['teacher_name'];
            $db_teacher_designation = $row['teacher_designation'];
            $db_teacher_email = $row['teacher_email'];
            $db_teacher_password = $row['teacher_password'];
            $db_teacher_image = $row['teacher_image'];
            //$db_user_image = $row['user_image'];
            //$db_user_role = $row['user_role'];
        }

        //$user_password = crypt($user_password, $db_user_password);

        if(($teacher_password == $db_teacher_password) && ($teacher_email == $db_teacher_email)){
            $_SESSION['teacher_id'] = $db_teacher_id;
            $_SESSION['teacher_email'] = $db_teacher_email;
            $_SESSION['teacher_name'] = $db_teacher_name;
            
            reDirect("/cse_moodle/teacher/all_posts.php");
        }
        else{
            reDirect("/cse_moodle/teacher_login.php");
        }
    }
?>