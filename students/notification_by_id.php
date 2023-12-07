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
                            if(isset($_GET['n_id'])){
                                
                                $n_id = $_GET['n_id'];
                                $query = "SELECT notification.notification_id, notification.notification_title, notification.notification_content, notification.notification_date, notification.notification_teacher_id, notification.notification_course_id, notification.semester,";
                                $query .= " teacher.teacher_id, teacher.teacher_name";
                                $query .= " FROM notification LEFT JOIN teacher ON notification.notification_teacher_id = teacher.teacher_id WHERE notification_id = '{$n_id}'";
                                
                                $select_post_query = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_post_query)){

                                    $notification_id = $row['notification_id'];
                                    $notification_title = $row['notification_title'];
                                    $notification_content = $row['notification_content'];
                                    $notification_date = $row['notification_date'];
                                    $notification_teacher_id = $row['notification_teacher_id'];
                                    $notification_course_id = $row['notification_course_id'];
                                    $semester = $row['semester'];
                                    $teacher_name = $row['teacher_name'];
                        ?>
					    <div class="post">
					        <h3><?php echo $notification_title;?></h3>
					        
					        <p><span class="glyphicon glyphicon-user"></span>&nbsp;<span class="text-capitalize"><?php echo "<a href='notification_author.php?author={$notification_teacher_id}'>$teacher_name</a>";?></span> | <small class="glyphicon glyphicon-calendar"></small> &nbsp;<?php echo $notification_date;?></p>
<!--					        echo date_format($date, 'g:ia \o\n l jS F Y');-->
					        <hr>
					        <article><?php echo $notification_content;?></article>
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