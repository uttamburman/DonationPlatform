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
$resmp=$connection->selectTable("select a.arid, a.title, a.covimg, a.slug, a.thumbimg,b.status,b.segment,b.sid from story_meta a, allsubmit b where a.arid=b.arid && b.segment='featured' && b.status='selected' order by b.sid desc limit ".$limit.";");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
	 
}
    print json_encode($output);
?>