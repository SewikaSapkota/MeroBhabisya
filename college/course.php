<?PHP
include_once("../includes/header.php");
include_once("../includes/navigation.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mero Bhabisya</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
  
  

<div class="content container" style="margin-top: 20px;">
<div class="page-wapper">
<header class="page-heading clearfix" style="border-radius:400px;padding-bottom: 10px;">
  <h1 class="heading-title pull-left margin-top:10px; style="style="border-bottom-style:dotted;border-radius:400px;color: #f44336"> Courses for bachelors level in Nepal affiliated to TU </h1>
  <div class="breadcrumbs pull-right" style="border-bottom-style:groove;border-bottom-color:#EEEEEE; >
<ul class="breadcrumbs-list">
                            <a href="../homepage/index.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                    <a href="course.php">Courses in Nepal.</a>
                         

                          </li>
                        </ul>
</div>
</header>



<p style="text-align: left;">Here is a list of popular courses for bachelor level in Nepal run by/ affiliated to Tribhuvan Universities. There are various bachelor courses in Nepal which are conducted by TU. And we have gathered the list of bachelor level courses offered by Tribhuvan Unversities.</p>
<br>

  <p style="text-align: left; color: #5C6BC0;"><strong>List of popular courses for bachelors level in Nepal affiliated to TU</strong></p>
  

	
	
       
<br>


  
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "sanustha@789", "finalproject");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM courseinfo";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=1 style='text-align:left'>";
        echo "<tr style='background-color:#d32f2f;color:white;'>";
                echo "<th>Science</th>"; 
                echo "<th>Management</th>";
                echo "<th> Humanities </th>";
               
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                
                echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</div>
</div>
<br>
<br>

<?PHP
include_once("../includes/footer.php");

?>

</body>
</html>