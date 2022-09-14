<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
$email="";
 session_start();
if (isset($_SESSION["email"])) {
	$email=$_SESSION["email"];
	
}
//echo $email." -Email";
$data = json_decode(file_get_contents("php://input"));
$cod = $data->code;
$resmp=$connection->selectTable("SELECT * from membersdata where email='".$email."' && cod='".$cod."';");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	echo "correct";
		$sql = "update membersdata set verif='verified' where email='".$email."';";
	  	$result=$connection->db_query($sql);
		if($result==1){
			//echo'created';
			// store session data
			$_SESSION["verif"] = 'verified';
		}
}
?>