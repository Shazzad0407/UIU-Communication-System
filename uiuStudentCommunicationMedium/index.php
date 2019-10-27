
<?php 
                    include("template/loginInsert.php"); 
                ?>
<!DOCTYPE html>
<html>
	<header>
		<title>login</title>
		<link rel="stylesheet" href="style/reset.css" media="all"/>
        <link rel="stylesheet" href="style/style.css" media="all"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("select").change(function(){
					if ($(this).val()=="") $(this).css({color: "#aaa"});
					else $(this).css({color: "#7F462C"});
				});
			}); 
		</script>
                 

                
        <meta charset="utf-8">
	</header>
	<body>
            
               <div class="logoBG"></div>
               <div class="logo"><span>UIU WEB CAMPUS</span></div>
               <div id="errormsg"></div>
                <?php
                    include("template/registration.php");
		            include("template/loginForm.php");
                ?>					
	</body>
</html>

