angular.module('testApp', ['ngRoute', 'ngMaterial', 'ngMessages'])
.controller('AppController', function ($scope, $rootScope, $log, $window) {
	console.log("Yolo!");
	$scope.buttonhide= false;
	var status=0;
	$('.menu-clsbutton-wrap').addClass("menuclosechange");
	setTimeout(function() {
	    $('.tagtext').addClass("tagtextchange");
	}, 500);
	$scope.signListener = function () {
		$('.human-immersive-wrap').removeClass("change2");
		$('.human-immersive-wrap').addClass("change1");
		$('.access-box-wrap').addClass("accesschange");
		$('.menu-wrap').removeClass("menuchange");		
		$('.menu-button-wrap').removeClass("menubuttonchange");
		$('.menu-clsbutton-wrap').addClass("menuclosechange");
		$('.tagtext').removeClass("tagtextchange");
	}
	$scope.menuListener = function () {
		
			$('.access-box-wrap').removeClass("accesschange");
			$('.human-immersive-wrap').removeClass("change1");
			$('.human-immersive-wrap').addClass("change2");
			$('.menu-wrap').addClass("menuchange");		
			$('.menu-button-wrap').addClass("menubuttonchange");
			$('.menu-clsbutton-wrap').removeClass("menuclosechange");
	}
	$scope.menucloseListener = function () {
		
			$('.human-immersive-wrap').removeClass("change2");
			$('.menu-wrap').removeClass("menuchange");		
			$('.menu-button-wrap').removeClass("menubuttonchange");
			$('.menu-clsbutton-wrap').addClass("menuclosechange");
			$('.tagtext').addClass("tagtextchange");

	}
	$scope.cancelSign = function () {
		$('.access-box-wrap').removeClass("accesschange");
		$('.human-immersive-wrap').removeClass("change1");
		$('.human-immersive-wrap').removeClass("change2");
		$('.menu-wrap').removeClass("menuchange");		
		$('.menu-button-wrap').removeClass("menubuttonchange");
		$('.menu-clsbutton-wrap').addClass("menuclosechange");
		$('.tagtext').addClass("tagtextchange");
	}
	$window.onscroll = function() {
		var height=window.innerHeight;
		var weight=window.innerWidth;
		var currentPos = window.scrollY;
		var thresholdPos=height-(height/1.5);
		if(currentPos>=thresholdPos){
			$('.nav-wrap').addClass("nav-wrap-change");
	  		$('.nav-float').addClass("nav-float-change");
		}
		else{
			$('.nav-wrap').removeClass("nav-wrap-change");
	  		$('.nav-float').removeClass("nav-float-change");
		}
	};
})
.controller('loginCtrl', function ($scope,$http) {
	$scope.activated = true;

	$scope.response='';

	$scope.email="";

	$scope.loginListener = function() {

	             $('.formbtn').hide();

				 //$('.processor').show();	

				 $scope.activated = false;			 

				 //var myEl = angular.element( document.querySelector( '.includediv' ) );

				$http.post("services/logincheck.php",{'userid':$scope.userid,'password':$scope.password})

					.success(function(data,status,headers,config){

						$scope.result = data;						

					    //$scope.response='Posted';
					    console.log(data);

						if(data.trim()==='regular'){
							window.location = "userpanel";

							//$scope.response='Authenticating...';

						}
						else if(data.trim()==='admin'){
							window.location = "adminpanel";

							//$scope.response='Authenticating...';

						}

						else{

							//alert($scope.name+$scope.password);

							$scope.response='Invalid Details';

							$scope.activated = true;

							 $('.formbtn').show();

						}

					});

				 

	}
})