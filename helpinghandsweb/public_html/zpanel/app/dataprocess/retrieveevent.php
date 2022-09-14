<?php 
$oid='';
session_start();
if (isset($_SESSION["uid"])) {
	$oid=$_SESSION["uid"];
}
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  


$resmp=$connection->selectTable("SELECT * from evdetails where oid='".$oid."' order by eid desc;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>