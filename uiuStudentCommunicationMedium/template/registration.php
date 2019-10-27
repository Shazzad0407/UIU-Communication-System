<div id="login-box">
	<div class="left">
            <h1>Sign up</h1>
            <form action="" method="post">
                <input id="fName" type="text" name="fName" placeholder="First Name" required="required" value=''/>
                <input id="lName" type="text" name="lName" placeholder="Last Name" required="required" value='' />
                <input id="uiuId" type="text" name="uiuId" placeholder="UIU ID" required="required" value=''/>
                <input id="email" type="email" name="email" placeholder="E-mail" required="required" value=''/>
                <input id="pass" type="password" name="password" placeholder="Password" required="required" value=''/>
                <input id="pass2" type="password" name="password2" placeholder="Retype password" required="required" value=''/>
                <select id="deptName" name="deptName" required="required" value=''>
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
                <input id="bDate" type="text" name="bDate" placeholder="Birth Date" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required="required" value=''>
                <span class="male"><input type="radio" name="gender" value="male" required="true"> Male</span>
                <span class="female"><input type="radio" name="gender" value="female" required="true"> Female</span>
                <input type="submit" name="signup_submit" value="sign me up" >

            </form>
            <?php 
               include("regInsert.php");
            ?>
	</div>
        <?php 
		  include("registration2.php");
	    ?>
                        