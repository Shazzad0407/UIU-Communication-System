<?php 
    session_start();
    include("classes/format.php");
    $fm = new format();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>home</title>
      
    <!-- Custom styles for this template -->
      
    <link href="style/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style/custom.css" rel="stylesheet">

      
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  </head>
  <body>
      
      <?php 
        
        if(isset($_SESSION['uId'])){
            
            include("template/header.php");
            
            echo'<div class="myContainer">';
            
                include("template/catagorySection.php");
            
                echo'<div class="middleContent col">';
            
                    include("template/postBox.php");
            
                    if(isset($_POST['catSubmit']) && !empty($_POST['language'])){
                       
                          include("template/postByCatagory.php");   
                    }else if(isset($_POST['courseSubmit']) && !empty($_POST['language2'])){
                       
                          include("template/postByCourse.php"); 
                        
                    }else{
                          include("template/postSection.php");
                     }
            
                echo'</div>';//<!--end middleContent-->
          
            echo'</div>' ;//<!--end myContainer-->

          include("template/onlineSection.php");
        }else{
            header("location: index.php");
            exit();
        }
      ?>
      
    <script src="js/jquery-3.2.1.min.js"></script>  
    

    <script src="js/select.js"></script>

    <script src="js/myJs.js"></script> 
      
<script type="text/javascript">
            //online user update
        function dis(){
            xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","template/onlineUser.php",false);
            xmlhttp.send(null);
            document.getElementById("onlineUser").innerHTML=xmlhttp.responseText;
        }
        dis();

        setInterval(function(){
            dis();
        },2000 )
</script>
      
      
      
<script type="text/javascript">
    //online user update
function dis2(){
    xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","template/chatBody.php",false);
    xmlhttp.send(null);
    document.getElementById("chatBody").innerHTML=xmlhttp.responseText;
}
dis2();

setInterval(function(){
    dis2();
},2000 )
    
</script>
      
      
      
      
  </body>
</html>

