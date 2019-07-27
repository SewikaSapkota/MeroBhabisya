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
  <h1 class="heading-title pull-left margin-top:10px; style="style="border-bottom-style:dotted;border-radius:400px;color: #f44336">Medical College in Nepal affiliated to TU </h1>
  <div class="breadcrumbs pull-right" style="border-bottom-style:groove;border-bottom-color:#EEEEEE; >
<ul class="breadcrumbs-list">
                            <a href="../homepage/index.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                            <a href="sciencecollege.php">Science</a>
                         

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
 

$sql = "SELECT * FROM college  where c_id < 16 ORDER BY c_id";
echo "<br>";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=1  style='text-align:left'>";
        echo "<tr style='background-color:#d32f2f;color:white;'>";
                echo "<th>Id</th>"; 
                echo "<th>CollegeName</th>";
                echo "<th> Address </th>";
                echo "<th>ProgramOffered</th>";
                echo "<th>Websites</th>";
                echo "</strong>";
            echo "</tr>";
           
            
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<strong>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                 echo "<td>" .'<a href="'.$row['Websites'].'"> '.$row['Websites'].' </a>'. "</td>";
                 echo "</tr>";
               
        }

        echo "</table>";
       
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