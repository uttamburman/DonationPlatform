<?php 

include ('data.php');

	  $connection = new createConnection();

      $connection->connectToDatabase(); 

      $connection->selectDatabase();

session_start();

$data = json_decode(file_get_contents("php://input"));

$pid= $data->userid;

$password = $data->password;

$resmp=$connection->selectTable("SELECT * from people where p_username='".$pid."' && p_pwd='".$password."';");

$output = array();

if($rows = $resmp->fetch_assoc()) {
	$out=$rows["p_role"];
	$username=$rows["p_username"];
	$_SESSION["uname"] = $username;
	if($out=='admin'){
		echo 'admin';	

		$_SESSION["role"] = 'admin';
	  	$cookie_name = "username";
	  	$cookie_value = $username;
	  	setcookie($cookie_name, $cookie_value, time() + (86400 * 90), "/"); // 86400 = 1 day
	}
	else if($out=='regular'){
		echo 'regular';

		$_SESSION["role"] = 'regular';
	}
	

}
else{
	echo 'incorrect';
}

?>