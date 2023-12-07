<?php include "admin_header.php"?>
<?php include "admin_menu.php"?>
   
<?php
    $message = "";
    if(isset($_POST['submit'])){
        //$first_name = trim($_POST['first_name']);
        //$last_name = trim($_POST['last_name']);
        $teacher_name = trim($_POST['teacher_name']);
        $teacher_designation = trim($_POST['teacher_designation']);
        $teacher_email = trim($_POST['teacher_email']);
        $teacher_password = trim($_POST['teacher_password']);
        $teacher_mobile = trim($_POST['teacher_mobile']);
        
        //image part start
        $teacher_image = $_FILES['teacher_image']['name'];
        $teacher_image_temp = $_FILES['teacher_image']['tmp_name'];
        move_uploaded_file($teacher_image_temp, "../teacher/images/$teacher_image");
        
    
        //$first_name = mysqli_real_escape_string($connection,$first_name);
        //$last_name = mysqli_real_escape_string($connection,$last_name);
        $teacher_name = mysqli_real_escape_string($connection,$teacher_name);
        $teacher_email = mysqli_real_escape_string($connection,$teacher_email);
        $teacher_password = mysqli_real_escape_string($connection,$teacher_password);
        $teacher_mobile = mysqli_real_escape_string($connection,$teacher_mobile);
        
        

//        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO `teacher`(`teacher_name`, `teacher_designation`, `teacher_email`, `teacher_password`, `teacher_image`,`teacher_mobile`)";
        $query .= "VALUES('{$teacher_name}','{$teacher_designation}','{$teacher_email}','{$teacher_password}','{$teacher_image}','{$teacher_mobile}')";
        
        $register_query = mysqli_query($connection,$query);
        
        if(!$register_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "New teacher added.";
        }
    }
?>
    
    
    
    <section class="body_content container-fluid">
        <div class="row">
            <div class="add_teacher">
                <div class="col-xs-6 col-md-4 registration-form">
                    <h1 class="text-center text-uppercase">cou cse moodle</h1>
                    <h4 class="text-center text-grey">Add new teacher here...!</h4>
                    <form role="form" action="add_teacher.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                        <div class="row">
                        </div>
                        <div class="form-group">
                            <label for="teachername">Teacher Name</label>
                            <input type="text" name="teacher_name" id="teacher_name" class="form-control input-custom" placeholder="Teacher Name" value="">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="teacher_designation" id="teacher_designation" class="form-control input-custom" placeholder="Designation" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="teacher_email" id="teacher_email" class="form-control input-custom" placeholder="somebody@example.com" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="teacher_password" id="key" class="form-control input-custom" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label for="teacher_image">Upload Image</label>
                            <input type="file" name="teacher_image">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" name="teacher_mobile" id="key" class="form-control input-custom" placeholder="********">
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