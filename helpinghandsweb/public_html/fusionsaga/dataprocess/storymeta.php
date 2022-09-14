<?php 

include ('../../fusionsaga/dataprocess/data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  $data = json_decode(file_get_contents("php://input"));
	  $id = $data->id;
$eid="";
session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}
$resmp=$connection->selectTable("SELECT a.arid, a.title, a.covimg,a.thumbimg,a.shortdesc,a.storydesc, a.tagchips, a.slug, a.dtofpublish, b.id, b.name, b.prof from story_meta a, membersdata b where a.eid=b.id && a.arid='".$id."';");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>