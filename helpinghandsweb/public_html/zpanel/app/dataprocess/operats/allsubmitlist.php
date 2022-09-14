<?php 

include ('data.php');
$connection = new createConnection();
$connection->connectToDatabase(); 
$connection->selectDatabase();
  
$dayback3=date("Y-m-d", time() - 172800);
$day= date("Y-m-d");
//echo $day;
$eid="";
session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}
//echo $day;
//echo "day-3 ".$dayback3;
$resmp=$connection->selectTable("SELECT * from allsubmit where eid='".$eid."' order by sid desc;");
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