<?php
    
include("includes/connection.php");

if(isset($_POST['postSubmit'])){
        
    //checking the post validation
    
        //checking is there any image selected or not
        $flagPost=0;
        if(!empty($_FILES['postImage'])){
            if(is_uploaded_file($_FILES['postImage']['tmp_name'][0])) {
                $flagPost = 1;
            }else $flagPost = 0;
        }

        //either an image must be upload or something have to write 
        if((!empty($_POST['postText']) || $flagPost==1)){
            
            $postDescription = mysqli_real_escape_string($con, $_POST['postText']);
            
            //a post must have a ctagory or a course name
            if( !empty($_POST['courseName']) || !empty($_POST['class']) ){
                
                $id = $_SESSION['uId'];

                //make a random post id
                $a1 = rand(65,90);  //A-Z
                $a2 = rand(97,122); //a-z
                $a3 = rand(2345,7899);
                $a4 = rand(0, 30900);
                $a5 = rand(33,126);
                $date = date("d-m-y");
                $time = time("h:i:s");

                $c1 = chr($a1);
                $c2 = chr($a2);
                $c3 = chr($a5);

                $postId= $date.$time.$c1.$a3.$c3.$a4.$c2.$a5;

                //find the course id
                if(!empty($_POST['courseName'])){
                    $postRelatedCourse =mysqli_real_escape_string($con, $_POST['courseName']);
                    $searchCourseId = "SELECT courseId
                                        FROM course
                                        WHERE courseName = '$postRelatedCourse'
                                        limit 1";
                    $courseIdRow = mysqli_query($con,$searchCourseId);
                    while($row = mysqli_fetch_array($courseIdRow)){

                            $courseId= $row['courseId'];                                   
                    }
                    //insert value into post table if course id exist
                    $insertQurey = "INSERT INTO post(postId,description,studentId,courseId,postTime) 
                                    VALUES ('$postId','$postDescription','$id','$courseId',NOW())
                                    ";
                    
                }

                //insert value into post table if course id is not exist
                $insertQurey = "INSERT INTO post(postId,description,studentId,postTime) 
                                VALUES ('$postId','$postDescription','$id',NOW())
                                ";

                $runInsertQuery = mysqli_query($con,$insertQurey);

                if($runInsertQuery){
                    //insert catagory
                    if(!empty($_POST['class'])){
                        foreach($_POST['class'] as $cat){   
                            //fin catagory id
                            //find the course id
                            $searchCatId = "SELECT catagoryId
                                            FROM catagory
                                            WHERE catagoryName = '$cat'
                                            ";
                            $catIdRow = mysqli_query($con,$searchCatId);
                            while($row = mysqli_fetch_array($catIdRow)){

                                    $catId= $row['catagoryId'];                                   
                            }
                             //insert catagory into postcatagory
                            $insertQurey = "INSERT INTO postcatagory(postId, catagoryId) VALUES ('$postId','$catId')";

                             $runInsertQuery = mysqli_query($con,$insertQurey);

                        }
                    }// end of insert catagory

                    // upload images
                      if($flagPost==1){
                          for($x=0; $x<count($_FILES['postImage']['tmp_name']); $x++ ) {

                                $name = $_FILES['postImage']['name'][$x];
                                $size = $_FILES['postImage']['size'][$x];
                                $tempName  = $_FILES['postImage']['tmp_name'][$x];

                                $fileExtention = explode('.', $name);
                                $extention = strtolower(end($fileExtention));

                                $finalFile = uniqid().'.'.$extention;

                                $location = 'upload/post/'.$finalFile;

                                //insert image into post_picture
                                $insertQurey = "INSERT INTO post_picture(picture, postId) VALUES ('$location','$postId')";

                                 $runInsertQuery = mysqli_query($con,$insertQurey);
                                 if($runInsertQuery){
                                    move_uploaded_file($tempName, $location);
                                 }else echo"unsucessfull";
                            } // endfor
                        } 
                        
                    }


            }else{
                    echo"<script>document.getElementById('textarea').value = '$postDescription';</script>";
                    echo 'please tag at least one catagory or a course ';
             }

         }else{
                echo '<script language="javascript">';
                echo 'alert("please write something or upload at least one image")';
                echo '</script>';
          }   
}


?>


