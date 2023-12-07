<?php include "students_header.php"?>
<?php include "students_menu.php"?>

<section class="body_content container-fluid">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="widget">
                    <h3 class="text-capitalize">My courses</h3>
                    <table class="table table-striped text-center">
                        <thead class="thead-inverse">
                            <tr class="text-center">
                                <td>Course Code</td>
                                <td>Course Title</td>
                                <td>Course Credit</td>
                                <td>Course Teacher</td>
                                <td>Incourse</td>
                                <td>Posts</td>
                                <td>Notice Board</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $student_semester = $_SESSION['semester'];
                                $student_id = $_SESSION['student_id'];
                                $query = "SELECT courses.c_id, courses.course_code, courses.course_title, courses.semester, courses.course_teacher_id,courses.course_credit,";
                                $query .= " teacher.teacher_id, teacher.teacher_name";
                                $query .= " FROM courses LEFT JOIN teacher ON courses.course_teacher_id = teacher.teacher_id WHERE semester = $student_semester";
                    
                                $courses_query = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($courses_query)){
                                    $c_id = $row['c_id'];
                                    $course_code = $row['course_code'];
                                    $course_title = $row['course_title'];
                                    $semester = $row['semester'];
                                    $course_teacher_id = $row['course_teacher_id'];
                                    $course_credit = $row['course_credit'];
                                    $teacher_id = $row['teacher_id'];
                                    $teacher_name = $row['teacher_name'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo "<a href='post_by_course.php?course_id=$c_id' class='text-uppercase'>$course_code</a>"?>
                                </td>
                                <td>
                                    <?php echo "<a href='post_by_course.php?course_id=$c_id' class='text-capitalize'>$course_title</a>"?>
                                </td>
                                <td>
                                    <?php echo "<a href='post_by_course.php?course_id=$c_id' class='text-capitalize'>$course_credit</a>"?>
                                </td>
                                <td>
                                    <?php echo "<a href='post_author.php?course_id' class='text-capitalize'>$teacher_name</a>"?>
                                </td>
                                <td>
                                    <?php echo "<a href='myincourse.php?course_id=$c_id' class='btn btn-info text-capitalize'>Incourse</a>"?>
                                </td>
                                <td>
                                    <?php echo "<a href='post_by_course.php?course_id=$c_id' class='btn btn-primary text-capitalize'>See Posts</a>"?>
                                </td>
                                <td>
                                    <?php echo "<a href='notice_by_course.php?course_id=$c_id' class='btn btn-warning text-capitalize'>See Notice</a>"?>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer part include here -->
<?php include"students_footer.php"?>