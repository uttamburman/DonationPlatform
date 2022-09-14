<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $id = $data->id;
	  $review = $data->review;
	  $remark = $data->remark;
	  $stat="";
	  $humandte='';
	  $dte='';
	  if($review=="pending"){
		  $stat="draft";
		  $dte='';
		  $humandte='';
	  }
	  else if($review=="changes required"){
		  $stat="draft";
		  $dte='';
		  $humandte='';
	  }
	  else if($review=="unacceptable"){
		  $stat="draft";
		  $dte='';
		  $humandte='';
	  }
	  else if($review=="clean"){
		  $stat="running";
		  $humandte=date("jS F Y");
		  $dte=date("Y-m-d");
	  }
	  $sql = "update story_meta set review='".$review."', stats='".$stat."',dtofpublish='".$humandte."',publishsqlformdte='".$dte."', remarks='".$remark."' where arid='".$id."';";
	  $result=$connection->db_query($sql);
if($result==1){
	    
}


?>