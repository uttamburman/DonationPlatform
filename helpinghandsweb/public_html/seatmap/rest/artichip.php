<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  
	  $s_map = $data->s_map;
	  //$mid =$data->mid;
	  		
		$sql="insert into seat_maps values('1','".$s_map."');";
	  

	  $result=$connection->db_query($sql);
if($result==1){
	    echo $s_map;
		
}


?>