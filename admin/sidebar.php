<div class="widget">
    <h3>Departments</h3>
    <ul>
        <li><a href="">Computer Science and Engineering</a></li>
        <li><a href="">Information and Communication Technology</a></li>
        <li><a href="">Mathematics</a></li>
        <li><a href="">Statistics</a></li>
        <li><a href="">Physics</a></li>
        <li><a href="">Pharmacy</a></li>
    </ul>
</div>
<div class="widget">
    <h3>Semester</h3>
    <ul>
        <?php
            for($i=1;$i<=8;$i++){
                $semester = $i;
        ?>
        <li>
            <?php echo "<a href='semester.php?s_id=$semester'>Semester $semester</a>"?>
        </li>
        <?php } ?>
    </ul>
</div>