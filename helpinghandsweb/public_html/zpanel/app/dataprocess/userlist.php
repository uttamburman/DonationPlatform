<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  


$resmp=$connection->selectTable("SELECT * from membersdata where verif='verified' order by id desc;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>