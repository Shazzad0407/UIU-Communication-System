<div class="postSection">
                
    <?php
        include("includes/connection.php");
    //all post from a specific user for his profile
        if(isset($_GET['id']) || ((basename($_SERVER['PHP_SELF'])) =='profile.php') ){
            $allPost= "SELECT* 
                      FROM post 
                      WHERE studentId = $userId
                      ORDER BY postTime DESC";
        }else{
            $allPost= "SELECT* 
                        FROM post 
                        ORDER BY postTime DESC";
        }
        $runPostQuery = mysqli_query($con,$allPost);
        while($row = mysqli_fetch_array($runPostQuery)){

            $postId= $row['postId'];
            $postBody= $row['description'];
            $stdId= $row['studentId'];
            $courseId= $row['courseId'];
            $postTime= $fm->formatDate($row['postTime']);

            //information of post giver
            $stdInfo = "SELECT* 
                        FROM student 
                        where '$stdId'=studentId";
            $runStdInfo = mysqli_query($con,$stdInfo);
            while($rowStd = mysqli_fetch_array($runStdInfo)){
                $stdFname= $rowStd['firstName'];
                $stdLname= $rowStd['lastName'];
                $stdPro= $rowStd['profilePic'];
            }

             //picture of a post 
            $picQuery = "SELECT* 
                        FROM post_picture 
                        where '$postId'=postId";
            $runPicQuery = mysqli_query($con,$picQuery);


            echo'<div class="post1 gradientBoxesWithOuterShadows">';
                echo"<div class='postBody'>";
                    echo"<a href='profile.php?id=$stdId' class='pIcon' style='background:url($stdPro);background-size: 45px 45px;'></a>";
                    echo"<a href='profile.php?id=$stdId'><h3>$stdFname $stdLname</h3></a>";
                    echo"<span class='postTime'>$postTime</span>";
                    
            
                    //IF LOGIN USER WANT TO DELETE OR UPDATE HIS OWN POST
                    if(isset($_GET['id']) || ((basename($_SERVER['PHP_SELF'])) =='profile.php') ){
                        if($myself==1){
                        echo"<a class='postDelete Delete' href='profile.php?pdid=$postId'><i class='fa fa-trash' aria-hidden='true'></i> </a>";
                        //echo"<a class='postUpdate Update' href='profile.php?puid=$postId'><i class='fa fa-pencil' aria-hidden='true'></i> </a>";
                        }
                        
                    }
                    
                    echo"  <p>$postBody</p>";

                    echo"<div class='postImageSection'>";
                        echo"<ul>";
                            while($rowPic =mysqli_fetch_array($runPicQuery)){
                                $postPic=$rowPic['picture'];
                                echo "<li> <img class='my_image' src='$postPic'/> </li>";
                            }
                        echo"</ul>";

                     echo"</div><!--end postImageSection-->";
                 echo"</div>  <!--end postBody-->";

                 include("commentSection.php");    

            echo"</div><!--end post1-->";                        
        }
    ?>

 </div><!--end of postSection-->