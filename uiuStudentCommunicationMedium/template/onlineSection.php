<?php
    include("includes/connection.php");
$cid='0';
    if(!empty($_GET['aid'])){
        $cid= $_GET['aid'];
        $_SESSION['rId']=$cid;
        $clickUserQuery= "SELECT firstName,lastName,profilePic
                            FROM student WHERE studentId=$cid";
        
        $clickUser = mysqli_query($con,$clickUserQuery);
	    while($row= mysqli_fetch_array($clickUser)){
            $cFname= $row['firstName'];
            $cLname= $row['lastName'];
            $pro =$row['profilePic'];
        }
        $_SESSION['pro']=$pro;

    }
    
?>

<div class="onlineSection">
  <div id="onlineUser">
      
  </div><!--end online User-->
  <form method="" action="">
      <input class="s1" type="text" name="searchF" placeholder="search.."/>
  </form>


<!--chatBox design--->
    
    <div id="chatBox" >
        <div id="chatBoxHeader">
            <?php echo"<a href='profile.php?id=$cid'><h6>$cFname $cLname</h6></a>";?>
            <a href="#" onclick="hide('chatBox')"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div><!--end of chatBoxHeader-->
        <div id="chatBody">
        </div><!--end of chatbody-->
        <div id="chatType">
            <form method="post" action="" autocomplete="off">
                <input class="submit_on_enter" type="text" name="q" placeholder="write message...">
            </form>
        </div><!--end of chatTyping-->
    </div><!--end of chat Box-->    
</div><!--end onineStd-->

    <?php
        //msg value enter to database
        $loginId = $_SESSION['uId'];
        if(!empty($_POST['q'])){
            $msg = $_POST['q'];
            $mq="INSERT INTO message
                (messageDescription, time, senderStudentId, receiverStudentId) VALUES ('$msg',NOW(),'$loginId','$cid')";
	        $msgSent = mysqli_query($con,$mq);
            
        }
    
    ?>



<script type="text/javascript">

    
     var cid = "<?php echo $cid; ?>";
    if(cid=='0'){
        $('#chatBox').hide();
    }
    
    
    function hide(target) {
    //document.getElementById(target).style.display = 'none';
        $('#chatBox').hide();

}
    
    function show(target) {
    //document.getElementById(target).style.display = 'block';
        $('#chatBox').show();
}

</script>



<script type="text/javascript">
$(document).ready(function() {

  $('.submit_on_enter').keydown(function(event) {
    // enter has keyCode = 13, change it if you want to use another button
    if (event.keyCode == 13) {
      this.form.submit();
      return false;
        
    }
  });

});
</script>