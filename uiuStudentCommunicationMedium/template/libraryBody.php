<div class="settingContainer">
    <div class="settingCatagory">
        <ul>
            <?php 
                if($_GET['cat']==1){echo'<li><a href="library.php?cat=1" class="active">Suggested Books For you</a></li>';}
                else {echo'<li><a href="library.php?cat=1">Suggested Books For you</a></li>';}
            
                if($_GET['cat']==2){echo'<li><a href="library.php?cat=2" class="active">Add Books to the library</a></li>';}
                    else {echo'<li><a href="library.php?cat=2">Add Books to the library</a></li>';}

                if($_GET['cat']==3){echo'<li><a href="library.php?cat=3" class="active">Add Solutions</a></li>';}
                    else {echo'<li><a href="library.php?cat=3">Add Solutions</a></li>';}

                if($_GET['cat']==4){echo'<li><a href="library.php?cat=4" class="active">All Books</a></li>';}
                    else {echo'<li><a href="library.php?cat=4">All BOOKs</a></li>';}
            ?>
            
        </ul>
    </div><!--end of setting catagorie-->

    <div class="settingContent">
    <?php 
        if($_GET['cat'] == 1){
            include('suggestedBook.php');}
        else if($_GET['cat'] == 2){
            include('addBook.php');
        }else if($_GET['cat'] == 3){
            include('addSolution.php');
        }else if($_GET['cat'] == 4){
            include('allBook.php');
        }
            
        
        ?>
        
        
        <div class="completedCourse"></div><!--end of completed course-->
    </div><!--end of setting content-->
    
</div><!--end of seting container-->




