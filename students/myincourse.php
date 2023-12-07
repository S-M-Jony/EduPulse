<?php include  "students_header.php"?>
<?php include  "students_menu.php"?>
   
    <section class="body_content container-fluid">
        <div class="row">
            <div class="incourse container">
                <div class="incourse_form">
                    <?php
                        if(isset($_GET['course_id'])){
                            $c_id = $_GET['course_id'];
                            $query = "SELECT course_title FROM courses WHERE c_id = $c_id";
                            $select_incourse_query = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_incourse_query)){
                                $course_title = $row['course_title'];
                            }
                            echo "<h3 class='text-center text-capitalize'>$course_title</h3>";
                        }
                    ?>
                    
                        <table class="table text-center">
                            <thead class="thead-inverse">
                                <tr class="text-center">
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
                                    if(isset($_GET['course_id'])){
                                        $c_id = $_GET['course_id'];
                                        $stu_roll = $_SESSION['roll_no'];
                                        $query = "SELECT * FROM incourse WHERE marks_course_id = $c_id AND stu_id = $stu_roll";
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
                                ?>
                                <tr>
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
                                <?php } } }?>
                            </tbody>
                        </table>
                    <p><a href="" class="status text-grey"></a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer part include here -->
    <?php include "students_footer.php"?>