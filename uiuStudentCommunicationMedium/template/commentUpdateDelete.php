<?php
  include("includes/connection.php");
  
  if (isset($_GET['cdid'])){
      $commentId= $_GET['cdid'];
      //comment deleteing query
      $comDeleteQuery= "DELETE FROM comment
                         WHERE commentId='$commentId'";
      $runComDeleteQuery= mysqli_query($con,$comDeleteQuery);
      
  }

 /* else if(isset($_GET['cuid'])){
      echo"<script>document.getElementById('comment').value = '$comDesc';</script>";
      
  }*/

    



?>