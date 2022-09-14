<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $aid =$data->id;
	  $dte=date("jS F Y");
	  session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}		 
		$sql="update story_meta set stats='produce', dtofproduce='".$dte."' where arid='".$aid."' && eid='".$eid."';";
	  

	  $result=$connection->db_query($sql);
if($result==1){
	    echo $categ;
		
}


?>