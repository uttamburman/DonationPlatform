<?php 

include ('../../fusionsaga/dataprocess/data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
	  $data = json_decode(file_get_contents("php://input"));
	  $id = $data->id;
	  $dayback15=date("Y-m-d", time() - 432000);
	  $day= date("Y-m-d");
$resmp=$connection->selectTable("select * from story_meta where arid='".$id."' order by arid desc limit 1;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $categ=$featrow["categ"];
	 $resmain=$connection->selectTable("select * from story_meta where categ='".$categ."' && publishsqlformdte>='".$dayback15."' && publishsqlformdte<='".$day."' order by views desc limit 1;");
	 while($mainrow = $resmain->fetch_assoc()) {
		 $output[] = $mainrow;
	 }	 
}
    print json_encode($output);
?>