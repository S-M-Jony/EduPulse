<?php include "teacher_header.php"?>
<?php include "teacher_menu.php"?>
<?php
    if(isset($_GET['delete'])){
        $n_id_delete = $_GET['delete'];
        $query = "DELETE FROM notification WHERE notification_id = {$n_id_delete}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: all_notification.php");
    }
?>
	<section class="body_content container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-3">
					<?php include "left_sidebar.php"?>
				</div>
				<div class="col-md-6">
					<div class="post_wrapper">
                        <?php
                                $teacher_id = $_SESSION['teacher_id'];
                                $query = "SELECT notification.notification_id, notification.notification_title, notification.notification_content, notification.notification_date, notification.notification_teacher_id, notification.notification_course_id, notification.semester,";
                                $query .= " courses.c_id, courses.course_title, teacher_id, teacher_name";
                                $query .= " FROM notification LEFT JOIN courses ON notification.notification_course_id = courses.c_id LEFT JOIN teacher ON courses.course_teacher_id = teacher.teacher_id WHERE teacher_id = '{$teacher_id}' ORDER BY notification_id DESC";

                                $select_post_query = mysqli_query($connection,$query);
                                if(!$select_post_query){
                                    die("Query Failed". mysqli_error());
                                }

                                while($row = mysqli_fetch_assoc($select_post_query)){

                                    $notification_id = $row['notification_id'];
                                    $notification_title = $row['notification_title'];
                                    $notification_content = $row['notification_content'];
                                    $notification_date = $row['notification_date'];
                                    $notification_teacher_id = $row['notification_teacher_id'];
                                    $notification_course_id = $row['notification_course_id'];
                                    $c_id = $row['c_id'];
                                    $course_title= $row['course_title'];
                                    $teacher_id = $row['teacher_id'];
                                    $teacher_name = $row['teacher_name'];
                                   
                        ?>
					    <div class="post">
					        <h3><?php echo $notification_title;?><span><?php echo "<a href='notice_by_course.php?course_id=$c_id'> $course_title</a>";?></span></h3>
					        
					        <p><span class="glyphicon glyphicon-user"></span>&nbsp;<span class="text-capitalize"><?php echo "<a href='all_notification.php'>$teacher_name</a>";?></span> | <small class="glyphicon glyphicon-calendar"></small> &nbsp;<?php echo $notification_date;?></p>
<!--					        echo date_format($date, 'g:ia \o\n l jS F Y');-->
					        <hr>
					        <article><?php echo $notification_content;?></article>
					        <a href="edit_notice.php?n_id=<?php echo $notification_id;?>" class="btn btn-primary">Edit</a>
					        <?php echo "<a href='all_notification.php?delete={$notification_id}' class='btn btn-danger'>Delete</a>"?>
					    </div>
					    <?php } ?>
					</div>
				</div>
				<div class="col-md-3">
					<?php include "sidebar.php"?>
				</div>
			</div>
		</div>
	</section>


<?php include "teacher_footer.php"?>