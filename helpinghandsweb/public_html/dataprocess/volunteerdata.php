<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $name = $data->name;
	  $contact = $data->contact;
	  $email = $data->email;	
	  $city = $data->city;
	  $address = $data->address;
	  $abt = $data->about;
	  $sno = 1001;
	  $resx1=$connection->selectTable("SELECT id from volunteerdata order by id desc limit 1;");
	  
	  if ($resx1->num_rows > 0) {
    	while($featrow = $resx1->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$sno=$featrow["id"]+1;
			//echo"serial ".$sno." - generated";
		}
	  }
	  $sql = "insert into volunteerdata values('".$sno."','".$name."','".$contact."','".$email."','".$city."','".$address."','".$abt."');";
	  $result=$connection->db_query($sql);
if($result==1){
	    $mailto=$email;  //Enter recipient email address here

        $subject = "Volunteering For Helping Hands Group";

        $from="helpinghands@helpinghandsgroup.in";          //Your valid email address here
		$headers  = "From: $from\r\n"; 
    	$headers .= "Content-type: text/html\r\n";


        $message_body = "
<html> 
<head>
<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>
  <body> 

    <div style=\"display:block;position:relative;text-align:center;height:600px;width:600px;background-color:whitesmoke;border:0px solid #456;border-radius:3px;padding:10px;\">
	    <img src=\"http://helpinghandsgroup.in/images/brandinga.png\" style=\"display:block;position:relative;width:120px;height:120px; margin-left:auto;margin-right:auto;\">
        <p style=\"font-family:'Raleway';font-size:36px;width:100%;font-weight:700;color:#E54447;\">HELPING HANDS GROUP</p>
	<b>Thank You,".$name."!<br> You are now a volunteer for us.</b>
	<br>By this you have Subscribed to recieve information regarding our events, Newsletters, & promotional messages.
	<br><br><b>How does this Help us?
	<br>Emails and contacts help us to reach you instantly. By registering you showed interest towards working for us. If you are interested in donations or permanent memberships please visit the link.</b>
	<br><br><a style=\"display:block; width:400px; height:40px;
		color:white;background:#E54447;border-style:none;margin-left:auto;
		margin-right:auto;text-decoration:none;padding-top:20px;font-size:16px; font-weight:500;\" href=\"http://helpinghandsgroup.in/#/Membership\">Membership</a></br>
		
	<br><br><br>127/2C, DRM Road, <br>Saket Nagar, Near AIIMS,<br><b> Bhopal</b><br>462024
        
		
    </div>
  </body>
</html>
";

        mail($mailto,$subject,$message_body,$headers);
		echo'created';
		// store session data
}


?>