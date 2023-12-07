<?php include "admin_header.php"?>
<?php include "admin_menu.php"?>
	<section class="body_content container-fluid">
		<div class="row">
			<div class="container">
                <div class="col-md-4">
                    <div class="widget admin-profile">
                        <?php
                            $admin_id = $_SESSION['admin_id'];
                            $query = "SELECT * FROM admin WHERE admin_id = {$admin_id}";
                            $select_admin_query = mysqli_query($connection,$query); 

                            while($row = mysqli_fetch_assoc($select_admin_query)){

                                $admin_id = $row['admin_id'];
                                $admin_name = $row['admin_name'];
                                $admin_email = $row['admin_email'];
                                $admin_password = $row['admin_password'];
                            }

                            if(!$select_admin_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        <h2>Admin Information</h2>
                        <hr>
                        <div class="admin-image">
                            <img src="" alt="">
                        </div>
                        <h4 class="text-capitalize">Admin Name: <?php echo $admin_name; ?></h4>
                        <p class="">Admin Email: <?php echo $admin_email;?></p>
                        <p class="">Department: Computer Science and Engineering</p>
                        <p class=""><a href='update_admin.php' class='btn btn-primary'>Update</a></p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="admin-text">
                        <h2 class="">Welcome To CSE Department.</h2>
                        <hr>
                        <article>
                            This website is developed based on the idea of  <q class="text-capitalize">Course management system</q>. In this admin panel you can add teacher, add courses, assign teacher on courses and manage the courses.
                        </article>
                        <br>
                        <article>
                            You can see the course list here semester by semester. You can keep track and manage the courses here. 
                        </article>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php include "sidebar.php"?>
                </div>
			</div>
		</div>
	</section>


<?php include "admin_footer.php"?>