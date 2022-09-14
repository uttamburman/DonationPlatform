<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
      $data = json_decode(file_get_contents("php://input"));
	  $aid = $data->aid;

$resmp=$connection->selectTable("SELECT * from story_meta where arid='".$aid."' order by arid;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>