<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
$data = json_decode(file_get_contents("php://input"));
$contct = $data->contact;
$resmp=$connection->selectTable("SELECT * from blooddonors where contact='".$contct."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	echo'correct';
}
?>