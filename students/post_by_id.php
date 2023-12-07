<?php include "students_header.php"?>
<?php include "students_menu.php"?>

	<section class="body_content container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-3">
					<?php include "left_sidebar.php"?>
				</div>
				<div class="col-md-6">
					<div class="post_wrapper">
                        <?php
                            if(isset($_GET['p_id'])){
                                $post_id = $_GET['p_id'];
                                
                                $query = "SELECT posts.post_id, posts.post_course_id, posts.post_title, posts.post_author, posts.post_date, posts.post_content, posts.post_file,";
                                $query .= " courses.c_id, courses.course_title";
                                $query .= " FROM posts LEFT JOIN courses ON posts.post_course_id = courses.c_id WHERE post_id = '{$post_id}'";
                                
                                $select_post_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_post_query)){

                                    $post_id = $row['post_id'];
                                    $post_course_id = $row['post_course_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_content = $row['post_content'];
                                    $post_file = $row['post_file'];
                                    $c_id = $row['c_id'];
                                    $course_title = $row['course_title'];
                        ?>
					    <div class="post">
					        <h3><?php echo $post_title;?> <span><?php echo "<a href='post_by_course.php?course_id=$c_id'>$course_title</a>";?></span></h3>
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
					<?php include "sidebar.php";?>
				</div>
			</div>
		</div>
	</section>


<?php include "students_footer.php"?>