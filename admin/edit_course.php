<?php include "admin_header.php";?>
<?php include "admin_menu.php"?>
<?php
    $message = "";
    $link = "";
    if(isset($_GET['c_id'])){
        $course_edit_id = $_GET['c_id'];
    }
    $query = "SELECT * FROM courses WHERE c_id = {$course_edit_id}";
    $course_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($course_query)){

        $c_id = $row['c_id'];
        $course_code = $row['course_code'];
        $course_title = $row['course_title'];
        $semester = $row['semester'];
        $course_teacher_id = $row['course_teacher_id'];
    }

    if(isset($_POST['update_course'])){
        $course_code = $_POST['course_code'];
        $course_title = $_POST['course_title'];
        $semester = $_POST['semester'];
        $course_teacher_id = $_POST['course_teacher_id'];
    
        $query = "UPDATE courses SET ";
        $query .="course_code = '{$course_code}', ";
        $query .="course_title = '{$course_title}', ";
        $query .="semester = '{$semester}', ";
        $query .="course_teacher_id = '{$course_teacher_id}'";
        $query .="WHERE c_id = {$course_edit_id} ";

        $course_edit_query = mysqli_query($connection,$query);

        confirmQuery($course_edit_query);
        $message = "course updated...";
        $link = "View all courses.";
        //header("Location: all_courses.php");
    }
?>




<div class="body_content container">
    <div class="col-md-3"></div>
    <div class="col-md-6 update-form">
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
               <legend>Update Student Information</legend>
                <div class="form-group">
                    <label for="course_code"> Course Code</label>
                    <input type="text" class="form-control" name="course_code" id="course_code" placeholder="First Name" value="<?php echo $course_code; ?>">
                </div>
                <div class="form-group">
                    <label for="course_title">Course Title</label>
                    <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Last Name" value="<?php echo $course_title; ?>">
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester Number" value="<?php echo $semester; ?>">
                </div>
                <div class="form-group">
                    <label for="course_teacher">Course Teacher</label>
                    <select name="course_teacher_id" id="" class="form-control">
                        <?php
                            $query = "SELECT * FROM teacher WHERE teacher_id = $course_teacher_id";
                            $teacher_query = mysqli_query($connection,$query);
                            
                        
//                            $query = "SELECT * FROM teacher ";
//                            $teacher_query = mysqli_query($connection,$query);

                            confirmQuery($teacher_query);

                            while($row = mysqli_fetch_assoc($teacher_query)){
                                $teacher_id = $row['teacher_id'];
                                $teacher_name = $row['teacher_name'];
                                echo " <option value='{$teacher_id}'>{$teacher_name}</option> ";
                            }
                            
                            $query = "SELECT * FROM teacher";
                            $teacher_query = mysqli_query($connection,$query);

                            confirmQuery($teacher_query);

                            while($row = mysqli_fetch_assoc($teacher_query)){
                                $teacher_id = $row['teacher_id'];
                                $teacher_name = $row['teacher_name'];
                                if($teacher_id !== $course_teacher_id){
                                    echo " <option value='{$teacher_id}'>{$teacher_name}</option> ";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update_course" value="Update Course">
                </div>
                <p><?php echo $message. "<a href='all_courses.php'>$link</a>"; ?></p>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php include "admin_footer.php" ?>