<?php

//connecting to the database
$dsn = 'mysql:host=localhost;dbname=finalproject';
	$userName = 'root';
	$password = 'sanustha@789';
	$conn=mysqli_connect("localhost","root","","finalproject");
// Check connection
if (mysqli_connect_errno())
  {
  echo "There was a problem connecting to Database. ";
  }

	try{
		$db = new PDO($dsn, $userName, $password);
	} catch(PDOExecption $e){
		$error_message = $e->getMessage();
		echo "<p>There was an error while connecting to the database. Please Try Again : $error_message </p>";
	}
	
	?>
