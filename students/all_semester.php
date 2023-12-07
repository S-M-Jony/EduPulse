<?php include "students_header.php" ?>
<?php include "students_menu.php" ?>

<?php
    if(isset($_GET['delete'])){
        $course_id_delete = $_GET['delete'];
        $q = "SELECT semester FROM courses WHERE c_id = {$course_id_delete}";
        $select_query = mysqli_query($connection, $q);
        while($row = mysqli_fetch_assoc($select_query)){
            $semester = $row['semester'];
        }
        
        $query = "DELETE FROM courses WHERE c_id = {$course_id_delete}";
        $delete_query = mysqli_query($connection, $query);
        
       
        //echo "course has been deleted..!";
        header("Location: semester.php?s_id=$semester");
    }
?>


<section class="body_content container-fluid">
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <div class="widget">
                    <?php
                        if(isset($_GET['s_id'])){
                            $semester = $_GET['s_id'];
                            $query = "SELECT courses.c_id, courses.course_code, courses.course_title, courses.semester, courses.course_teacher_id,courses.course_credit,";
                            $query .= " teacher.teacher_id, teacher.teacher_name";
                            $query .= " FROM courses LEFT JOIN teacher ON courses.course_teacher_id = teacher.teacher_id WHERE semester = {$semester}";

                            $select_query = mysqli_query($connection, $query);
                        
                    ?>
                        <h3>
                            <?php echo $semester;?><sup>st</sup> Semester</h3>
                        <table class="table table-striped text-center">
                            <thead class="thead-inverse">
                                <tr class="text-center">
                                    <td>Course Code</td>
                                    <td>Course Title</td>
                                    <td>Course Credit</td>
                                    <td>Course Teacher</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($select_query)){
                                    $c_id = $row['c_id'];
                                    $course_code = $row['course_code'];
                                    $course_title = $row['course_title'];
                                    $course_credit = $row['course_credit'];
                                    $semester = $row['semester'];
                                    $teacher_id = $row['teacher_id'];
                                    $teacher_name = $row['teacher_name'];
                            ?>
                                    <tr>
                                        <td class="text-uppercase">
                                            <?php echo "$course_code";?>
                                        </td>
                                        <td class="text-capitalize">
                                            <?php echo "$course_title";?>
                                        </td>
                                        <td>
                                            <?php echo "$course_credit";?>
                                        </td>
                                        <td class="text-capitalize">
                                            <?php echo "$teacher_name";?>
                                        </td>
                                    </tr>
                                    <?php  } ?>
                            </tbody>
                        </table>
                    <?php }?>    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer part include here -->
<?php include"students_footer.php"?>