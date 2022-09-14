
<?php
	  include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $pn="";
	  $pn = $data->pn;
	  $dte=date("d-m-Y");
	  session_start();
	  if (isset($_SESSION["eid"])) 
	    {
			$eid=$_SESSION["eid"];
			$sql = "update membersdata set pn='".$pn."', moddt='".$dte."' where id='".$eid."';";
	  		$result=$connection->db_query($sql);
			if($result==1){
	    		echo "success";		
			}
		}
?>