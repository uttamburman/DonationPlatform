<?php
	  include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $name="";
	  $name = $data->name;
	  $humandte=date("jS F Y");
		$dte=date("Y-m-d H:i:s");
	  session_start();
	  if (isset($_SESSION["uname"])) 
	    {

			$uid=$_SESSION["uname"];
			 $sno = 1001;


			  $resx1=$connection->selectTable("SELECT p_id from people where p_username='".$uid."' limit 1;");


			  if ($resx1->num_rows > 0) {

		    	while($featrow = $resx1->fetch_assoc()) {

					$sno=$featrow["p_id"];

				}

			  }
			$sql = "update people set p_fname='".$name."' where p_username='".$uid."';";
	  		$result=$connection->db_query($sql);
	  		$sql1 = "insert into changes values('".$sno."','".$humandte."','".$dte."','Name','".$name."');";
	  		$result1=$connection->db_query($sql1);
			if($result==1){
	    		echo "success";		
			}
		}
?>