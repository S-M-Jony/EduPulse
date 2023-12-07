<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/menu.php" ?>
 
 <?php
    $message = " ";
    if(isset($_POST['registration'])){
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $user_name = trim($_POST['user_name']);
        $roll_no = trim($_POST['roll_no']);
        $reg_no = trim($_POST['reg_no']);
        $semester = trim($_POST['semester']);
        $user_email = trim($_POST['user_email']);
        $user_password = trim($_POST['user_password']);
        
        //image part start
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp, "students/images/$user_image" );
        
    
        $first_name = mysqli_real_escape_string($connection,$first_name);
        $last_name = mysqli_real_escape_string($connection,$last_name);
        $user_name = mysqli_real_escape_string($connection,$user_name);
        $roll_no = mysqli_real_escape_string($connection,$roll_no);
        $reg_no = mysqli_real_escape_string($connection,$reg_no);
        $semester = mysqli_real_escape_string($connection,$semester);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_password = mysqli_real_escape_string($connection,$user_password);

        $query = "INSERT INTO `students`(`first_name`, `last_name`, `user_name`, `roll_no`, `reg_no`, `semester`, `user_email`, `user_password`, `user_image`)";
        $query .= "VALUES('{$first_name}','{$last_name}','{$user_name}','{$roll_no}','{$reg_no}','{$semester}','{$user_email}','{$user_password}','{$user_image}')";
        
        $register_query = mysqli_query($connection,$query);
        
        if(!$register_query){
            die("Query Failed". mysqli_error());
        }
        else{
            $message = "Registration Successful.";
        }
    }
?>
  
<section class="content container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
<!--
                <div class="logo_dept text-center">
                    <img src="images/logo_cse.png" alt="department logo" class="img-responsive">
                    <h3 class="text-capitalize text-white">Computer science and engineering</h3>
                </div>
-->
            </div>
            <div class="col-md-6">
                <div class="registration pull-right">
                    <h3 class="text-center text-grey text-capitalize">Register here for upto date.</h3>
                    <form role="form" action="index.php" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control input-custom" placeholder="First Name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control input-custom" placeholder="Last Name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="user_name" id="user_name" class="form-control input-custom" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                            <label for="username">Id or Roll no.</label>
                            <input type="text" name="roll_no" id="roll_no" class="form-control input-custom" placeholder="Id" value="">
                        </div>
                        <div class="form-group">
                            <label for="username">Register no.</label>
                            <input type="text" name="reg_no" id="reg_no" class="form-control input-custom" placeholder="Registration no" value="">
                        </div>
                        <div class="form-group">
                            <label for="username">Semester</label>
                            <input type="text" name="semester" id="semester" class="form-control input-custom" placeholder="Semester" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control input-custom" placeholder="somebody@example.com" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control input-custom" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label for="user_image">Upload Image</label>
                            <input type="file" name="user_image">
                        </div>
                        <input type="submit" name="registration" id="btn-login" class="btn btn-success" value="Submit">
                        <input type="reset" name="reset" id="btn-reset" class="btn btn-default" value="Refresh">
                    </form>
                    <p><a href="" class="status text-grey"><?php echo $message; ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
   

<!-- footer part include here -->
    <?php include"includes/footer.php"?>