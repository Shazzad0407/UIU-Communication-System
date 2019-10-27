<?php
    include("includes/connection.php");
    $loginId= $_SESSION['uId'];
    $fName =$_SESSION["fName"];
    $lName =$_SESSION["lName"];

    $findOnGoingCourse= "SELECT * 
                         FROM (((on_going_course  NATURAL JOIN course) NATURAL JOIN belongs_to )) INNER JOIN book USING(bookName,edition)
                         WHERE on_going_course.studentId ='$loginId'";
    
    $runFindOnGoingCourse= mysqli_query($con,$findOnGoingCourse);
    
    $rowNumber = mysqli_num_rows($runFindOnGoingCourse);
    
    if($rowNumber<1){
        echo'<div class="suggestedBook">';
            echo'<div id="noSugg">';
                    echo"<h2>Sorry  $fName $lName</h2>";
                    echo"<h4>No book suggestion for you.<br> For better experience update your on going courses from setting<h4>";
            echo'</div>';
        echo'</div>';
       
    }else{
          echo'<div class="suggestedBook">';
            echo'<ul>';
                while($row = mysqli_fetch_array($runFindOnGoingCourse)){
                    $bookName=$row['bookName'];
                    $bookEdition=$row['edition'];
                    $cName=$row['courseName'];
                    $uploader=$row['studentId'];

                    echo"<li><a href='#'>$bookName ($bookEdition)</a><br>for $cName<br></li>";
                    echo"<br>";
                }
            echo'</ul>';
        echo'</div>';
    }
                    
?>