<?php 
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
session_start();
$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;
$resmp=$connection->selectTable("SELECT * from membersdata where email='".$email."'&& passwrd='".$password."'");
$output = array();
if($featrow = $resmp->fetch_assoc()) {
	$out=$featrow["verif"];
	$out1=$featrow["adminverif"];
	$eid = $featrow["id"];
	if($out=='verified' && $out1=='verified'){
		echo'verified';
		// store session data
		$_SESSION["email"] = $email;
		$_SESSION["eid"] = $eid;
		$_SESSION["adminverif"] = 'verified';
	}
	else if($out=='verified'){
		echo'email';
	}
	else{
		$_SESSION["email"] = $email;
		echo'unverified';
	}
	
	
}

?>