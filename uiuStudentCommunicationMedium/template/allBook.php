<?php
    include("includes/connection.php");
    $loginId= $_SESSION['uId'];
    $fName =$_SESSION["fName"];
    $lName =$_SESSION["lName"];

    $allBookQ= "SELECT* 
               FROM (book NATURAL JOIN belongs_to) INNER JOIN course USING(courseId)";

    
    $runAllBook= mysqli_query($con,$allBookQ);
    
    $rowNumber = mysqli_num_rows($runAllBook);
    
    if($rowNumber<1){
        echo'<div class="suggestedBook">';
            echo'<div id="noSugg">';
                    echo"<h2>Sorry  $fName $lName</h2>";
                    echo"<h4>There is no book in our library<h4>";
            echo'</div>';
        echo'</div>';
    }else{
          echo'<div class="suggestedBook">';
            echo'<ul>';
                while($row = mysqli_fetch_array($runAllBook)){
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