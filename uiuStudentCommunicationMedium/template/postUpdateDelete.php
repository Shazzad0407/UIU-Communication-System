<?php
  include("includes/connection.php");
  
  if (isset($_GET['pdid'])){
      $postId= $_GET['pdid'];
      //post deleteing query-> 1st we have to delete postCatagory then post image  all comments of the post  and then post
      
      $postCatagoryDeleteQuery= "DELETE FROM postcatagory
                                 WHERE postId='$postId'";
          
      $postImageDeleteQuery= "DELETE FROM post_picture
                                 WHERE postId='$postId'";
      $postCommentDeleteQuery= "DELETE FROM comment
                                 WHERE postId='$postId'";
          
      $postDeleteQuery= "DELETE FROM post
                         WHERE postId='$postId'";
    
      $runPostCatagoryDeleteQuery= mysqli_query($con,$postCatagoryDeleteQuery);
      $runPostImageDeleteQuery= mysqli_query($con,$postImageDeleteQuery);
      $runPostCommentDeleteQuery= mysqli_query($con,$postCommentDeleteQuery);
      $runPostDeleteQuery= mysqli_query($con,$postDeleteQuery);
      
  }
/*
  else if(isset($_GET['puid'])){
      
  }
*/
    



?>