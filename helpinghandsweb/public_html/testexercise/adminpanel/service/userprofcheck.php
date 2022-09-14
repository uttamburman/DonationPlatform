<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
 $uid="";
 session_start();
	if (isset($_SESSION["uname"])) {
		$uid=$_SESSION["uname"];
	}
$data = json_decode(file_get_contents("php://input"));
$resmp=$connection->selectTable("SELECT * from people where p_username='".$uid."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	$output[] = $featrow;
	print json_encode($output);
}
else{
	echo "failed";
}


?>