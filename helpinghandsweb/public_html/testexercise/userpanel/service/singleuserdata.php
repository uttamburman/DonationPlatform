<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
 
$data = json_decode(file_get_contents("php://input"));
$resmp=$connection->selectTable("SELECT * from people where p_id='".$id."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	$output[] = $featrow;
}
print json_encode($output);

?>