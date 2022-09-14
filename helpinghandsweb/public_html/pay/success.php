<?php
//error_reporting(E_ERROR);
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$p_desc=$_POST["udf1"];
$add1=$_POST["address1"];
$phone=$_POST["phone"];
$salt="9BGP5luEHo";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||||||'.$p_desc.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'||||||||||'.$p_desc.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);        
?>	

<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
	<meta name="viewport" content="width=device-width">
 	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  	<link href="stylesheet.css"  rel="stylesheet"  type="text/css" />
	 
  </head>
  <body>
   <div class="bodywrapper">
   <div class="contentcard">
		 	<?php
		 	 if ($hash != $posted_hash) {
	       
				 ?>
				 
			<div class="amountwrapper">
			<div class="pricetag">Something Went Wrong</div>
			<div class="cancelpay"><span class="rettext"><a href="../#/Donations" class="retlink">&#9665;&nbsp;&nbsp;Retry donation</a></span></div>
	   </div>
	   <div class="payeewrapper">
	   </div>
				 <?php
				 
		   }
	   else {
          
		  ?>
			 	<div class="amountwrapper">
					<div class="productdetailbox">
						  <textarea name="productinfo" readonly><?php echo $productinfo; ?></textarea>
						  <input readonly name="udf1" value="<?php echo $p_desc; ?>" />
					</div>
					<div class="pricetag">Paid</div>
					<div class="amountsection">
						<span class="amountsym">&#8377;&nbsp;</span>
						<span class="amountval"><input name="amount" value="<?php echo $amount; ?>" readonly /></span>
					</div>
					<div class="cancelpay"><span class="rettext"><a href="../#/Donations" class="retlink">&#9665;&nbsp;&nbsp;Donate More</a></span></div>
				</div>
				<div class="payeewrapper">
					<div class="payheadbold">Payments</div>
					
					
					
					<div class="persondetailbox">
						
						<span class="inputtype">Status: <?php echo $status; ?></span>
						<span class="inputbox">Transaction ID: <?php echo $txnid; ?></span>
						
						<span class="inputtype">NAME</span>
						<span class="inputbox"><?php echo $firstname; ?></span>


						<span class="inputtype">CONTACT DETAILS</span>
						<span class="inputbox"><?php echo $email; ?></span>
						<span class="inputbox"><?php echo $phone; ?></span>
						<span class="inputbox"><?php echo $add1; ?></span>
					</div>


			  
				  <div class="prbtnwrap">
				  <a class="linkbutton" href=../#/Contact> Contact Us</a>
				  </div>
				  <div class="secureicons">
						<span class="securelogogroup">
						   <span class="securelogo norton"></span>
						   <span class="securelogo visa"></span>
						</span>
					   	<span class="securelogogroup">
						   <span class="securelogo mastercard"></span>
						   <span class="securelogo amsafe"></span>
					  	</span>
					  	<span class="securelogogroup">
						   <span class="securelogo pcidss"></span>
						   <span class="securelogo payu"></span>
					  	</span>
				   </div>
			  </div>
	   <?php 
		    }   
	   ?>
	   <?php
      include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

	  date_default_timezone_set('Asia/Kolkata');
	  $d_date=date("d-m-Y");    /* Date*/
	  $datestmp = date("Y-m-d H:i:s");
	  $d_time= date("h:i:sa");
	  $d_year=date("Y");
	   $d_day=date("d");
	   $d_month=date("m");
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
			
			$sno = 1000001;
	  		$sql="";
				$resx1=$connection->selectTable("SELECT uid from donations order by uid desc limit 1;");
				if ($resx1->num_rows > 0) 
				{
						while($featrow = $resx1->fetch_assoc()) 
						{
							$sno=$featrow["uid"]+1;
						}
				}
	   			$resx2=$connection->selectTable("SELECT txnid from donations where txnid='".$txnid."';");
				if ($resx2->num_rows > 0) 
				{
						
				}
			   else{
				$stmt = $mysqli->prepare("insert into donations values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
				$stmt->bind_param('ssssssssssssssss', $sno , $firstname , $amount , $datestmp , $d_date , $phone , $email , $add1 , $d_day , $d_month , $d_year , $txnid , $status , $productinfo , $p_desc , $d_time );
				$stmt->execute();
			
				echo $sno;
			   }
    

?>
	  </div>
	  </div>
  </body>
</html>
