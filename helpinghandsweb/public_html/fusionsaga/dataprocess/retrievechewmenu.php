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
	  $dayback15=date("Y-m-d", time() - 432000);
	  $day= date("Y-m-d");
$resmp=$connection->selectTable("select * from story_meta where (categ='inspire' || tagchips like '%thought%') && stats='running' order by arid desc limit ".$limit." offset ".$offset.";");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
	 
}
    print json_encode($output);
?>