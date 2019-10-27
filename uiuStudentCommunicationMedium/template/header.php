<?php
    include("includes/connection.php");
     $propic = $_SESSION['proPic'] ;
    //for logout
    if(isset($_GET['logout'])){
         $activeId=$_SESSION['uId'];
         $active= "UPDATE student
                   SET active=0 
                   WHERE studentId ='$activeId'";
        $runActiveQuery = mysqli_query($con,$active);
        if($runActiveQuery)
        {
            session_destroy();
            header('location: index.php');
        }
        
    }
    
?>
      <header>
          <div class="logo">
              <h1><a href="home.php">UIU WEB CAMPUS</a></h1>
          </div><!--end logo-->
          
          <div class="nav1">
              <ul>
                  <?php if(basename($_SERVER['PHP_SELF']) == 'home.php'){
                            echo'<li><a href="home.php" class="active">home</a></li>';
                        }else echo'<li><a href="home.php">home</a></li>';
                  ?>
                  <?php if(basename($_SERVER['PHP_SELF']) == 'profile.php'){
                            echo'<li><a href="profile.php" class="active">profile</a></li>';
                        }else echo'<li><a href="profile.php">profile</a></li>';
                  ?>
                  <?php if(basename($_SERVER['PHP_SELF']) == 'library.php'){
                            echo'<li><a href="library.php?cat=1" class="active">library</a></li>';
                        }else echo'<li><a href="library.php?cat=1">library</a></li>';
                  ?>
              </ul>
          </div><!--end nav1-->
          
          <div class="nav2">
              <ul>
                  <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i></a></li>
              </ul>
              <div class="dropdown">
                  <button onclick="dropDown()" class="dropbtn" style="background:url(<?php echo $propic; ?>);    background-size: 45px 45px;"></button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="setting.php?cat=1">setting</a>
                    <a href="home.php?logout=1">Logout</a>
                  </div>
              </div><!--end dropdown-->
          </div><!--end nav2-->
          <div class="search">
              <form method="" action="">
                  <input type="text" name="search" placeholder="search"/>
                  <button type="submit" class="searchBtn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
              </form>
          </div><!--end search-->   
      </header><!--end header-->

