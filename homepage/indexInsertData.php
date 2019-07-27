

<?php
include ("../includes/connect.php");
$n=$_GET['Name'];
$f=$_GET['faculty'];
$query = "INSERT INTO user (user,faculty) VALUES('$n','$f')";
$data = mysqli_query($conn, $query);
		
switch ($f){
	case "1":
		echo "<script>location.href='../Question/managementratefront.php'</script>";
		break;
	case "2":
		echo "<script>location.href='../Question/sciencerate.front.php'</script>";
		break;

	

	case "3":
		echo "<script>location.href='../Question/humanitiesrate_front.php'</script>";
		break;

}
?>
