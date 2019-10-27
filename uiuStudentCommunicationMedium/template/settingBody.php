<div class="settingContainer">
    <div class="settingCatagory">
        <ul>
            <?php 
                if($_GET['cat']==1){echo'<li><a href="setting.php?cat=1" class="active">General Information</a></li>';}
                else {echo'<li><a href="setting.php?cat=1">General Information</a></li>';}
            
                if($_GET['cat']==2){echo'<li><a href="setting.php?cat=2" class="active">Security</a></li>';}
                    else {echo'<li><a href="setting.php?cat=2">Security</a></li>';}

                if($_GET['cat']==3){echo'<li><a href="setting.php?cat=3" class="active">On Going Course</a></li>';}
                    else {echo'<li><a href="setting.php?cat=3">On Going Course</a></li>';}

                if($_GET['cat']==4){echo'<li><a href="setting.php?cat=4" class="active">Complited Course</a></li>';}
                    else {echo'<li><a href="setting.php?cat=4">Complited Course</a></li>';}
            ?>
            
        </ul>
    </div><!--end of setting catagorie-->

    <div class="settingContent">
    <?php 
        if($_GET['cat'] == 1){
            include('settingGeneralInfo.php');}
        else if($_GET['cat'] == 2){
            include('settingSecurity.php');
        }else if($_GET['cat'] == 3){
            include('settingOnGoingCourse.php');
        }else if($_GET['cat'] == 4){
            include('settingCompletedCourse.php');
        }
            
        
        ?>
        
        
        <div class="completedCourse"></div><!--end of completed course-->
    </div><!--end of setting content-->
    
</div><!--end of seting container-->




