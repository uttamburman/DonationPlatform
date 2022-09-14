angular.module('orgApp', ['ngMaterial' , 'ngMessages'])

.controller('loginCtrl', function ($scope,$http) {
	$scope.activated = true;
	$scope.sactivated = true;
    $scope.response='';
	//$('.processor').hide();
	$scope.email="";
	$scope.selectedTab = 0;
	$scope.loginPage = function() {
		$scope.selectedTab = 0;
	}
	$scope.signPage = function() {
		$scope.selectedTab = 1;
	}
$scope.logindata = function() {
	             $('.formbtn').hide();
				 //$('.processor').show();	
				 $scope.activated = false;			 
				 //var myEl = angular.element( document.querySelector( '.includediv' ) );
				$http.post("app/logincheck.php",{'email':$scope.email,'password':$scope.password})
					.success(function(data,status,headers,config){
						$scope.result = data;						
					    //$scope.response='Posted';
						if(data.trim()==='correct'){
							//$scope.response='Authenticating...';
							$http.post("app/memberstatuscheck.php",{'email':$scope.email,'password':$scope.password})
							.success(function(data,status,headers,config){
								//myEl.html('<divclass=\"\"><b>Processed</b></div>');
								///$scope.result = data;
								
								//$scope.response='Checking Verification';
								//$scope.response=data;
								$scope.activated = true;
								if(data.trim()==='verified'){								
								//$scope.cresv='Thank You for Registering. An email has been sent to you.';
								//$scope.response='Authentification Successful';
								//$scope.response=data;
								window.location = "../zpanel";
						    	}
								else if(data.trim()==='email'){								
								//$scope.cresv='Thank You for Registering. An email has been sent to you.';
								$scope.response='Your Verification is under process by Administrator';
								$scope.activated = true;
						    	}
								else if(data.trim()==='unverified'){
									//$scope.response=data;
									window.location = "verify.php";
								}
								else{
									$scope.response='Something went wrong. Please Contact Administrator if problem persists.';
								}
							});
						}
						else{
							//alert($scope.name+$scope.password);
							$scope.response='Invalid Details';
							$scope.activated = true;
							 $('.formbtn').show();
						}
					});
				 
	}
	
	$scope.signbtnhide=false;
	
	$scope.signdata = function() {
	             $scope.signbtnhide=true;
				 $scope.sactivated = false;
				 //var myEl = angular.element( document.querySelector( '.sucresm' ) );
				 //alert(''+$scope.contact+','+$scope.name+','+$scope.bldgrp+','+$scope.city);
				 if($scope.cpassword===$scope.cpassworda){
				$http.post("../dataprocess/membercheck.php",{'contact':$scope.scontact,'email':$scope.semail})
					.success(function(data,status,headers,config){
						$scope.result = data;
						console.log(data);
						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');
						if(data.trim()==='correct'){
							//myEl.html('<divclass=\"\"><b>Some Details Already Exists</b></div>');
							$scope.sresponse='Email or contact already exists, please login in members area';
							$scope.signbtnhide= false;
				 			$scope.sactivated = true;
						}
						else{
							$http.post("../dataprocess/usernamecheck.php",{'username':$scope.susrname})
					.success(function(data,status,headers,config){
						$scope.result = data;
						console.log(data);
						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');
						if(data.trim()==='correct'){
							//myEl.html('<divclass=\"\"><b>Some Details Already Exists</b></div>');
							$scope.sresponse='Username already exists, please login in members area';
							$scope.signbtnhide= false;
				 			$scope.sactivated = true;
						}
						else{
							$http.post("../dataprocess/signdata.php",{'name':$scope.sname,'username':$scope.susrname,'password':$scope.spassword,'email':$scope.semail,'contact':$scope.scontact})
							.success(function(data,status,headers,config){
								//myEl.html('<divclass=\"\"><b>Processed</b></div>');
								$scope.result = data;
								console.log(data);
								if(data.trim()==='created'){
								$scope.sresponse='Account Created. Please login & Verify by code sent to your email.';
								$scope.signbtnhide= false;
				 				$scope.sactivated = true;
						    	}
								else{
									$scope.sresponse='Something went wrong.If this continues please contact technical administrator.';
									$scope.signbtnhide= false;
				 			        $scope.sactivated = true;
								}
							});
                        }
							
                    });
                }
                });
				 }
				 else{
					 $scope.cresm='Passwords didn\'t matched';
					 $scope.signbtnhide= false;
				 	 $scope.sactivated = true;
				 }
}
	
})
.controller('verifyCtrl', function ($scope,$http) {
    $scope.responsev='';
	//$('.processorx').hide();
	$scope.activated = true;
	
$scope.verifydata = function() {
		         $scope.activated = false;
	             $('.verformbtn').hide();
				 //$('.processorx').show();				 
				$http.post("app/verifycheck.php",{'code':$scope.code})
					.success(function(data,status,headers,config){
												
					    //$scope.responsev='Verification Data Posted'+data;
						if(data.trim()==='correct'){
							$scope.responsev='Email Verified. You will be verified by Administrators for accessing your account';
							$scope.activated = false;		
						}
						else{
							//alert($scope.name+$scope.password);
							//$scope.responsev='Incorrect Verification Code';
						}
					});
				 
	}
});