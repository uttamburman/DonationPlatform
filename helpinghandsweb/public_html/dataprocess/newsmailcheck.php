<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$resmp=$connection->selectTable("SELECT * from newslettersemail where mail='".$email."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	echo'correct';
}
?>