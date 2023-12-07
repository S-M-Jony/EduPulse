<div class="post_wrapper">
                        <?php
                            if (isset($_POST['submit'])){
                                $search = $_POST['search'];
                                
                                $query = "SELECT posts.post_id, posts.post_course_id, posts.post_title, posts.post_author, posts.post_date, posts.post_content, posts.post_file,";
                                $query .= " courses.c_id, courses.course_title";
                                $query .= " FROM posts LEFT JOIN courses ON posts.post_course_id = courses.c_id WHERE course_title LIKE '%$search%' ORDER BY post_id DESC";
                                
                                $search_query = mysqli_query($connection, $query);
                                if(!$search_query){
                                    die("Query Failed".mysqli_error($connection));
                                }
                                $count = mysqli_num_rows($search_query);
                                if($count == 0){
                                    echo "NO Posts yet...!";
                            }
                            else{
                                while($row = mysqli_fetch_assoc($search_query)){
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
					        
					        <p><span class="glyphicon glyphicon-user"></span>&nbsp;<span class="text-capitalize"><?php echo "<a href='post_author.php?author={$post_author}'>$post_author</a>";?></span> | <small class="glyphicon glyphicon-calendar"></small> &nbsp;<?php echo $post_date;?></p>
<!--					        echo date_format($date, 'g:ia \o\n l jS F Y');-->
					        <hr>
					        <article><?php echo $post_content;?></article>
                            <p><span class="fileClass"><?php echo "&nbsp;---&nbsp;". $post_file?></span></p>
                            <!-- download file from web-->
					        <p><?php echo "<a type='application/octet-stream' download='$post_file' href='../uploads/$post_file' class='btn btn-success'>Download</a>";?></p>
					    </div>
					    <?php } } }?>
					</div>