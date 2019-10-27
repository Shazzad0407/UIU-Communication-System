<?php
//session_start();
include("includes/connection.php");
    if(isset($_POST['signinSubmit'])){
        $id = mysqli_real_escape_string($con,$_POST['uiuId']);
        $pass = mysqli_real_escape_string($con,$_POST['password']);
        
        //is all field fillup
        if(empty($id) || empty($pass)){
            echo "<script> document.getElementById('errormsg').innerHTML='<h5>please input your id and password!</h5>';</script>";
        }else{
            $loginQuery = "SELECT*
                           FROM student 
                           WHERE studentId = '$id' AND  type='verified'";
            $active= "UPDATE student
                      SET active=1 
                      WHERE studentId = $id";
             $runLoginQuery = mysqli_query($con,$loginQuery);
             $rowNumber = mysqli_num_rows($runLoginQuery);
             if($rowNumber<1){
                echo "<script> document.getElementById('errormsg').innerHTML='<h5>invalid id or unverified account</h5>';</script>";
            }else{
                 if($row = mysqli_fetch_assoc($runLoginQuery)){
                     //de-hashing the password
                     //$hashPassCheck= password_verify($pass,$row['password']);
                     if(!($row['password'] == $pass)){
                        echo "<script> document.getElementById('errormsg').innerHTML='<h5>password do not match! please try again</h5>';</script>"; 
                     }else if($row['password'] == $pass){
                         //log in the user here
                         $_SESSION['uId'] = $row['studentId'];
                         $_SESSION['fName'] = $row['firstName'];
                         $_SESSION['lName'] = $row['lastName'];
                         $_SESSION['email'] = $row['email'];
                         $_SESSION['bDate'] = $row['birthDate'];
                         $_SESSION['proPic'] = $row['profilePic'];
                         $_SESSION['gender'] = $row['gender'];
                         $_SESSION['deptName'] = $row['deptName'];
                         $_SESSION['pass'] = $row['password'];
                         //echo "<script>window.open('home.php','self')</script>";
                         $runActiveQuery = mysqli_query($con,$active);
                         if($runActiveQuery)
                            header("location: home.php");
                     }
                 }
             }
        }
        
        
        
        
        
       
       
        /*
        if($rowNumber == 1){
            echo "success";
            $_SESSION['studentId'] = $id;
            echo "<script>window.open('home.php','self')</script>";
        }
        else{
            echo "<script>alert('incorrect details,try again!')</script>";
        }*/
    }else{
        /*header("Location: index.php");
        exit();*/
    }
  

?>