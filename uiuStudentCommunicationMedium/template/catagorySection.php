<div class="leftContent col">
              <div class="catagories gradientBoxesWithOuterShadows">
                  <h1>view post by catagorie</h1>
                  <form method="post" action="">
                      
                      
                      <?php
                                include("includes/connection.php");
                                $cat= "SELECT catagoryName
                                       FROM catagory
                                       ORDER BY catagoryName";
                                $runCatQuery = mysqli_query($con,$cat);
                                $count=1;
                                $n='f';
                                while($row = mysqli_fetch_array($runCatQuery)){
                                    
                                    $catName= $row['catagoryName'];                                   
                                    $name =$n.$count;
                                    echo "<input type='checkbox' id='<?=$name?>' name='language[]' value='$catName' class='check'>";
                                    echo "<label for='<?=$name?>'>$catName</label>";
                                    $count++;
                                }
                        ?>
                      
                    
                      <input type="submit" name="catSubmit" value="submit" />
                  </form>
              </div><!-- end catagories-->
              
              <div class="catByCourses gradientBoxesWithOuterShadows">
                  <h1>specific course related post</h1>
                  <form method="post" action="">
                      <?php
                        include("includes/connection.php");
                        $noOfDept= "SELECT deptName
                                    FROM department
                                    ORDER BY deptName";
                        $run = mysqli_query($con,$noOfDept);
                        while($row = mysqli_fetch_array($run)){
                            
                            $deptName= $row['deptName'];
                            $count=1;
                            $n=$deptName;
                            echo "<button class='hideShowDept' >";
                            echo    "<span>Course of $deptName department</span>"; 
                            echo "</button>";
                            
                            echo "<div class='cseDept'>";
                                        //find out the couses under this department
                                        $courseName = "SELECT courseId,courseName
                                                       FROM course
                                                       WHERE deptName = '$deptName' ";

                                        $run2 = mysqli_query($con,$courseName);
                                        while($row2 = mysqli_fetch_array($run2)){
                                            
                                            $courseName= $row2['courseName'];
                                            $courseId= $row2['courseId'];
                                            $name =$n.$count;
                                            
                                            echo"<input type='checkbox' id='<?=$name?>' name='language2[]' value='$courseId' class='check'> ";
                                            echo"<label for='<?=$name?>'><span class='checkName'>$courseName ($courseId)</span></label>";
                                            $count++;
                                        }
                                
                            echo "</div>";
                            
                            
                        }
                      ?>
                      
                      <input type="submit" name="courseSubmit" value="submit"/>
                  </form>
              </div><!-- enf catagories-->
              
          </div><!--end left content-->
