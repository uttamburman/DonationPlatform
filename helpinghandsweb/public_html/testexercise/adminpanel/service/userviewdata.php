<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
 
$data = json_decode(file_get_contents("php://input"));
$resmp=$connection->selectTable("SELECT a.p_id,a.p_fname,a.p_lname,a.p_username,a.p_role,b.mod_human_timestamp,b.mod_type from people a, changes b where a.p_id=b.p_id && b.p_id='".$id."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	$output[] = $featrow;
}
print json_encode($output);

?>