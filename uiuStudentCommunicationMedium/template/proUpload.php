
<?php
    session_start();
   include("../includes/connection.php");
   $loginId= $_SESSION['uId'];

//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999) . '.' . $ext;
 $location =  '../upload/profile/'.$name;
 $loc='upload/profile/'.$name;

 //insert pro pic into database
  $insertQurey = "UPDATE student
                  SET profilePic = '$loc' 
                  WHERE student.studentId='$loginId' ";
  $runInsertQuery = mysqli_query($con,$insertQurey);   
    
  if($runInsertQuery){
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);
     echo '<img src="'.$loc.'" class="proPic" />';
     echo'<input type="file" name="file" id="file" title=" "/>';
     echo'<p class="message">change profile pic</p>';
  }
    

}
?>





