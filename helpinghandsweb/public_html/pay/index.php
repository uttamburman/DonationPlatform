<?php
error_reporting(E_ERROR);

if($_POST['amount']==''){
    //header("Location: ../#/Donations");
	//die();
}  

// Merchant key here as provided by Payu
$MERCHANT_KEY = "dRmFeEw3";

// Merchant Salt as provided by Payu
$SALT = "9BGP5luEHo"; 

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(!empty($posted['surl']) && !empty($posted['furl']) && $posted['amount']>=100 && $posted['surl']=="http://www.helpinghandsgroup.in/pay/success.php" && $posted['furl']=="http://www.helpinghandsgroup.in/pay/failure.php" && $posted['curl']=="http://www.helpinghandsgroup.in/pay/cancel.php"){
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
}
else{
	$formError=1;
}
?>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
	<meta name="viewport" content="width=device-width">
 	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  	<link href="stylesheet.css"  rel="stylesheet"  type="text/css" />
	  <script>
		var hash = '<?php echo $hash ?>';
		function submitPayuForm() {
		  if(hash == '') {
			return;
		  }
		  var payuForm = document.forms.payuForm;
		  payuForm.submit();
		}

	  </script>
  </head>
  <body onload="submitPayuForm()">
   <div class="bodywrapper">
   <div class="contentcard">
    
			<form action="<?php echo $action; ?>" method="post" name="payuForm">
			  <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
			  <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
			  <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

			 	<div class="amountwrapper">
					<div class="productdetailbox">
						  <textarea name="productinfo" readonly><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea>
						  <input readonly name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
					</div>
					<div class="pricetag">To Pay</div>
					<div class="amountsection">
						<span class="amountsym">&#8377;&nbsp;</span>
						<span class="amountval"><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" readonly /></span>
					</div>
					<div class="cancelpay"><span class="rettext"><a href="../#/Donations" class="retlink">&#9665;&nbsp;&nbsp;Cancel your payment</a></span></div>
				</div>
				<div class="payeewrapper">
					<div class="payheadbold">Payments</div>
					<div class="messagebox">
						<?php if($formError) { ?>
						<span>All Details are required exquisitely</span>
						<?php } ?>
					</div>
					
					
					<div class="persondetailbox">
						<span class="inputtype">NAME</span>
						<span class="inputbox"><input name="firstname" min=3 id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></span>


						<span class="inputtype">EMAIL</span>
						<span class="inputbox"><input name="email" type="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></span>
						  
						<span class="inputtype">PHONE</span>
						<span class="inputbox"><input name="phone" min=10 value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></span>
						
						<span class="inputtype">POSTAL ADDRESS</span>
						<span class="inputbox"><input name="address1" min=5 value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1'];  ?>" max=95/></span>
					</div>
				
			  <input type="hidden" id="surl" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />



			  <input type="hidden" id="furl" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />



			  <input type="hidden" name="service_provider" value="payu_paisa" size="64" />





			  <input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" />

			  <input type="hidden" name="curl" value="http://www.helpinghandsgroup.in/pay/cancel.php" />



			  

			  <input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />



			  <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />

			  <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />



			  <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />

			  <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />


			  

			  <input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />



			  <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />

			  <input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />



			  <input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />

			  <input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
			  
				  <div class="prbtnwrap">
				  <?php if(!$hash) { ?>
					<input type="submit" value="PAY NOW" />
				  <?php } ?>
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
			</form>
	   
	  </div>
	  </div>
  </body>
  <script>
	  var sucurl=document.getElementById("surl");
	  var failurl=document.getElementById("furl");
	  sucurl.value= "http://www.helpinghandsgroup.in/pay/success.php";
	  failurl.value= "http://www.helpinghandsgroup.in/pay/failure.php";
  </script>
</html>
