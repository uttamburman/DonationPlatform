<?php 

include ('data.php');

	  $connection = new createConnection();

      $connection->connectToDatabase(); 

      $connection->selectDatabase();

  

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;

$resmp=$connection->selectTable("SELECT * from people where p_username='".$username."';");

$output = array();

if($featrow = $resmp->fetch_assoc()) {

	echo'correct';

}

?>