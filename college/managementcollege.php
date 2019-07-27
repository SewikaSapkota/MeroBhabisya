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
	
	
<br>
<div class="content container">
<div class="page-wapper">
<header class="page-heading clearfix" style="border-radius:400px;padding-bottom: 10px;">
  <h1 class="heading-title pull-left margin-top:10px; style="style="border-bottom-style:dotted;border-radius:400px;color: #f44336">Management College in Nepal affiliated to TU </h1>
  <div class="breadcrumbs pull-right" style="border-bottom-style:groove;border-bottom-color:#EEEEEE; >
<ul class="breadcrumbs-list">
                            <a href="../homepage/index.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                            <a href="managementcollege.php">Management</a>

                          </li>
                        </ul>
</div>
</header>


<p style="text-align: left;">In the current academic session (2014-2019), there are many affiliated colleges under Tribhuvan University. So we have listed  degree and colleges of Bachelors level offered by TU in Nepal.<p>
<br>


  <p style="text-align: left; color: #5C6BC0;"><strong>Following are the top list medical colleges affiliated to TU</strong></p>
  
  
  
<?php

$link = mysqli_connect("localhost", "root", "sanustha@789", "finalproject");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "SELECT * FROM college where c_id BETWEEN 16 AND 65 ORDER BY c_id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=1 style='text-align:left;' >";
             echo "<tr style='background-color:#d32f2f;color:white;'>";
                echo "<th>College_id</th>"; 
                echo "<th>College_name</th>";
                echo "<th>address </th>";
                echo "<th>Level</th>";
                 echo "<th>Websites</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                 echo "<td>" .'<a href="'.$row['Websites'].'"> '.$row['Websites'].' </a>'. "</td>";
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
 echo "<br>";
// Close connection
mysqli_close($link);
?>
</div>
</div>
<?PHP
include_once("../includes/footer.php");

?>

</body>
</html>