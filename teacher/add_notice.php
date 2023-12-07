<?php include "teacher_header.php"?>
<?php include "teacher_menu.php"?>
   
<?php
    $message = "";
    if(isset($_POST['post_news'])){
        
        $notification_title = $_POST['notification_title'];
        $notification_content = $_POST['notification_content'];
        $notification_date = date('d-m-y');
        $notification_teacher_id = $_SESSION['teacher_id'];
        $notification_course_id = $_POST['course_id'];
        
        $query = "SELECT semester FROM courses WHERE c_id = $notification_course_id";
        $course_query = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_assoc($course_query)){
            $semester = $row['semester'];
        }
        confirmQuery($course_query);
        
        $notification_title = mysqli_real_escape_string($connection,$notification_title);
        $notification_content = mysqli_real_escape_string($connection,$notification_content);
        $notification_teacher_id = mysqli_real_escape_string($connection,$notification_teacher_id);
        $notification_course_id = mysqli_real_escape_string($connection,$notification_course_id);
        

        $query = "INSERT INTO `notification`(`notification_title`, `notification_content`, `notification_date`, `notification_teacher_id`, `notification_course_id`, `semester`)";

        $query .= "VALUES('{$notification_title}','{$notification_content}',now(),'{$notification_teacher_id}','{$notification_course_id}','{$semester}')";

        $notification_insert_query = mysqli_query($connection, $query);
        
        if(!$notification_insert_query){
            die("Query Failed". mysqli_error());
        }
        $message = "Your notice has been published.";
    }
?>
    
    
    
    <section class="body_content container-fluid">
        <div class="row">
            <div class="add_teacher">
                <div class="col-xs-6 col-md-4 registration-form">
                    <h1 class="text-center text-uppercase">cou cse moodle</h1>
                    <h4 class="text-center text-grey">Add new notice here...!</h4>
                    <form role="form" action="notification.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                        <?php
                            if(isset($_GET['course_id'])){
                                $c_id = $_GET['course_id'];
                            }
                        ?>
                        <div class="form-group">
                            <input type="hidden" name="course_id" id="notification_title" class="form-control input-custom" placeholder="Post Title" value="<?php echo $c_id;?>">
                        </div>
                        <div class="form-group">
                            <label for="post_title">Notice Title</label>
                            <input type="text" name="notification_title" id="notification_title" class="form-control input-custom" placeholder="Post Title" value="">
                        </div>
                        <div class="form-group">
                            <label for="notification_content">Description</label>
                            <textarea name="notification_content" id="notification_content" cols="40" rows="7" placeholder="Description" class="form-control"></textarea>
                        </div>
                        
                        <input type="submit" name="post_news" id="btn-news" class="btn btn-success btn-lg" value="Publish Notice">
                        <input type="reset" name="reset" id="btn-reset" class="btn btn-default btn-lg" value="Refresh">
                    </form>
                    <p><a href="" class="status text-grey"><?php echo $message;?></a></p>
                </div>
            </div>
        </div>
    </section>
    
<!-- footer part include here -->
    <?php include"teacher_footer.php"?>