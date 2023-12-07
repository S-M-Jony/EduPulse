<?php include "teacher_header.php"?>
<?php include "teacher_menu.php"?>

<?php
    $message= "";
    if(isset($_GET['stu_id'])){
        $stu_edit_id = $_GET['stu_id'];
        $query = "SELECT incourse.stu_id, incourse.marks_course_id, courses.c_id, courses.course_credit FROM incourse LEFT JOIN courses ON incourse.marks_course_id = courses.c_id WHERE stu_id = '{$stu_edit_id}'";
        
        $select_incourse = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_incourse)){
            $course_credit = $row['course_credit'];
            
        }
        
        if(isset($_POST['edit_incourse'])){
            $mid_1 = $_POST['mid_1'];
            $mid_2 = $_POST['mid_2'];
            $mid_avg = ($mid_1 + $mid_2)/2;
            $attendance = $_POST['attendance'];
            $assignment = $_POST['assignment'];
            $presentation = $_POST['presentation'];


            $total = $mid_avg + $attendance + $assignment + $presentation;

            if($course_credit == 2){
                $mid_avg = $mid_avg/2;
                $attendance = $attendance / 2;
                $assignment = $assignment / 2;
                $presentation = $presentation / 2;
                $total = $mid_avg + $attendance + $assignment + $presentation;
            }
            $query = "UPDATE incourse SET ";
            $query .="mid_1 = '{$mid_1}', ";
            $query .="mid_2 = '{$mid_2}', ";
            $query .="mid_avg = '{$mid_avg}', ";
            $query .="attendance = '{$attendance}', ";
            $query .="assignment = '{$assignment}', ";
            $query .="presentation = '{$presentation}', ";
            $query .="total = '{$total}' ";
            $query .="WHERE stu_id = {$stu_edit_id} ";

            $incourse_insert_query = mysqli_query($connection, $query);

            if(!$incourse_insert_query){
                die("Query Failed". mysqli_error());
            }
            else{
                $message = "Incourse has been updated.";
            }
        }
    }
?>



    <section class="body_content container-fluid">
        <div class="row">
            <div class="incourse container">
                <div class="incourse_form">
                    <form role="form" action="edit_incourse.php?stu_id=<?php echo $stu_edit_id?>" enctype="multipart/form-data" method="post" id="registration-form" autocomplete="off">

                        <table class="table text-center">
                            <thead class="thead-inverse">
                                <tr class="text-center">
                                    <td>Mid 01</td>
                                    <td>Mid 02</td>
                                    <td>Attendance</td>
                                    <td>Assignment</td>
                                    <td>Presentation</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="mid_1" id="mid_1" class="form-control text-center" placeholder="Mid Term 01" value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="mid_2" id="mid_2" class="form-control text-center" placeholder="Mid Term 02" value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="attendance" id="attendance" class="form-control text-center" placeholder="Attendance" value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="assignment" id="assignment" class="form-control text-center" placeholder="Assignment" value="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="presentation" id="presentation" class="form-control text-center" placeholder="Presentation" value="">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <input type="submit" name="edit_incourse" id="btn-login" class="btn btn-success" value="Update">
                    </form>
                    <p><a href="" class="status text-grey"><?php echo $message;?></a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer part include here -->
    <?php include"teacher_footer.php"?>