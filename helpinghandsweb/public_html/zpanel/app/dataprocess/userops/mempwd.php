<?php
	  include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $pwd="";
	  $pwd1="";
	  $pwd = $data->pwd;
	  $pwd1 = $data->pwd1;
	  $dte=date("d-m-Y");
	  session_start();
	  if (isset($_SESSION["eid"])) 
	    {
			$eid=$_SESSION["eid"];
			$resx1=$connection->selectTable("SELECT * from membersdata where passwrd='".$pwd."' order by id desc limit 1;");
	  		if ($resx1->num_rows > 0) {
    		while($featrow = $resx1->fetch_assoc()) {
					$sql = "update membersdata set passwrd='".$pwd1."', moddt='".$dte."' where id='".$eid."';";
	  				$result=$connection->db_query($sql);
					if($result==1){
	    				echo "success";		
					}
				}//While End
			}//if End
			else{
				echo "incorrect";
			}		//Else End	
			
		}//Session End
?>