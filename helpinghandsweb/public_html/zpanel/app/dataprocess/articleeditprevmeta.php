<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  $data = json_decode(file_get_contents("php://input"));
	  $id = $data->id;
$eid="";
session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}
$resmp=$connection->selectTable("SELECT * from story_meta where arid='".$id."';");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>