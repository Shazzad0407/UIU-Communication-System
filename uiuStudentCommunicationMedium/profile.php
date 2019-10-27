<?php 
    session_start();

    include("classes/format.php");
    $fm = new format();

    $loginId= $_SESSION['uId'];

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['fName']." ".$_SESSION['lName'];?></title>
      
      
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
        $myself=0;
        if(isset($_SESSION['uId'])){
            
            if(!isset($_GET['id'])){
                $userId= $loginId;
                $myself=1;
            }else if($id == $loginId){
                $userId= $loginId;
                $myself=1;
             }else{
                $userId= $id;
                $myself=2;
            }
            
            include("template/header.php");
            echo'<div class="myContainer">';
            
                include("template/profileLeftContent.php");
            
                echo'<div class="middleContent col">';
                    if($myself==1){
                        include("template/postBox.php");    
                    }
                    include("template/postSection.php");
                    include("template/postUpdateDelete.php");
                    
            
                echo'</div>';//<!--end middleContent-->
          
            echo'</div>' ;//<!--end container-->

            include("template/onlineSection.php");
            
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