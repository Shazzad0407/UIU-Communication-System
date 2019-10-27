<div class="regLast">
    <h1>Sign up</h1>
    <h3>Thank You <span><?php echo $fName." ".$lName;?></span>.
        </br>Your pic upload successfully. We will check it and send a verification key to your email in between 24 hours.
              <br/>Thanks to stay with us.</h3>
    <div class="happyPic">
       
    </div>
    <form class="backToLogin" method="post" action="http://localhost/uiuStudentCommunicationMedium/">
        <button class='btn btn-default' type='submit' value='login' name="back" onclick="window.location.reload()">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>Want to login??
        </button>
    </form>
    
    <?php
        if(isset($_POST['back'])){
            session_destroy();
        }
    ?>
     
    
     
      
</div>



<!-- //echo $fName." ".$lName;?>-->


