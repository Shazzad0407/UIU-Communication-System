
<div class="commentSection">
   
    
    <div class="postAcomment">
      <form method="post" action="" enctype="multipart/form-data">
        <textarea class="commentBox" name="comment" placeholder="write your openion....."></textarea>  
        <div class="commentSendImage">
            <div class="imageUp">
                 <input type="file" class="toHide" name="commentImage" accept="image/*"/>
                 <i class="fa fa-camera" aria-hidden="true"></i>
            </div>
            <button class="commentSent" name="<?php echo $postId;?>" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
        <div class="commentPicShow"> 
            <img class="blah" src="" alt=""/>
        </div>  
      </form>
      <?php include("template/postCommentInsert.php");?>
    </div><!--end postAcomment-->
    
    
    <button class="hideShow" >
      <i class="fa fa-comment" aria-hidden="true"></i>
       <span>show all comments</span>
      <i class="fa fa-angle-down" aria-hidden="true"></i>
    </button>
    <div class="hiddenComment">
        <ul>
          <?php
                include("includes/connection.php");
                $allComment= "SELECT * 
                              FROM comment 
                              WHERE postId ='$postId'
                              ORDER BY dateAndtime DESC";
                $runAllComment = mysqli_query($con,$allComment);
                while($rowCom = mysqli_fetch_array($runAllComment)){
                    $commentId= $rowCom['commentId'];
                    $stdId = $rowCom['studentId'];
                    $comTime= $fm->formatDate($rowCom['dateAndtime']);
                    $comDesc = $rowCom['description'];
                    $comPic = $rowCom['picture'];

                    $proPicOfCommentor= "SELECT profilePic,firstName,lastName
                                        FROM student
                                        WHERE studentId = $stdId ";
                    $runProPicOfCommentor = mysqli_query($con,$proPicOfCommentor);
                    while($rowComPic = mysqli_fetch_array($runProPicOfCommentor)){
                        $CommentetorPic = $rowComPic['profilePic'];
                        $CommentetorFname = $rowComPic['firstName'];
                        $CommentetorLname = $rowComPic['lastName'];
                    }
                echo "<li>
                          <a href='profile.php?id=$stdId'><span class='pIcon' style='background:url($CommentetorPic);background-size: 45px 45px;'></span></a>
                          <a href='profile.php?id=$stdId'><h3>$CommentetorFname $CommentetorLname</h3></a>
                          <h6 class='commentTime'>$comTime</h6>";
                          
                    if($stdId == $_SESSION['uId']){
                        $pageName= basename($_SERVER['PHP_SELF']);
                        echo"<a class='comDelete Delete' href='$pageName?cdid=$commentId'><i class='fa fa-trash' aria-hidden='true'></i> </a>";
                        //echo"<a class='comUpdate Update' href='$pageName?cuid=$commentId'><i class='fa fa-pencil' aria-hidden='true'></i> </a>";
                        include("template/commentUpdateDelete.php");
                    }
                           
                        
                    echo " <p>$comDesc</p>";
                          if(!empty($comPic)){
                              echo"<img class='my_image' src='$comPic' width='400px' height='250px'/>";
                          }
                    
                          
                echo "</li>";

                }
          ?>
        
        </ul>
    </div><!--end of hiddenComment-->
</div><!--end commentSection-->