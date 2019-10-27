<?php
  include("includes/connection.php");
  $proInfo = "SELECT *
                FROM student
                WHERE student.studentId=$userId";
  $runProInfo = mysqli_query($con,$proInfo);
    while($rowInfo = mysqli_fetch_array($runProInfo)){
        $fName= $rowInfo['firstName'];
        $lName= $rowInfo['lastName'];
        $proPic= $rowInfo['profilePic'];
        $coverPic = $rowInfo['coverPic'];
        $gender= $rowInfo['gender'];
        $deptName= $rowInfo['deptName'];
    }
//noOf post by a user
$numberOfPost = "SELECT COUNT(postId) AS c
                FROM post
                WHERE post.studentId=$userId";
$runNoOfPost= mysqli_query($con,$numberOfPost);
 while($rowInfo = mysqli_fetch_assoc($runNoOfPost)){
            $noOfPost= $rowInfo['c'];
 }
?>

<div class="leftContent col">
              
              <div class="proInfo gradientBoxesWithOuterShadows">
                  <div class="cover" id="uploaded_image2">
                      <?php echo "<img src='$coverPic' class='coverPic'' />";?>
                      <?php 
                          if($userId == $loginId ){
                              echo'<input type="file" name="file" id="file2" title=" "/>';
                              echo'<p class="message2">change cover pic</p>';
                          }
                      ?>
                  </div><!--end cover---->
                  
                  <div class="coverBottom">
                      <?php echo "<h1>$fName $lName</h1>";?>
                      <?php echo "<p>Department: $deptName</p>";?>
                      <?php echo "<p>No. Of Post: $noOfPost</p>";?>
                  </div><!--end coverBottoms-->
                  
                      
                  <div class="proPicDiv" id="uploaded_image">
                      
                    <?php echo"<a href='profile.php?id=$userId' class='proPic' style='background:url($proPic);background-size: 120px 120px;'></a>";?>
                    <?php 
                      if($userId == $loginId ){
                          echo'<input type="file" name="file" id="file" title=" "/>';
                          echo'<p class="message">change profile pic</p>';
                      }
                    ?>
                    
                    
                  </div><!--end proPicDiv-->
                  
              </div><!-- end proInfo-->
              
              
</div><!--end left content-->
