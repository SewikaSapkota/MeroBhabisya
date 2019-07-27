<?PHP
include_once("../includes/header.php");

include ("../includes/connect.php");
?>
<?php
// Include config file
//require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mero Bhabisya</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"  href="../css/style.css">

<script type="text/javascript">
    
  function la(src)
  {
    window.location=src;
  }

  
</script> 

</head>
<body style="overflow-x:hidden;overflow-y: scroll;">
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
                      </ul>
                    </ul>
                  </div>
                </nav>
  <br>
  <br>
  <div>
<div class="row">
  <div class="col-md-6">
<div class="card card1">
  
<div class="slider">
  <div id="slider1" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
    <li data-target="#slider1" data-slide-to="0" class="active"></li>
    <li data-target="#slider1" data-slide-to="1"></li>
    <li data-target="#slider1" data-slide-to="2"></li>
  </ul>
 <div class="carousel-inner">
  <div class="item active">
    <img src="../image/5.jpg" alter="image">
  </div>
  
  <div class="item">
    <img src="../image/4.jpg" alter="image">
  </div>
<div class="item">
    <img src="../image/1.jpg" alter="image">
  </div>
  <a class=" left carousel-control" href="#slider1" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span> 
  </a>
  <a class="right carousel-control" href="#slider1" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span> 
  </a>
</div>
</div>
</div>
</div>
</div>


<div class=" col1 col-md-6">
  <div class="card card2">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required onkeypress="return (event.charCode > 64 && 
  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>     
</div>
</div>
</div>


<br>
<br>
<br>


<?PHP
include_once("../includes/footer.php");

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</div>
</html>