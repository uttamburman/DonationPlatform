<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
      $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	 
$resmp=$connection->selectTable("SELECT id, name, introd, theme, fb, ln, gp, tw, prof, posit  from membersdata where posit='cord'&& adminverif='verified' order by id;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>