<?php
    
include("includes/connection.php");

if(isset($_POST[$postId])){
        
    //checking the post validation
    
        //checking is there any image selected or not
        $flagComment=0;
        if(!empty($_FILES['commentImage'])){
            if(is_uploaded_file($_FILES['commentImage']['tmp_name'])) {
                $flagComment = 1;
            }else $flagComment = 0;
        }

        //either an image must be use in comment or something have to write 
        if((!empty($_POST['comment']) || $flagComment==1)){
            
                $commentDescription = mysqli_real_escape_string($con, $_POST['comment']);
        
                $id = $_SESSION['uId'];
            
                // upload images
                if($flagComment==1){
                  $name = $_FILES['commentImage']['name'];
                  $tempName = $_FILES['commentImage']['tmp_name'];
                  $size = $_FILES['commentImage']['size'];
                  $fileExtention = explode('.', $name);
                  $extention = strtolower(end($fileExtention));

                  $finalFile = uniqid().'.'.$extention;

                  $location = 'upload/postComment/'.$finalFile;

                  if((move_uploaded_file($tempName, $location))){
                      //insert value into comment table if image selected
                      $insertCommentQurey = "INSERT INTO comment(studentId, postId, dateAndtime, description, picture) 
                                             VALUES ('$id','$postId',NOW(),'$commentDescription','$location')";
                  }
                    
                }else{
                    //insert value into comment table if no image selected
                    $insertCommentQurey = "INSERT INTO comment(studentId, postId, dateAndtime, description) 
                                           VALUES ('$id','$postId',NOW(),'$commentDescription')";
                }

                $runCommentQuery = mysqli_query($con,$insertCommentQurey);
            }else{
             }
  
}


?>


