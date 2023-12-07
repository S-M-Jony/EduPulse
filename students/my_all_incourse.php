<?php include  "students_header.php"?>
<?php include  "students_menu.php"?>
   
    <section class="body_content container-fluid">
        <div class="row">
            <div class="incourse container">
                <div class="incourse_form">
                    <h3 class="text-center text-capitalize"></h3>
                        <table class="table text-center">
                            <thead class="thead-inverse">
                                <tr class="text-center">
                                    <td>Course Title</td>
                                    <td>Mid 01</td>
                                    <td>Mid 02</td>
                                    <td>Mid Average</td>
                                    <td>Attendance</td>
                                    <td>Assignment</td>
                                    <td>Presentation</td>
                                    <td>Total</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                        $stu_roll = $_SESSION['roll_no'];
                                        
                                        $query = "SELECT incourse.marks_id, incourse.stu_id, incourse.marks_course_id, incourse.mid_1, incourse.mid_2, incourse.mid_avg, incourse.attendance, incourse.assignment, incourse.presentation, incourse.total,";
                                        $query .= " courses.c_id, courses.course_title";
                                        $query .= " FROM incourse LEFT JOIN courses ON incourse.marks_course_id = courses.c_id WHERE stu_id = $stu_roll";
                                        
                                        $select_incourse_query = mysqli_query($connection,$query);
                                        
                                        $count = mysqli_num_rows($select_incourse_query);
                                        if($count == 0){
                                            echo "<h2 class='text-capitalize'>Incourse has not published yet...!</h2>";
                                        }
                                        else{
                                            while($row = mysqli_fetch_assoc($select_incourse_query)){
                                                $marks_course_id = $row['marks_id'];
                                                $mid_1 = $row['mid_1'];
                                                $mid_2 = $row['mid_2'];
                                                $mid_avg = $row['mid_avg'];
                                                $attendance = $row['attendance'];
                                                $assignment = $row['assignment'];
                                                $presentation = $row['presentation'];
                                                $total = $row['total'];
                                                $c_id = $row['c_id'];
                                                $course_title = $row['course_title'];
                                ?>
                                <tr>
                                    <td class="text-capitalize">
                                        <?php echo $course_title?>
                                    </td>
                                    <td>
                                        <?php echo $mid_1?>
                                    </td>
                                    <td>
                                        <?php echo $mid_2?>
                                    </td>
                                    <td>
                                        <?php echo $mid_avg?>
                                    </td>
                                    <td>
                                        <?php echo $attendance?>
                                    </td>
                                    <td>
                                        <?php echo $assignment?>
                                    </td>
                                    <td>
                                        <?php echo $presentation?>
                                    </td>
                                    <td>
                                        <?php echo $total?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    <p><a href="" class="status text-grey"></a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer part include here -->
    <?php include "students_footer.php"?>