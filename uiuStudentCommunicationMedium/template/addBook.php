<div class="addBook content">
            <h2>Add A book</h2>
    <div id="msg"></div>
            <form method="post" action="">
                <ul>
                    <li><h5>Book name: </h5><input type="text" name="bname" placeholder="book name" value=""/></li>
                    <li>
                        <h5>department: </h5>
                        <select id="deptName edition" name="edition" value="">
                            <option disable hidden value="">Book Edition</option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                            <option>5th</option>
                            <option>6th</option>
                            <option>7th</option>
                            <option>8th</option>
                            <option>9th</option>
                            <option>10th</option>
                        </select >
                    </li>
                    <li><h5>Writer name: </h5><input type="text" name="Wname" placeholder="writer name" value=""/></li>
                    <li>
                        <h5>Select related Course: </h5>
                        <span class="btn-group btnJora">      
                            <a href="#" class="btn btn-primary catBtn1">Tag Catagories</a>
                            <a href="#" class="btn btn-primary dropdown-toggle catBtn2" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                                <?php
                                        include("includes/connection.php");
                                        $cat= "SELECT distinct courseName
                                                FROM course";
                                        $runCatQuery = mysqli_query($con,$cat);
                                        while($row = mysqli_fetch_array($runCatQuery)){

                                            $catName= $row['courseName']; 
                                            echo "<li><p><input type='checkbox' value='$catName' style='margin-right: 10px;' name='class[]'>$catName</p></li>";
                                        }
                                ?>
                            </ul>
                        </span>
                    </li>
                    <li><input type="file" name="pdf"></li>
                    <li><input type="submit" name="update" value="Add Book"/></li>
                    
            
                </ul>
            </form>
        </div><!--end of genInfo-->
        