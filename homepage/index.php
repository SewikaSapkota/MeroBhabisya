<?PHP
include_once("../includes/header.php");
include_once("../includes/navigation.php");
include ("../includes/connect.php");
?>
<?php
// Initialize the session
//session_start();

//Checking who is logged in and user ID of the user
//echo "Hi" . $_SESSION["username"];
//echo "UID" . $_SESSION["id"];

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../signup/login.php");
    exit;
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
    <center><h1 style="margin-top: 35px; margin-bottom: 20px;">Your basic information</h1>
        <form id="myform" method="GET" action = "indexInsertData.php" name="myform">
        <label>User Name :</label> 
            <input value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" class="name" name="Name" type="text"required onkeypress="return (event.charCode > 64 && 
  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" readonly="readonly"> 

            <br><br><label>Your Faculty</label>
            <select name="faculty" required>
            <option selected hidden value="" >--- Select Your Faculty ---</option>
            <option value="1">Management</option>
            <option value="2">Science</option>
            <option value="3">Humanities and Education</option>
            </select>
            <br><br><input class="submit" id="submit"  type="submit" value="Submit">
                    
        </select>
        <span class="arrow"></span>
       
          
        </form>


        
      </center>   
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