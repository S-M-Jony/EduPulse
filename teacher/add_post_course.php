<?php include "teacher_header.php"?>
<?php include "teacher_menu.php"?>
   
<?php
    $message = "";
    if(isset($_POST['add_post'])){
        $post_course_id = $_POST['post_course_id'];
        $post_title = $_POST['post_title'];
        $post_author = $_SESSION['teacher_name'];
        $post_date = date('d-m-y');
        $post_content = $_POST['post_content'];
        
        //file part start here
        $file_to_upload = $_FILES['file_to_upload']['name'];
        $file_to_upload_temp = $_FILES['file_to_upload']['tmp_name'];
        move_uploaded_file($file_to_upload_temp, "../uploads/$file_to_upload");

        $post_course_id = mysqli_real_escape_string($connection,$post_course_id);
        $post_title = mysqli_real_escape_string($connection,$post_title);
        $post_author = mysqli_real_escape_string($connection,$post_author);
        $post_content = mysqli_real_escape_string($connection,$post_content);
        

        $query = "INSERT INTO `posts`(`post_course_id`, `post_title`, `post_author`, `post_date`, `post_content`, `post_file`)";

        $query .= "VALUES('{$post_course_id}','{$post_title}','{$post_author}',now(),'{$post_content}','{$file_to_upload}')";

        $post_insert_query = mysqli_query($connection, $query);
        
        if(!$post_insert_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "New post added.";
        }
    }
?>
    
    
    
    <section class="body_content container-fluid">
        <div class="row">
            <div class="add_teacher">
                <div class="col-xs-6 col-md-4 registration-form">
                    <h1 class="text-center text-uppercase">cou cse moodle</h1>
                    <h4 class="text-center text-grey">Publish new post here...!</h4>
                    <form role="form" action="add_post_course.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                        <div class="row">
                        </div>
                        <div class="form-group">
                            <?php
                                if(isset($_GET['course_id'])){
                                    $c_id = $_GET['course_id'];
                                }
                            ?>
                            <input type="hidden" name="post_course_id" id="notification_title" class="form-control input-custom" placeholder="Post Title" value="<?php echo $c_id;?>">
                        </div>
                        <div class="form-group">
                            <label for="post_title">Post Title</label>
                            <input type="text" name="post_title" id="post_title" class="form-control input-custom" placeholder="Post Title" value="">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Description</label>
                            <textarea name="post_content" id="post_content" cols="40" rows="7" placeholder="Description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Upload File</label>
                            <input type="file" name="file_to_upload">
                        </div>
                        <input type="submit" name="add_post" id="btn-login" class="btn btn-success btn-lg" value="Publish Post">
                        <input type="reset" name="reset" id="btn-reset" class="btn btn-default btn-lg" value="Refresh">
                    </form>
                    <p><a href="" class="status text-grey"><?php echo $message;?></a></p>
                </div>
            </div>
        </div>
    </section>
    
<!-- footer part include here -->
    <?php include"teacher_footer.php"?>