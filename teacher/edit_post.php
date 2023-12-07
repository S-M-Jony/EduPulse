<?php include "teacher_header.php";?>
<?php include "teacher_menu.php"?>
<?php
    $message = "";
    if(isset($_GET['p_id'])){
        $post_edit_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = $post_edit_id";
        $post_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($post_query)){
            $post_title = $row['post_title'];
            $post_content = $row['post_content'];
            $post_file = $row['post_file'];
        }
    }

    if(isset($_POST['edit_post'])){
        $post_edit_id = $_GET['p_id'];
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        
        $file_to_upload = $_FILES['file_to_upload']['name'];
        $file_to_upload_temp = $_FILES['file_to_upload']['tmp_name'];
        move_uploaded_file($file_to_upload_temp, "../uploads/$file_to_upload");
        
        if(empty($file_to_upload)){
            $query = "SELECT * FROM posts WHERE post_id = $post_edit_id ";
            $select_file = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($select_file)){
                $file_to_upload = $row['post_file'];
            }
        }
       
        $query = "UPDATE posts SET ";
        $query .="post_title = '{$post_title}', ";
        $query .="post_content = '{$post_content}', ";
        $query .="post_file = '{$file_to_upload}' ";
        $query .="WHERE post_id = {$post_edit_id} ";
        
        $notification_insert_query = mysqli_query($connection,$query);
        
        if(!$notification_insert_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "Post has been updated...<a href='all_posts.php'>All Posts</a>";
        }
    }
?>



<div class="body_content container">
    <div class="col-md-3"></div>
    <div class="col-md-6 update-form">
        <form action="edit_post.php?p_id=<?php echo $post_edit_id;?>" method="post" enctype="multipart/form-data">
            <fieldset>
               <legend>Your Post Information</legend>
                <div class="form-group">
                    <label for="post_title"> Post Title</label>
                    <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Post title" value="<?php echo $post_title; ?>">
                </div>
                <div class="form-group">
                    <label for="notification_content">Description</label>
                    <textarea name="post_content" id="post_content" cols="40" rows="7" placeholder="Description" class="form-control"><?php echo $post_content; ?></textarea>
                </div>
                <div class="form-group">
                    <h3><span class="fileClass"><?php echo $post_file?></span></h3>
                    <label for="file_upload">Upload File</label>
                    <input type="file" name="file_to_upload">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="edit_post" value="Update">
                </div>
                
                <?php echo "<p>$message</p>"?>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php include "teacher_footer.php"?>