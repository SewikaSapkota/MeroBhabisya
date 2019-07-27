<html>
<body>
<nav class="main-nav " role="navigation">

            <div class="container">
  <botton type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
    <span class="icon-bar"></span>
      <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </botton>
    <ul class="nav navbar-nav" id="navbar">
 <ul class="nav navbar-nav">
        <li class="active"><a href="../homepage/index.php">HOME</a></li>
        <li><a href="../about/about.php">ABOUT US</a></li>
        <li><a href="../college/course.php">COURSES IN NEPAL</a></li>

       <li  class="nav-item dropdown">
 <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href=""> COLLEGES IN NEPAL <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            <li><a href="../college/sciencecollege.php">Science</a></li>
                            <li><a href="../college/managementcollege.php">Management</a></li>
                            <li><a href="../college/humanitiescollege.php">Humanities</a></li>
                               
                                                                
                            </ul>
                        </li>


  <li><span>
   <?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
 // echo "| | ";
  //echo " Hi, ";
 // echo " |";
  //  echo "<a href='../signup/logout.php'> LOGOUT</a>";
  echo " <a href='../signup/logout.php'>"?></span>LOGOUT<span><?php echo "</a>";
  }
  
  
else
{ echo " ";
 
}
?> </span>
</li>                                 
</ul>
          </div>
        </nav>
      </ul>
    </div>
  </nav>
</body>
</html>
