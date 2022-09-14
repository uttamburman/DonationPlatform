<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;
$resmp=$connection->selectTable("SELECT * from membersdata where email='".$email."' && passwrd='".$password."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	echo'correct';
}
?>