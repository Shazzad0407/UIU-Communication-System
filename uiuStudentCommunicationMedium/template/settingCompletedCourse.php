<div class="onGoingCourse content">
    <h2>Update Your completed courses</h2>
    
    <form method="post" action="setting.php?cat=4">
    <div class="selection gradientBoxesWithOuterShadows">
    <?php
        include("includes/connection.php");
        $loginId= $_SESSION['uId'];
        //find out the couses
        $deptName= $_SESSION['deptName'];
        $courseName = "SELECT *
                        FROM
                        (SELECT c.courseId,c.courseName,c.deptName
                        FROM course c LEFT JOIN completed_course b
                        ON (c.courseId = b.courseId) && (b.studentId='$loginId')
                        WHERE b.courseId IS NULL) AS abc
                        WHERE deptName='$deptName'";

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
        <input class="sub" type="submit" name="comSubmit" value="update" />
    </form>
    <?php include("template/updateCompletedCourse.php"); ?>
    
    <div class="viewSelection gradientBoxesWithOuterShadows">
        <ol>
        <?php
        //find on going courses
        
        $onGoing =  "SELECT* 
                    FROM completed_course NATURAL JOIN course
                    WHERE completed_course.studentId='$loginId'";

        $run2 = mysqli_query($con,$onGoing);
            $sum=0;
        while($row2 = mysqli_fetch_array($run2)){

            $courseName= $row2['courseName'];
            $courseId= $row2['courseId'];
            $credit = $row2['credit'];
            $sum+=$credit;
            echo"<li> $courseName ($courseId)</li>";
        }
            echo"<li>total $sum credit completed</li>";
    ?>
            
        </ol>
    </div><!--view selection-->
</div><!--end of onGoingCourse-->