<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
 $data = json_decode(file_get_contents("php://input"));
	  
	  $strId = $data->id;
	  $strType = $data->type;
	  $querystring=	"";	//"SELECT * from bigvideostorydetails  where rsid=".$strId.";";
	  if($strType=='bvs'){
		  $querystring="SELECT * from bigvideostorydetails  where rsid=".$strId.";";
	  }
	  else if($strType=='nvs'){
		  $querystring="SELECT * from normalvideostorydetails  where rsid=".$strId.";";
	  }
	  else if($strType=='svs'){
		  $querystring="SELECT * from smallvideostorydetails  where rsid=".$strId.";";
	  }
	  else if($strType=='bps'){
		  $querystring="SELECT * from bigvideostorydetails  where rsid=".$strId.";";
	  }
	  else if($strType=='nps'){
		  $querystring="SELECT * from normalphotostorydetails  where rsid=".$strId.";";
	  }
	  else if($strType=='sps'){
		  $querystring="SELECT * from smallphotostorydetails  where rsid=".$strId.";";
	  }
	  
	  
$resmp=$connection->selectTable($querystring);
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>