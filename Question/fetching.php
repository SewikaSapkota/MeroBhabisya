

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../signup/login.php");
    exit;
}


//fetch.php

$connect = new PDO('mysql:host=localhost;dbname=finalproject', 'root', '');

$query = "SELECT * FROM business1 ORDER BY business1_id ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $rating = count_rating($row['business1_id'], $connect);
 $color = '';
 $output .= '
 <h3 class="text-primary">'.$row['business_name'].'</h3>
 <ul class="list-inline" data-rating="'.$rating.'" title=" Rating - '.$rating.'">
 ';
 
 for($count=1; $count<=5; $count++)
 {
  if($count <= $rating)
  {
   $color = 'color:#ccc;';
  }
  else
  {
   /*$color = 'color:#ccc;';*/
  }
  $output .= '<li title="'.$count.'" id="'.$row['business1_id'].'-'.$count.'" data-index="'.$count.'"  data-business1_id="'.$row['business1_id'].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:46px; ">&#9733;</li>';
 } 

 $output .= '
 </ul>
 
 <hr />
 ';
}
echo $output;

function count_rating($business1_id, $connect)
{
 $output = 0;
$query = "SELECT (rating) as rating FROM rating WHERE business1_id = '".$business1_id."'";
$statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output = round($row["rating"]);
  }
 }
 return $output;
} 


?>
