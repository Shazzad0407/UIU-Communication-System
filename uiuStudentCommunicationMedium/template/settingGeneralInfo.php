<div class="genInfo content">
            <h2>update your information</h2>
    <div id="msg"></div>
            <form method="post" action="">
                <ul>
                    <li><h5>first name: </h5><input type="text" name="fname" placeholder="first name" value="<?php echo $_SESSION["fName"] ;?>"/></li>
                    <li><h5>last name: </h5><input type="text" name="lname" placeholder="last name" value="<?php echo $_SESSION["lName"] ;?>"/></li>
                    <li><h5>birth date: </h5><input id="bDate" type="text" name="bDate" placeholder="Birth Date" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"  value="<?php echo $_SESSION["bDate"] ;?>"></li>
                    <li>
                        <h5>department: </h5>
                        <select id="deptName" name="deptName" value="<?php echo $_SESSION['deptName'] ;?>">
                        <option disable hidden value="">Department</option>
                        <?php
                                include("includes/connection.php");
                                $deptQuery= "SELECT deptName
                                                         FROM department";
                                $runDeptQuery = mysqli_query($con,$deptQuery);
                                while($row = mysqli_fetch_array($runDeptQuery)){
                                                $dName= $row['deptName'];
                                                echo "<option>$dName</option>";
                                }

                        ?>

                        </select >
                
                
                    </li>
                    <li>
                        <h5>gender: </h5>
                        <span class="male"><input type="radio" name="gender" value="male"> Male</span>
                        <span class="female"><input type="radio" name="gender" value="female"> Female</span>
                    </li>
                    <li><input type="submit" name="update" value="update informaion"/></li>
                </ul>
            </form>
        </div><!--end of genInfo-->
        

    <!--//update the informaiton into database -->

<?php
    if(isset($_POST['update'])){
        //checking validation
        $loginId= $_SESSION['uId'];
        //first name update
        
        if(!empty($_POST['fname'])){
            $fname =$_POST['fname'];
            $updateFname =mysqli_query($con,"UPDATE student SET firstName='$fname' WHERE studentId='$loginId'");
            if($updateFname){
                $_SESSION['fName'] = $fname;
                echo "<script> document.getElementById('msg').innerHTML='<h5>update success!</h5>';</script>";
            }else echo "<script> document.getElementById('msg').innerHTML='<h4>update Failed!</h4>';</script>";
                
        }
        //last name Update
        
        if(!empty($_POST['lname'])){
            $lname =$_POST['lname'];
            $updateLname =mysqli_query($con,"UPDATE student SET lastName='$lname' WHERE studentId='$loginId'");
            if($updateLname){
                $_SESSION['lName'] = $lname;
                echo "<script> document.getElementById('msg').innerHTML='<h5>update success!</h5>';</script>";
            }else echo "<script> document.getElementById('msg').innerHTML='<h4>update Failed!</h4>';</script>";
                
        }
        //Birth Date Update
        
        if(!empty($_POST['bDate'])){
            $bDate =$_POST['bDate'];
            $updatebDate=mysqli_query($con,"UPDATE student SET birthDate='$bDate' WHERE studentId='$loginId'");
            if($updatebDate){
                $_SESSION['bDate'] = $bDate;
                echo "<script> document.getElementById('msg').innerHTML='<h5>update success!</h5>';</script>";
            }else echo "<script> document.getElementById('msg').innerHTML='<h4>update Failed!</h4>';</script>";
                
        }
        
        //department name Update
        
        if(!empty($_POST['deptName'])){
            $deptName =$_POST['deptName'];
            $updateDeptName=mysqli_query($con,"UPDATE student SET deptName='$deptName' WHERE studentId='$loginId'");
            if($updateDeptName){
                $_SESSION['deptName'] = $deptName;
                echo "<script> document.getElementById('msg').innerHTML='<h5>update success!</h5>';</script>";
            }else echo "<script> document.getElementById('msg').innerHTML='<h4>update Failed!</h4>';</script>";
                
        }
        
        //Gender Update
        
        if(!empty($_POST['gender'])){
            $gender =$_POST['gender'];
            $updateGender=mysqli_query($con,"UPDATE student SET gender='$gender' WHERE studentId='$loginId'");
            if($updateGender){
                $_SESSION['gender'] = $gender;
                echo "<script> document.getElementById('msg').innerHTML='<h5>update success!</h5>';</script>";
            }else echo "<script> document.getElementById('msg').innerHTML='<h4>update Failed!</h4>';</script>";
                
        }
        
        
        
    }
?>