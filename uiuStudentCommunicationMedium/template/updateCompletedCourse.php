<?php
    if(isset($_POST['comSubmit']) && !empty($_POST['language2'])){
        include("includes/connection.php");
        $loginId= $_SESSION['uId'];
        
        foreach($_POST['language2'] as $cat){
            $ins = "INSERT INTO completed_course
                    (studentId, courseId) 
                    VALUES ('$loginId','$cat')";
            $runIns= mysqli_query($con,$ins);
        }
        
    }
?>