<?php 

include ('../../fusionsaga/dataprocess/data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  
	  $data = json_decode(file_get_contents("php://input"));
	  $limit="";
	  $offset="";
	  $limit = $data->limit;
	  $offset = $data->offset;
	  $dayback5=date("Y-m-d", time() - 432000);
	  $day= date("Y-m-d");
$resmp=$connection->selectTable("select * from story_meta where (categ='inspire' || categ='ideology' || tagchips like '%thought%') && stats='running' && publishsqlformdte>='".$dayback5."' && publishsqlformdte<='".$day."' order by views desc limit ".$limit.";");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
	 
}
    print json_encode($output);
?>