<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $name = $data->name;
	  $contact = $data->contact;	  
	  $bldgrp = $data->bldgrp;
	  $city = $data->city;
	  $sno = 1001;
	  $resx1=$connection->selectTable("SELECT id from blooddonors order by id desc limit 1;");
	  
	  if ($resx1->num_rows > 0) {
    	while($featrow = $resx1->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$sno=$featrow["id"]+1;
			//echo"serial ".$sno." - generated";
		}
	  }
	  $sql = "insert into blooddonors values('".$sno."','".$name."','".$contact."','".$bldgrp."','".$city."');";
	  $result=$connection->db_query($sql);
if($result==1){
		echo'created';
		// store session data
}


?>