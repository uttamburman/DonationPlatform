<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
$eid="";
session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}
$resmp=$connection->selectTable("SELECT * from tempsubmit where segment='legend' order by arid desc;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $ard=$featrow["arid"];
		$res1=$connection->selectTable("SELECT * from story_meta where arid='".$ard."';");
		while($rows = $res1->fetch_assoc()) {	
			$output[] = $rows;//echo $ard;
		}	
}
    print json_encode($output);
?>