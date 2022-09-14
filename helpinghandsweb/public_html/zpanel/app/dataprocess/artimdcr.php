<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $arid="";
	  $eid="";
	  $title="";
	  $shortdesc="";
	  $covimg="";
	  $thumbimg="";
	  $categ="";
	  $views="";
	  $shares="";
	  $slug="";
	  $status="";
	  
	  $arid = $data->id;
	  $role = $data->role;
	  $verif = $data->ver;
	  $resx1=$connection->selectTable("SELECT email from membersdata order by id desc limit 1;");
	  $email='';
	  if ($resx1->num_rows > 0) {
    	while($featrow = $resx1->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$email=$featrow["email"];
			//echo"serial ".$sno." - generated";
		}
	  }
	  $sql = "update membersdata set role='".$role."', adminverif='".$verif."' where id='".$id."';";
	  $result=$connection->db_query($sql);
if($result==1){
	    $mailto=$email;  //Enter recipient email address here

        $subject = "Member Verification in Helping Hands Group";

        $from="helpinghands@helpinghandsgroup.in";          //Your valid email address here
		$headers  = "From: $from\r\n"; 
    	$headers .= "Content-type: text/html\r\n";


        $message_body = "
<html> 
<head>
<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>
  <body> 

    <div style=\"display:block;position:relative;text-align:center;height:500px;width:600px;background-color:whitesmoke;border:0px solid #456;border-radius:3px;padding:10px;\">
	    <img src=\"http://helpinghandsgroup.in/images/brandinga.png\" style=\"display:block;position:relative;width:120px;height:120px; margin-left:auto;margin-right:auto;\">
        <p style=\"font-family:'Raleway';font-size:36px;width:100%;font-weight:700;color:#E54447;\">HELPING HANDS GROUP</p>
	<b>Verification Details</b>
  	<b><br>You have been ".$verif." from our side</b>
	    <p style=\"font-size:16px; font-weight:500;color:black;width:100%;text-align:center;\">If you are verified please login at:</p>
        <br/><a style=\"display:block; width:400px; height:40px;
		color:white;background:#E54447;border-style:none;margin-left:auto;
		margin-right:auto;text-decoration:none;padding-top:20px;font-size:16px; font-weight:500;\" href=\"www.helpinghandsgroup.in/members\">http://www.helpinghandsgroup.in/members</a></br>
	
        <br><br><p style=\"font-size:16px; font-weight:500;color:black;width:100%;text-align:center;\">Contact us if any problem persists at: help@helpinghandsgroup.in</p>
		<br>127/2C, DRM Road, <br>Saket Nagar, Near AIIMS,<br><b> Bhopal</b><br>462024
		
    </div>
  </body>
</html>
";

        mail($mailto,$subject,$message_body,$headers);
		echo'done';
		// store session data
}


?>