                    <div class="widget">
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
                                $user_image = $row['user_image'];
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
					
					<div class="widget">
						<h3 class="text-capitalize">Latest Notice</h3>
						<?php
                            $semester = $_SESSION['semester'];
                            $query = "SELECT * FROM notification WHERE semester = $semester ORDER BY notification_id DESC LIMIT 7";
                            
                            $select_notification_query = mysqli_query($connection,$query);
                        
                            while($row = mysqli_fetch_assoc($select_notification_query)){

                                $notification_id = $row['notification_id'];
                                $notification_title = $row['notification_title'];
                                $notification_content = $row['notification_content'];
                                $notification_date = $row['notification_date'];
                                $notification_teacher_id = $row['notification_teacher_id'];
                                $notification_course_id = $row['notification_course_id'];
                                $semester = $row['semester'];
                                
                                echo "<p><span class='glyphicon glyphicon-tags'></span>&nbsp; <a href='notification_by_id.php?n_id=$notification_id'>$notification_title</a></p>";
                            }
                        ?>
                        <p>&nbsp;</p>
                        <p><a href="notifications_all.php" class="btn btn-primary">All Notice</a></p>
					</div>