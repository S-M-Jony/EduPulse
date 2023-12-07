
	<section class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-3">
					<div class="widget">
						<h3 class="text-capitalize">Hi <?php echo $_SESSION['user_name']; ?>!</h3>
						<?php
                            $student_id = $_SESSION['student_id'];
                            $query = "SELECT * FROM students WHERE student_id = {$student_id}";
                            $select_user_query = mysqli_query($connection,$query); 

                            while($row = mysqli_fetch_assoc($select_user_query)){

                                $student_id = $row['student_id'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $user_name = $row['user_name'];
                                $roll_no = $row['roll_no'];
                                $reg_no = $row['reg_no'];
                                $semester = $row['semester'];
                                $user_email = $row['user_email'];
                                $user_password = $row['user_password'];
                                //$user_role = $row['user_role'];
                                $user_image = $row['user_image'];
                                //$user_status = $row['user_status'];
                            }

                            if(!$select_user_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        
						<?php
                            echo "<p><img src='images/{$user_image}' class='img-responsive' alt='user_image'></p>";
                        ?>
						<h4 class="text-capitalize"><?php echo $first_name. ' '. $last_name. ' '. $user_name; ?></h4>
						<p>Id: <?php echo $roll_no;?></p>
						<p>Semester: <?php echo $semester;?>th semester</p>
						<p>Email: <?php echo $user_email;?></p>
						<p>Department: CSE</p>
						<p><a href='students_update.php' class='btn btn-primary'>Update</a></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="post_wrapper">
                        <?php
                            if(isset($_GET['course_id'])){
                                $post_course_id = $_GET['course_id'];

                                $query = "SELECT * FROM posts WHERE post_course_id = '{$post_course_id}'  ORDER BY post_id DESC";
                                $select_post_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_post_query)){

                                    $post_id = $row['post_id'];
                                    $post_course_id = $row['post_course_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_content = $row['post_content'];
                                    $post_file = $row['post_file'];
                        ?>
					    <div class="post">
					        <h3><?php echo $post_title;?></h3>
                            <p><span class="glyphicon glyphicon-user"></span> <span class="text-capitalize"><?php echo "<a href='post_author.php?author={$post_author}'>$post_author</a>";?></span> | <small class="glyphicon glyphicon-calendar"></small> &nbsp;<?php echo $post_date;?></p>
<!--					        echo date_format($date, 'g:ia \o\n l jS F Y');-->
					        <hr>
					        <article><?php echo $post_content;?></article>
					        
					        <p><span class="fileClass"><?php echo "&nbsp;---&nbsp;". $post_file?></span></p>
                            <!-- download file from web-->
					        <p><?php echo "<a type='application/octet-stream' download='$post_file' href='../uploads/$post_file' class='btn btn-success'>Download</a>";?></p>
					    </div>
					    <?php } } ?>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h3>Departments</h3>
						<ul>
							<li><a href="">Computer Science and Engineering</a></li>
							<li><a href="">Information and Communication Technology</a></li>
							<li><a href="">Mathematics</a></li>
							<li><a href="">Statistics</a></li>
							<li><a href="">Physics</a></li>
							<li><a href="">Pharmacy</a></li>
						</ul>
					</div>
					<div class="widget">
						<h3>Semester</h3>
						<ul>
							<li class=""><a href="#">1
				            	<sup>st</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				            <li class=""><a href="#">2<sup>nd</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				               <li class=""><a href="#">3<sup>rd</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				               <li class=""><a href="#">4<sup>th</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				               <li class=""><a href="#">5<sup>th</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				               <li class=""><a href="#">6<sup>th</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				               <li class=""><a href="#">7<sup>th</sup>
				               &nbsp;Semester</a>
				             </li>
				             
				               <li class=""><a href="#">8<sup>th</sup>
				               &nbsp;Semester</a>
				             </li>
						</ul>
					</div>
					<div class="widget">
						<h3>Latest Posts</h3>
						<ul>
							<li>Post title one</li>
							<li>Post title one</li>
							<li>Post title one</li>
							<li>Post title one</li>
							<li>Post title one</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
