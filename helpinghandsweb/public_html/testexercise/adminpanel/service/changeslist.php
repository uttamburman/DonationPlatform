<?php 

include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
  $uid="";
 session_start();
	  if (isset($_SESSION["uname"])) 
	    {

			$uid=$_SESSION["uname"];
		}

$resmp=$connection->selectTable("SELECT a.p_id,a.p_fname,a.p_lname,b.mod_type from people a, changes b where a.p_id=b.p_id  order by b.mod_timestamp desc;");
$output = array();
while($featrow = $resmp->fetch_assoc()) {
	 $output[] = $featrow;
}
    print json_encode($output);
?>