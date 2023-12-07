<?php include "admin_header.php"?>
<?php include "admin_menu.php"?>
<?php
    if(isset($_GET['delete'])){
//        if(isset($_SESSION['user_role'])){
//            if($_SESSION['user_role'] == 'admin'){
                $course_id_delete = $_GET['delete'];
                $query = "DELETE FROM courses WHERE c_id = {$course_id_delete}";
                $delete_query = mysqli_query($connection, $query);
                header("Location: all_courses.php");
    }
?>

<section class="container-fluid">
    <div class="row">
        <div class="container">
            <?php
                    
                for($i = 1; $i<=8; $i++){
                    
                    $query = "SELECT courses.c_id, courses.course_code, courses.course_title, courses.semester, courses.course_teacher_id, courses.course_credit,";
                    $query .= " teacher.teacher_id, teacher.teacher_name";
                    $query .= " FROM courses LEFT JOIN teacher ON courses.course_teacher_id = teacher.teacher_id WHERE semester = $i";
                    
                    $courses_query = mysqli_query($connection, $query);
                    
            ?>
            <div class="col-md-12">
                <div class="widget">
                    <h3>Semester <?php echo $i;?></h3>
                    
                    
                    <table class="table table-striped text-center">
                        <thead class="thead-inverse">
                            <tr class="text-center">
                                <td>Course Code</td>
                                <td>Course Title</td>
                                <td>Course Credit</td>
                                <td>Course Teacher</td>
                                <td>Edit Course</td>
                                <td>Delete Course</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
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
                                    <a href="" class="text-uppercase">
                                        <?php echo $course_code; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="text-capitalize">
                                        <?php echo $course_title; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="text-capitalize">
                                        <?php echo $course_credit; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="text-capitalize">
                                        <?php echo $teacher_name; ?>
                                    </a>
                                </td>
                                <?php echo "<td><a href='edit_course.php?c_id={$c_id}' class='btn btn-info'>Edit</a></td>"?>
                                <?php echo "<td><a href='all_courses.php?delete={$c_id}' class='btn btn-danger'>Delete</a></td>"?>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- footer part include here -->
<?php include"admin_footer.php"?>