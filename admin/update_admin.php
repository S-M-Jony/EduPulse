<?php include "admin_header.php";?>
<?php include "admin_menu.php"?>
<?php
    $message = "";
    $admin_edit_id = $_SESSION['admin_id'];
    $query = "SELECT * FROM admin WHERE admin_id = {$admin_edit_id}";
    $admin_query = mysqli_query($connection,$query); 

    while($row = mysqli_fetch_assoc($admin_query)){

        $admin_id = $row['admin_id'];
        $admin_name = $row['admin_name'];
        $admin_email = $row['admin_email'];
        $admin_password = $row['admin_password'];
    }

    if(isset($_POST['update_admin'])){
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        
        $query = "UPDATE admin SET ";
        $query .="admin_name = '{$admin_name}', ";
        $query .="admin_email = '{$admin_email}', ";
        $query .="admin_password = '{$admin_password}' ";
        $query .="WHERE admin_id = {$admin_edit_id} ";
        
        $admin_edit_query = mysqli_query($connection,$query);
        
        confirmQuery($admin_edit_query);
        $message = "Information has been updated.";
    }
?>



<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6 update-form">
        <form action="update_admin.php" method="post" enctype="multipart/form-data">
            <fieldset>
               <legend>Update Admin Information</legend>
                <div class="form-group">
                    <label for="admin_name"> Admin Name</label>
                    <input type="text" class="form-control" name="admin_name" id="first_name" placeholder="First Name" value="<?php echo $admin_name; ?>">
                </div>
                <div class="form-group">
                    <label for="admin_email">Admin Email</label>
                    <input type="email" class="form-control" name="admin_email" id="last_name" placeholder="Last Name" value="<?php echo $admin_email; ?>">
                </div>
                <div class="form-group">
                    <label for="user_name">Password</label>
                    <input type="password" class="form-control" name="admin_password" id="user_name" placeholder="User Name" value="<?php echo $admin_password; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update_admin" value="Update Admin">
                </div>
                <p class=""><?php echo $message;?></p>
            </fieldset>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>


<?php include "admin_footer.php"?>