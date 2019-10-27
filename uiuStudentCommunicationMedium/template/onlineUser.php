<?php
    session_start();
	 include("../includes/connection.php");
    $loginId = $_SESSION['uId'];
    $activeUserQuery= "SELECT studentId,firstName,lastName,profilePic
                      FROM student WHERE (active=1 && (studentId<>$loginId))";

	$onlineUser = mysqli_query($con,$activeUserQuery);
	while($row= mysqli_fetch_array($onlineUser)){
		$activeId= $row['studentId'];
        $activeFname= $row['firstName'];
        $activeLname= $row['lastName'];
        $activePro= $row['profilePic'];
        echo"<ul>";
            echo"<li><a href='?aid=$activeId' onclick='show('chatBox')'><img src='$activePro' width='30px' height='30px'> <h6>$activeFname $activeLname</h6><span><i class='fa fa-circle' aria-hidden='true'></i></span></a></li>";  
        echo"</ul>";
	}
	
?>
