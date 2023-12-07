
	<section class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-3">
					<div class="widget">
						<h3 class="text-capitalize">Hi <?php echo $_SESSION['teacher_name']; ?>...!</h3>
						<?php
                            $teacher_id = $_SESSION['teacher_id'];
                            $query = "SELECT * FROM teacher WHERE teacher_id = {$teacher_id}";
                            $select_user_query = mysqli_query($connection,$query); 

                            while($row = mysqli_fetch_assoc($select_user_query)){

                                $teacher_id = $row['teacher_id'];
                                $teacher_name = $row['teacher_name'];
                                $teacher_designation = $row['teacher_designation'];
                                $teacher_email = $row['teacher_email'];
                                $teacher_image = $row['teacher_image'];
                            }

                            if(!$select_user_query){
                                die("Query Failed" . mysqli_error($connection));
                            }
                        ?>
                        <?php
                            echo "<p><img src='images/{$teacher_image}' class='img-responsive' alt='teacher_image'></p>";
                        ?>
						<h4 class="text-capitalize"><?php echo $teacher_name; ?></h4>
						<p>Designation: <?php echo $teacher_designation;?></p>
						<p>Email: <?php echo $teacher_email;?></p>
						<p>Department: CSE</p>
						<p><a href='teacher_update.php' class='btn btn-primary'>Update</a></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="post_wrapper">
                        <?php
                            $query = "SELECT * FROM posts ORDER BY post_id DESC";
                            $select_user_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_user_query)){

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
					        <p>posted by <span class="text-capitalize"><?php echo "<a href='post_author.php?author={$post_author}'>$post_author</a>";?></span> | <small class="glyphicon glyphicon-calendar"></small> &nbsp;<?php echo $post_date;?></p>
<!--					        echo date_format($date, 'g:ia \o\n l jS F Y');-->
					        <hr>
					        <article><?php echo $post_content;?></article>
					        
					        <button class="btn btn-success">Download</button>
					    </div>
					    <?php } ?>
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