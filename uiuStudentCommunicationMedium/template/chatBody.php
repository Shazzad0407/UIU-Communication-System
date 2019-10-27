<?php
    session_start();
    include("../classes/format.php");
    $fm = new format();
	 include("../includes/connection.php");
    $loginId = $_SESSION['uId'];
    
    if(!empty($_SESSION['rId'])){
        $receiverId= $_SESSION['rId'];
        $pro = $_SESSION['pro'];
        
        $showChat= "SELECT * 
                FROM message
                WHERE (senderStudentId='$loginId' OR senderStudentId='$receiverId') AND (receiverStudentId='$loginId' OR receiverStudentId='$receiverId')
                ORDER BY time DESC";

	$messages = mysqli_query($con,$showChat);
	while($row= mysqli_fetch_array($messages)){
		$msg= $row['messageDescription'];
        $msgImg= $row['image'];
        $time= $fm->ft($row['time']);
        $sender= $row['senderStudentId'];
        $receiever= $row['receiverStudentId'];
        
        echo"<ul>";
            if($sender==$loginId){
                echo"<li class ='chatList'><h6 class='me'>$msg</h6></li>";
                echo"<l1 class='m1'>$time</li>";
            }
            else{
                 echo"<li  class ='chatList'><img class='pro' src='$pro' width='30px' height='30px'><h6 class='she'>$msg</h6></li>"; 
                 echo"<l1 class='m2'>$time</li>";
                
            }
        echo"</ul>";
	}
}

    
	
?>
