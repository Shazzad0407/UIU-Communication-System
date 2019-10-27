<?php
    if(isset($_POST['catSubmit']) && !empty($_POST['language2'])){
        include("includes/connection.php");
        $loginId= $_SESSION['uId'];
        //delete previous on going course
        $del = "DELETE 
                FROM on_going_course
                WHERE studentId='$loginId' ";
        $runDel= mysqli_query($con,$del);
        foreach($_POST['language2'] as $cat){
            $ins = "INSERT INTO on_going_course
                    (studentId, courseId) 
                    VALUES ('$loginId','$cat')";
            $runIns= mysqli_query($con,$ins);
        }
        
    }
?>