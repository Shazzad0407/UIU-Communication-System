<div class="postBox gradientBoxesWithOuterShadows">
  <h1><i class="fa fa-pencil" aria-hidden="true"></i>need help? any question? know that everyone.</h1>
  <form method="post" action="" enctype="multipart/form-data">
        <textarea id="textarea" class="gradientBoxesWithOuterShadows" placeholder="Write Your Questions......" name="postText" value=""></textarea>

        <div id="postPicShow"> 
        </div>
        <div class="postBoxButtons">
            <div id="forPostPic">
                <input type="file" id="toHide1" name="postImage[]" accept="image/*"/ multiple="true">
                <button type="submit" class="addPic">
                    <i class="fa fa-picture-o" aria-hidden="true"></i><span>add image</span>
                </button>
            </div>

            <div class="selectBG">

                 <select id="abb" class="course" name="courseName">
                      <option disable hidden value="">tag a course</option>
                      <?php
                            include("includes/connection.php");
                                 $courseName = "SELECT distinct courseName
                                                FROM course";
                                $runCQuery = mysqli_query($con,$courseName);
                                while($row = mysqli_fetch_array($runCQuery)){
                                    $cname = $row['courseName'];
                                    echo "<option>$cname</option>";
                                }

                      ?>

                 </select>
              </div>

              <div class="btn-group btnJora">      
                    <a href="#" class="btn btn-primary catBtn1">Tag Catagories</a>
                    <a href="#" class="btn btn-primary dropdown-toggle catBtn2" data-toggle="dropdown"><span class="caret"></span></a>
                    <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                        <?php
                                include("includes/connection.php");
                                $cat= "SELECT catagoryName
                                       FROM catagory
                                       ORDER BY catagoryName";
                                $runCatQuery = mysqli_query($con,$cat);
                                while($row = mysqli_fetch_array($runCatQuery)){

                                    $catName= $row['catagoryName']; 
                                    echo "<li><p><input type='checkbox' value='$catName' style='margin-right: 10px;' name='class[]'>$catName</p></li>";
                                }
                        ?>
                    </ul>
                </div>

              <input id="btnget" type="submit" name="postSubmit" value="post">

        </div><!--end of postBoxButton -->
  </form>
    
 <?php include("template/postBoxInsert.php");?>
</div><!--end postBox-->
