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
	  $data = json_decode(file_get_contents("php://input"));
	  
	  $name = $data->name;
	  $categ = $data->categ;
	  $dte = $data->dte;
	  $tme = $data->tme;	  
	  $city = $data->city;
	  $addr = $data->addr;
	  $lati = $data->lati;
	  $longi = $data->longi;
	  $summ = $data->summ;
	  $tnc = $data->tnc;
	  $near = $data->near;
	  $resx1=$connection->selectTable("SELECT eid from evdetails order by eid desc limit 1;");
	  $sno='1001';
	  
	  if ($resx1->num_rows > 0) {
    	while($featrow = $resx1->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$sno=$featrow["eid"]+1;
			//echo"serial ".$sno." - generated";
		}
	  }
	  $sql = "insert into evdetails values('".$oid."','".$sno."','".$name."','".$categ."','".$dte."','".$tme."','".$city."','".$addr."','".$summ."','".$tnc."','".$lati."','".$longi."','".$near."');";
	  $result=$connection->db_query($sql);
if($result==1){
		echo'created';
		session_start();
		// store session data
		$_SESSION["eid"] = $sno;
}
else{
	echo 'Failed';
	echo $name;
}


?>