<?php 

include ('data.php');
$connection = new createConnection();
$connection->connectToDatabase(); 
$connection->selectDatabase();
  
$dayback3=date("Y-m-d", time() - 172800);
$day= date("Y-m-d");
//echo $day;
$eid="";
session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}
//echo $day;
//echo "day-3 ".$dayback3;
$resmp=$connection->selectTable("SELECT * from story_meta where eid='".$eid."' && stats='running' && publishsqlformdte>='".$dayback3."' && publishsqlformdte<='".$day."' && submitted = 'ns' && categ!='technology' && categ!='ideology' && categ!='nature' && categ!='bollywood' order by arid desc;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	$ard=$featrow["arid"];
	$resx1=$connection->selectTable("SELECT arid from allsubmit where arid='".$ard."' order by arid desc limit 1;");
	if ($resx1->num_rows > 0) 
	{
		
	}
	else{
		$output[] = $featrow;
	}
	
	//echo $ard;
	
				
	 
}
    print json_encode($output);
?>