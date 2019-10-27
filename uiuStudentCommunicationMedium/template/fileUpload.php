<?php
   include("includes/connection.php");
   
   if(isset($_POST['submitUpload'])){
     echo '<style >';
     echo '.left{ z-index: 0;}';
     echo'</style>';
	 
     $fName = $_SESSION['fName'] ;
	 $lName	= $_SESSION['lName'] ;
	 $uiuId = $_SESSION['uiuID'] ;
	 $email = $_SESSION['email'] ;
	 $pass	=  $_SESSION['pass'];//password_hash($_SESSION['pass'],PASSWORD_DEFAULT); //INSERT PASSWORD WITH HASHING
	 $deptName = $_SESSION['deptName'] ;
	 $bDate = $_SESSION['bDate'] ;
     $gender = $_SESSION['gender'] ;
	 $type = $_SESSION['type'] ;
	 $verCode = $_SESSION['verCode'] ;
		 
      $name = $_FILES['fileToUpload']['name'];
      $tempName = $_FILES['fileToUpload']['tmp_name'];
      $size = $_FILES['fileToUpload']['size'];
      $fileExtention = explode('.', $name);
      $extention = strtolower(end($fileExtention));
      
      $finalFile = uniqid().'.'.$extention;
      
      $location = 'upload/id/'.$finalFile;
      
      if(move_uploaded_file($tempName, $location)){
		  //insert value into database
		 $insertQurey = "INSERT INTO student(studentId, firstName, lastName, email, password, birthDate, profilePic, idPic, gender, type, verCode, regDate, deptName)
									VALUES ('$uiuId', '$fName', '$lName', '$email', '$pass', '$bDate','default.jpg', '$location', '$gender', '$type', '$verCode', NOW(), '$deptName')";
		 
		$runInsertQuery = mysqli_query($con,$insertQurey);
		  if($runInsertQuery ){
              // Unset all of the session variables.
              $_SESSION = array();
			  echo '<style >';
			  echo '#login-box {display:none;}';
              echo '.regLast {display:unset;}';
			  echo '.regLast {opacity:.9;}';
			  echo'</style>';
		  }
          
      }
      else {
             echo "<script> document.getElementById('errormsg').innerHTML='<h5>no image selected. please try again!</h5>';</script>";
         }
   }
?>