<?php

include ('data.php');

	  $connection = new createConnection();

      $connection->connectToDatabase(); 

      $connection->selectDatabase();

	  $data = json_decode(file_get_contents("php://input"));

	  $fname = $data->fname;
	  $lname = $data->lname;

	  $usrname = $data->username;

	  $passwrd = $data->password;	

	  $humandte=date("jS F Y");
		$dte=date("Y-m-d H:i:s");

	  $sno = 1001;


	  $resx1=$connection->selectTable("SELECT p_id from people order by p_id desc limit 1;");


	  if ($resx1->num_rows > 0) {

    	while($featrow = $resx1->fetch_assoc()) {

			$sno=$featrow["p_id"]+1;

			//echo"serial ".$sno." - generated";

		}

	  }

	  $sql = "insert into people values('".$sno."','".$fname."','".$lname."','".$usrname."','".$passwrd."','regular','0');";

	  $sql1 = "insert into changes values('".$sno."','".$humandte."','".$dte."','Generated','Profile');";
	  $result=$connection->db_query($sql);
	  $result1=$connection->db_query($sql1);

if($result==1){

		echo'created';

}





?>