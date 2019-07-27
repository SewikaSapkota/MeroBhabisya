<?php

// Initialize the session
session_start();
//retrieve  $uID

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../signup/login.php");
    exit;
}

//fetch.php

$connect = new PDO('mysql:host=localhost;dbname=finalproject', 'root', '');


  
if(isset($_POST["index"], $_POST["business1_id"]))
{


//Need to check the condition if there is already a rating submitted for particular 
//business1id by a particular userID 
$query = 'SELECT (rating) from rating WHERE User_Id=:users AND business1_id=:quesID;';
$statement = $connect->prepare($query);
$statement->bindValue(':users', $_SESSION["id"]);
$statement->bindValue(':quesID', $_POST["business1_id"]);
$statement->execute();
$result=$statement->fetch();
$statement->closeCursor();
$file_open = fopen("data.csv", "a");
$form_data = array(
   'u_id'  =>$_SESSION["id"],
   'q_id'  => $_POST["business1_id"],
   'ratings'  => $_POST["index"],
   
  );
fputcsv($file_open, $form_data);

//if yes update the rating 
if ($result!=""){




//fIRST DELETE THE EXISTING RECORD

$query = 'DELETE from rating WHERE User_Id=:users AND business1_id=:quesID;';
$statement = $connect->prepare($query);
$statement->bindValue(':users', $_SESSION["id"]);
$statement->bindValue(':quesID', $_POST["business1_id"]);
$statement->execute();
$result=$statement->fetch();
$statement->closeCursor();

//tHEN INSERT THE NEW RECORD
 $query = "
 INSERT INTO rating(User_Id, business1_id, rating) 
 VALUES (:usersid, :business1_id, :rating)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
  	':usersid' =>	$_SESSION["id"],
   ':business1_id'  => $_POST["business1_id"],
   ':rating'   => $_POST["index"]
  )
 );
 $result = $statement->fetchAll();

 if(isset($result))
 {
  echo 'done';
 }

}

//CHANGE UPTO HERE


//else insert the data 
else{


 $query = "
 INSERT INTO rating(User_Id, business1_id, rating) 
 VALUES (:usersid, :business1_id, :rating)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
  	':usersid' =>	$_SESSION["id"],
   ':business1_id'  => $_POST["business1_id"],
   ':rating'   => $_POST["index"]
  )
 );
 $result = $statement->fetchAll();

 if(isset($result))
 {
  echo 'done';
 }


} //else close





}
?>
