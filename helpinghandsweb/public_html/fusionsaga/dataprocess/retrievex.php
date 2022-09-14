<?php 

include ('../../fusionsaga/dataprocess/data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
	  $data = json_decode(file_get_contents("php://input"));
	  $limit="";
	  $offset="";
	  $limit = $data->limit;
	  $offset = $data->offset;
$resmp=$connection->selectTable("SELECT * from story_meta order by arid desc limit ".$limit." offset ".$offset.";");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
	 
}
    print json_encode($output);
?>