<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
 $email="";
 session_start();
	if (isset($_SESSION["email"])) {
		$email=$_SESSION["email"];
	}
$data = json_decode(file_get_contents("php://input"));
$resmp=$connection->selectTable("SELECT * from membersdata where email='".$email."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	$output[] = $featrow;
	print json_encode($output);
}
else{
	echo "failed";
}


?>