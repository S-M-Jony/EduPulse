<?php include "admin_header.php"?>
<?php include "admin_menu.php"?>
   
<?php
    $message = "";
    $link = "";
    if(isset($_POST['update_course'])){
        
        $course_code = $_POST['course_code'];
        $course_teacher_id = $_POST['course_teacher_id'];
        
        $query = "UPDATE courses SET course_teacher_id = '{$course_teacher_id}' WHERE course_code = '$course_code'";
        $update_query = mysqli_query($connection, $query);
        
        if(!$update_query){
            die("Query Failed". mysqli_error($update_query));
        }
        $message = "Course teacher has been succesfully added ...!";
        $link = "View all courses";
    }
?>

    <section class="body_content container-fluid">
        <div class="row">
            <div class="add_teacher">
                <div class="col-xs-6 col-md-4 registration-form">
                    <h1 class="text-center text-uppercase">cou cse moodle</h1>
                    <h4 class="text-center text-grey">Assign Teachers to courses...!</h4>
                    <form role="form" action="manage_courses.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                        <div class="form-group">
                            <label for="course_code">Course Code</label>
                            <input type="text" name="course_code" id="course_code" class="form-control input-custom" placeholder="Course code" value="">
                        </div>
                        
                        <div class="form-group">
                            <label for="assign_teacher">Assign Teacher</label>
                            <select name="course_teacher_id" id="" class="form-control">
                                <?php

                                    $query = "SELECT * FROM teacher";
                                    $teacher_query = mysqli_query($connection,$query);

                                    confirmQuery($teacher_query);

                                    while($row = mysqli_fetch_assoc($teacher_query)){
                                        $teacher_id = $row['teacher_id'];
                                        $teacher_name = $row['teacher_name'];

                                        echo " <option value='{$teacher_id}'>{$teacher_name}</option> ";
                                    }
                                ?>
                            </select>
                            
                            
                            
                        </div>
                        <input type="submit" name="update_course" id="btn-login" class="btn btn-success btn-lg" value="Submit">
                        <input type="reset" name="reset" id="btn-reset" class="btn btn-default btn-lg" value="Refresh">
                    </form>
                    <p class="status text-grey"><?php echo $message;?>&nbsp; <a href='all_courses.php' class="text-grey"><?php echo $link;?></a></p>
                </div>
            </div>
        </div>
    </section>
    
<!-- footer part include here -->
    <?php include"admin_footer.php"?>