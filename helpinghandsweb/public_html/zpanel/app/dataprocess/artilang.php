<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $lang="";
	  $lang = $data->lang;
	  $aid =$data->aid;
	  session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}		
		$sql="update story_meta set languag='".$lang."' where arid='".$aid."' && eid='".$eid."';";
	  

	  $result=$connection->db_query($sql);
if($result==1){
	    echo $categ;
		
}


?>