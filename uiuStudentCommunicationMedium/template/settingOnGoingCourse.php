<div class="onGoingCourse content">
    <h2>Update your On Going courses</h2>
    
    <form method="post" action="">
    <div class="selection gradientBoxesWithOuterShadows">
    <?php
        include("includes/connection.php");
        //find out the couses
        $deptName= $_SESSION['deptName'];
        $courseName = "SELECT courseId,courseName
                       FROM course
                       WHERE deptName = '$deptName'";

        $run2 = mysqli_query($con,$courseName);
        $count=1;
        $n='course';
        while($row2 = mysqli_fetch_array($run2)){

            $courseName= $row2['courseName'];
            $courseId= $row2['courseId'];
            $name =$n.$count;
            echo"<input type='checkbox' id='<?=$name?>' name='language2[]' value='$courseId' class='check'> ";
            echo"<label for='<?=$name?>'><span class='checkName'>$courseName ($courseId)</span></label>";
            $count++;
        }
    ?>
        </div><!--end of selection-->
        <input class="sub" type="submit" name="catSubmit" value="update" />
    </form>
    <?php include("template/updateOnGoingCourse.php"); ?>
    
    <div class="viewSelection gradientBoxesWithOuterShadows">
        <ol>
        <?php
        //find on going courses
        $loginId= $_SESSION['uId'];
        $onGoing =  "SELECT* 
                    FROM on_going_course NATURAL JOIN course
                    WHERE on_going_course.studentId='$loginId'";

        $run2 = mysqli_query($con,$onGoing);
            $sum=0;
        while($row2 = mysqli_fetch_array($run2)){

            $courseName= $row2['courseName'];
            $courseId= $row2['courseId'];
            $credit = $row2['credit'];
            $sum+=$credit;
            echo"<li> $courseName ($courseId)</li>";
        }
            echo"<li>total $sum credit</li>";
    ?>
            
        </ol>
    </div><!--view selection-->
</div><!--end of onGoingCourse-->