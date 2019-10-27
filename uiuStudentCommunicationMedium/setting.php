<?php 
    session_start();
    include("classes/format.php");
    $fm = new format();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>setting</title>
      
    <!-- Custom styles for this template -->
      
    <link href="style/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <link href="style/custom.css" rel="stylesheet">
    <link href="style/setting.css" rel="stylesheet">  


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  </head>
  <body>
      
      <?php 
        
        if(isset($_SESSION['uId'])){
            
            include("template/header.php");
            include("template/settingBody.php");
            
            
        }else{
            header("location: index.php");
            exit();
        }
      ?>
      
    <script src="js/jquery-3.2.1.min.js"></script>  
    

    <script src="js/select.js"></script>

    <script src="js/myJs.js"></script> 
      
  </body>
</html>

