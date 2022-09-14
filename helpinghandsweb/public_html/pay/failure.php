<?php
error_reporting(E_ERROR);
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
		   <div class="payheadbold">Payment Failed</div>
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
					<div class="cancelpay"><span class="rettext"><a href="../#/Donations" class="retlink">&#9665;&nbsp;&nbsp;TRY AGAIN</a></span></div>
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
	  </div>
	  </div>
  </body>
</html>
