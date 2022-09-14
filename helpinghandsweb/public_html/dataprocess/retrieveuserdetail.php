<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
 $data = json_decode(file_get_contents("php://input"));
	  
	  $strId = $data->id;  
	  
$resmp=$connection->selectTable("SELECT * from adminusers  where uid=".$strId.";");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>