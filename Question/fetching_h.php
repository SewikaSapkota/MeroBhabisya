<?php

//fetch.php

$connect = new PDO('mysql:host=localhost;dbname=finalproject', 'root', 'sanustha@789');

$query = "SELECT * FROM question where question_id BETWEEN 46 AND 63 ORDER BY question_id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $rating = count_rating($row['question_id'], $connect);
 $color = '';
 $output .= '
 <h3 class="text-primary">'.$row['question'].'</h3>
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
  $output .= '<li title="'.$count.'" id="'.$row['question_id'].'-'.$count.'" data-index="'.$count.'"  data-question_id="'.$row['question_id'].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:46px; ">&#9733;</li>';
 } 

 $output .= '
 </ul>
 
 <hr />
 ';
}
echo $output;

function count_rating($question_id, $connect)
{
 $output = 0;
$query = "SELECT (rating) as rating FROM rating WHERE question_id = '".$question_id."'";
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
