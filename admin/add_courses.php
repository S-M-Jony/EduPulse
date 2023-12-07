<?php include "admin_header.php"?>
<?php include "admin_menu.php"?>
   
<?php
    $message = " ";
    if(isset($_POST['submit'])){
        //$first_name = trim($_POST['first_name']);
        //$last_name = trim($_POST['last_name']);
        $course_code = trim($_POST['course_code']);
        $course_title = trim($_POST['course_title']);
        $course_credit = trim($_POST['course_credit']);
        $semester = trim($_POST['semester']);

        $course_code = mysqli_real_escape_string($connection,$course_code);
        $course_title = mysqli_real_escape_string($connection,$course_title);
        $course_credit = mysqli_real_escape_string($connection,$course_credit);
        $semester = mysqli_real_escape_string($connection,$semester);
    

//        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO `courses`(`course_code`,`course_title`,`semester`,`course_credit`)";
        $query .= "VALUES('{$course_code}', '{$course_title}', '{$semester}', '{$course_credit}')";
        
        $register_query = mysqli_query($connection,$query);
        
        if(!$register_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "New course added.";
        }
    }
?>
    
    
    
    <section class="body_content container-fluid">
        <div class="row">
            <div class="add_teacher">
                <div class="col-xs-6 col-md-4 registration-form">
                    <h1 class="text-center text-uppercase">cou cse moodle</h1>
                    <h4 class="text-center text-grey">Add new courses here...!</h4>
                    <form role="form" action="add_courses.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                       <div class="form-group">
                            <label for="course_code">Course Code</label>
                            <input type="text" name="course_code" id="course_code" class="form-control input-custom" placeholder="Course code" value="">
                        </div>
                        <div class="form-group">
                            <label for="course_title">Course Title</label>
                            <input type="text" name="course_title" id="course_title" class="form-control input-custom" placeholder="Course Title" value="">
                        </div>
                        <div class="form-group">
                            <label for="course_credit">Course Credit</label>
                            <input type="text" name="course_credit" id="course_credit" class="form-control input-custom" placeholder="Course Credit" value="">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" id="semester" class="form-control input-custom" placeholder="Semester Number" value="">
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg" value="Submit">
                        <input type="reset" name="reset" id="btn-reset" class="btn btn-default btn-lg" value="Refresh">
                    </form>
                    <p><a href="" class="status text-grey"><?php echo $message;?></a></p>
                </div>
            </div>
        </div>
    </section>
    
<!-- footer part include here -->
    <?php include"admin_footer.php"?>