<?php include "teacher_header.php";?>
<?php include "teacher_menu.php"?>
<?php
    $message = "";
    if(isset($_GET['n_id'])){
        $not_edit_id = $_GET['n_id'];
        $query = "SELECT notification.notification_id, notification.notification_title, notification.notification_content, notification.notification_date, notification.notification_teacher_id, notification.notification_course_id, notification.semester,";
        $query .= " courses.c_id, courses.course_title";
        $query .= " FROM notification LEFT JOIN courses ON notification.notification_course_id = courses.c_id WHERE notification_id = '{$not_edit_id}' ORDER BY notification_id DESC";
        $notification_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($notification_query)){
            $notification_id = $row['notification_id'];
            $notification_title = $row['notification_title'];
            $notification_content = $row['notification_content'];
            $notification_date = $row['notification_date'];
            $notification_teacher_id = $row['notification_teacher_id'];
            $notification_course_id = $row['notification_course_id'];
            $course_title = $row['course_title'];
        }
    }
?>
<?php

    if(isset($_POST['update_notice'])){
        $not_edit_id = $_GET['n_id'];
        $notification_course_id = $_POST['course_id'];
        $notification_title = $_POST['notification_title'];
        $notification_content = $_POST['notification_content'];
        
        $query = "SELECT semester FROM courses WHERE c_id = $notification_course_id";
        $course_query = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_assoc($course_query)){
            $semester = $row['semester'];
        }
        
        $query = "UPDATE notification SET ";
        $query .="notification_title = '{$notification_title}', ";
        $query .="notification_content = '{$notification_content}', ";
        $query .="notification_course_id = '{$notification_course_id}', ";
        $query .="semester = '{$semester}' ";
        $query .="WHERE notification_id = {$not_edit_id} ";
        
        $notification_insert_query = mysqli_query($connection,$query);
        
        if(!$notification_insert_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "Information has been updated...<a href='all_notification.php'>All Notice</a>";
        }
    }
?>



<div class="body_content container">
    <div class="col-md-3"></div>
    <div class="col-md-6 update-form">
        <form action="edit_notice.php?n_id=<?php echo $not_edit_id;?>" method="post" enctype="multipart/form-data">
            <fieldset>
               <legend>Your Information</legend>
               
               <div class="form-group">
                    <label for="course_title">Course Title</label>
                    <select name="course_id" id="" class="form-control">
                        
                        <?php
                            echo "<option value='{$notification_course_id}'>{$course_title}</option> ";
                       
                            $teacher_id = $_SESSION['teacher_id'];
                            $query = "SELECT * FROM courses WHERE course_teacher_id = $teacher_id";
                            $course_query = mysqli_query($connection,$query);
                            
                            confirmQuery($course_query);
                        
                            while($row = mysqli_fetch_assoc($course_query)){
                                $c_id = $row['c_id'];
                                $course_title = $row['course_title'];
                                if($c_id !== $notification_course_id){
                                    echo " <option value='{$c_id}'>{$course_title}</option> ";
                                }
                            }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="notification_title"> Notice Title</label>
                    <input type="text" class="form-control" name="notification_title" id="notification_title" placeholder="teacher Name" value="<?php echo $notification_title; ?>">
                </div>
                <div class="form-group">
                    <label for="notification_content">Description</label>
                    <textarea name="notification_content" id="notification_content" cols="40" rows="7" placeholder="Description" class="form-control"><?php echo $notification_content; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update_notice" value="Update">
                </div>
                
                <?php echo "<p>$message</p>"?>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php include "teacher_footer.php"?>