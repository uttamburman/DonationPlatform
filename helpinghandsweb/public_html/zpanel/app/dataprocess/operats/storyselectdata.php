<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $id = $data->id;
	  
	  $sql = "update allsubmit set status='selected' where arid='".$id."';";
	  $result=$connection->db_query($sql);
if($result==1){
	    $sql1 = "delete from tempsubmit where arid='".$id."';";
	  $result1=$connection->db_query($sql1);
	  if($result1==1){
		  echo"successfully Updated";
	  }
}


?>