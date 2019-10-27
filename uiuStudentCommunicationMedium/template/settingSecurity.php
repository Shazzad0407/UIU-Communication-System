<div class="security content">
<h2>Change Password</h2>
    <div id="msg"></div>
    <form method="post" action="">
        <ul>
            <li><h5>Current password: </h5><input type="password" name="cPass" placeholder="current password:"/></li>
            <li><h5>New password: </h5><input type="password" name="nPass" placeholder="New password:" style="margin-left: 42px;"/></li>
            <li><h5>Re-Type password: </h5><input type="password" name="nPass2" placeholder="Re-Type password:" style="margin-left: 17px;"/></li>
            <li><input type="submit" name="update" value="update password"/></li>
        </ul>
    </form>
</div><!--end of security-->



<!--//update from database-->
<?php
     if(isset($_POST['update'])){
         include("includes/connection.php");
        //checking validation
        $loginId= $_SESSION['uId'];
        //password
         $Opass = $_POST['cPass'];
         $pass = $_POST['nPass'];
         $pass2 = $_POST['nPass2'];
         $cPass = $_SESSION['pass'];
         
         if( $cPass == $Opass ){
             if(strlen($pass) < 8)
                { echo "<script> document.getElementById('msg').innerHTML='<h4>Password should be minimum 8 charecters!</h4>';</script>";}
             else if(strcmp($pass,$pass2)!=0)
                {echo "<script> document.getElementById('msg').innerHTML='<h4>Password do not match!</h4>';</script>";}
             else{
                 $updatePass =mysqli_query($con,"UPDATE student SET password='$pass' WHERE studentId='$loginId'");
                    if($updatePass){
                        $_SESSION['pass'] = $pass;
                        echo "<script> document.getElementById('msg').innerHTML='<h5>password change successfully!</h5>';</script>";
                    }
              }
         }else echo "<script> document.getElementById('msg').innerHTML='<h4>wrong password!</h4>';</script>";
     }
            
         
         
         
         
         
         
         
         
         
         
         
         
         
       
?>