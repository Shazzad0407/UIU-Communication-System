<?php
session_start();
include("includes/connection.php");

$flag = 0;
if(isset($_REQUEST['signup_submit'])){
 
    $fName = mysqli_real_escape_string($con, $_POST['fName']);
    $lName = mysqli_real_escape_string($con, $_POST['lName']);
    $uiuId = mysqli_real_escape_string($con, $_POST['uiuId']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $pass2 = mysqli_real_escape_string($con, $_POST['password2']);
    $deptName = mysqli_real_escape_string($con, $_POST['deptName']);
    $bDate = mysqli_real_escape_string($con, $_POST['bDate']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $type = "unverified";
    $verCode = mt_rand();
    # $regDate= now();
    
    // checking is input email already exist
    $checkEmailQuery = "SELECT* 
                       FROM student 
                       WHERE email='$email' ";	
    
    $runQuery1 = mysqli_query($con, $checkEmailQuery);
    $check1 = mysqli_num_rows($runQuery1);
	
	// checking is input id already exist
    $checkIDQuery = "SELECT* 
                     FROM student 
                     WHERE studentId='$uiuId'  ";
    
    $runQuery2 = mysqli_query($con, $checkIDQuery);
    $check2 = mysqli_num_rows($runQuery2);
    
    
    if($check1 == 1){
        $flag =1;
        echo "<script> document.getElementById('errormsg').innerHTML='<h5>email already used, please try another!</h5>';</script>";
        
    }
	else if($check2 == 1){
        echo "<script> document.getElementById('errormsg').innerHTML='<h5>ID already used, please try another!</h5>';</script>";
        $flag =2;
	}
    else if(strlen($pass) < 8){
        echo "<script> document.getElementById('errormsg').innerHTML='<h5>Password should be minimum 8 charecters!</h5>';</script>";
        $flag =3;
    }
    else if(strcmp($pass,$pass2)!=0){
        echo "<script> document.getElementById('errormsg').innerHTML='<h5>Password do not match!</h5>';</script>";
        $flag =3;
    }
	else{
		 $_SESSION['fName'] = $fName;
		 $_SESSION['lName'] = $lName;
		 $_SESSION['uiuID'] = $uiuId;
		 $_SESSION['email'] = $email;
		 $_SESSION['pass'] =  $pass;
		 $_SESSION['deptName'] = $deptName;
		 $_SESSION['bDate'] = $bDate;
		 $_SESSION['gender'] = $gender;
		 $_SESSION['type'] = $type;
		 $_SESSION['verCode'] = $verCode;
		 
	echo '<style >';
         echo '.left{ z-index: 0;}';
         echo'</style>';
	} 
    
    if($flag!=0){
        echo"<script>document.getElementById('fName').value = '$fName';</script>";
        echo"<script>document.getElementById('lName').value = '$lName';</script>";
        echo"<script>document.getElementById('deptName').value = '$deptName';</script>";
        echo"<script>document.getElementById('bDate').value = '$bDate';</script>";
        if($flag!=1)
            echo"<script>document.getElementById('email').value = '$email';</script>";
        if($flag!=2)
            echo"<script>document.getElementById('uiuId').value = '$uiuId';</script>";
        if($flag!=3){
            echo"<script>document.getElementById('pass').value = '$pass';</script>";
            echo"<script>document.getElementById('pass2').value = '$pass2';</script>";
        }
        if($gender=='male')
            echo"<script>document.getElementByclass('male').checked;</script>";
        else if($gender=='female')
            echo"<script>document.getElementByclass('female').checked;</script>";   
    }
}

?>


