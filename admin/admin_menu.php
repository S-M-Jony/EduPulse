<nav class="navbar navbar-default">
    <!-- after default there can be use .navbar-fixed, .navbar-static(with top or bottom)-->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id=mynav>
            <ul class="nav navbar-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Semester<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                                for($i=1;$i<=8;$i++){
                                    $semester = $i;
                                
                            ?>
                            <li class="text-center"><?php echo "<a href='semester.php?s_id=$semester'>Semester $semester</a>"?>
                            </li>
                            <li class="divider"></li>
                            <?php } ?>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="text-center"><a href="all_courses.php">All Courses</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="text-center"><a href="add_courses.php">Add Courses</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="text-center"><a href="manage_courses.php">Manage Courses</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teacher<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="text-center"><a href="all_teacher.php">All Teacher</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="text-center"><a href="add_teacher.php">Add Teacher</a></li>
                        </ul>
                    </li>
                </ul>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li class="text-center"><a href="../includes/logout.php">Logout</a></li>
            </ul>
<!--
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <input type="submit" class="form-control btn-primary" name="submit" value="Submit">
                </div>
            </form>
-->

        </div>
    </div>
</nav>