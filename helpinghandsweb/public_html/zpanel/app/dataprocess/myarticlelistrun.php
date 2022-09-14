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
$resmp=$connection->selectTable("SELECT * from story_meta where eid='".$eid."' && stats='running' order by arid desc;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>