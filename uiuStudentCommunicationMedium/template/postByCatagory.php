
<?php

include("includes/connection.php");

$catG = array();
$count=0;
foreach($_POST['language'] as $cat){
    $catG[] = $cat;
    $count++;
}
// finding which which catagory selected
    $q ="WHERE";
    //$i=0;
    for($i=0; $i<$count-1; $i++){
        $p= " catagoryName = '$catG[$i]' OR";
        $q = $q.$p;
    }
    $p= " catagoryName = '$catG[$i]'";
    $q = $q.$p;
//make the query
$sq= "SELECT*
      FROM (SELECT *
            FROM (SELECT*
                  FROM (SELECT * 
                        FROM catagory
                        $q) AS c NATURAL JOIN postcatagory) AS cp NATURAL JOIN post) as cps NATURAL JOIN student
      GROUP BY postId
      ORDER BY postTime DESC";

$runSq = mysqli_query($con,$sq);
while($row = mysqli_fetch_array($runSq)){

    $postId= $row['postId'];
    $postBody= $row['description'];
    $postTime= $fm->formatDate($row['postTime']);
    $fName= $row['firstName'];
    $lName= $row['lastName'];
    $proPic= $row['profilePic'];
    $courseId= $row['courseId'];
    $stdId = $row['studentId'];
    
    
    //picture of a post 
    $picQuery = "SELECT* 
                FROM post_picture 
                where '$postId'=postId";
    $runPicQuery = mysqli_query($con,$picQuery);

    echo'<div class="post1 gradientBoxesWithOuterShadows">';
        echo"<div class='postBody'>";
    
            echo"<a href='profile.php?id=$stdId' class='pIcon' style='background:url($proPic);background-size: 45px 45px;'></a>";
            echo"<a href='profile.php?id=$stdId'><h3>$fName $lName</h3></a>";
            echo"<span class='postTime'>$postTime</span>";
            echo"  <p>$postBody</p>";

            echo"<div class='postImageSection'>";
                echo"<ul>";
                    while($rowPic =mysqli_fetch_array($runPicQuery)){
                        $postPic=$rowPic['picture'];
                        echo "<li> <img class='my_image' src='$postPic'/> </li>";
                    }
                echo"</ul>";

             echo"</div><!--end postImageSection-->";
         echo"</div>  <!--end postBody-->";

         include("commentSection.php");    

    echo"</div><!--end post1-->";                        

    
}


?>
            
           
        