

//URI				:	www.helpinghandsgroup.in

//Developer Info 	: 	Main Public Website MPver1.2, 11|21|2016

//Description		: 	©2016 BPL Helping Hands Society (No. 01/01/01/29540/15). All Rights Reserved







angular.module('orgApp', ['ngRoute'])

.config(['$routeProvider',

    function ($routeProvider) {

        $routeProvider.

                when('/Home', {

                    templateUrl: 'files/home.php',

                    controller: 'HomeController'

                }).

                when('/About', {

                    templateUrl: 'files/about.php',

                    controller: 'AboutController'

                }).

                when('/Mission', {

                    templateUrl: 'files/mission.php',

                    controller: 'MissionController'

                }).

                when('/Whatwedo', {

                    templateUrl: 'files/whatwedo.php',

                    controller: 'WhatwedoController'

                }).

                when('/Team', {

                    templateUrl: 'files/team.php',

                    controller: 'TeamController'

                }).

                when('/Events', {

                    templateUrl: 'files/events.php',

                    controller: 'EventsController'

                }).

                when('/Stories', {

                    templateUrl: 'files/stories.php',

                    controller: 'StoriesController'

                }).

                when('/Contact', {

                    templateUrl: 'files/contact.php',

                    controller: 'ContactController'

                }).

                when('/Iksha', {

                    templateUrl: 'files/iksha.php',

                    controller: 'IkshaController'

                }).

                when('/Swabhiman', {

                    templateUrl: 'files/swabhiman.php',

                    controller: 'SwabhimanController'

                }).

                when('/Blood', {

                    templateUrl: 'files/blood.php',

                    controller: 'BloodController'

                }).

                when('/Green', {

                    templateUrl: 'files/green.php',

                    controller: 'GreenController'

                }).

                when('/Donations', {

                    templateUrl: 'files/donations.php',

                    controller: 'DonationsController'

                }).

                when('/Volunteer', {

                    templateUrl: 'files/volunteer.php',

                    controller: 'VolunteerController'

                }).

                when('/Membership', {

                    templateUrl: 'files/memberform.php',

                    controller: 'MemberController'

                }).

                when('/Sorry', {

                    templateUrl: 'files/sorry.html',

                    controller: 'SorryController'

                }).

                otherwise({

                    redirectTo: '/Home'

                });

    }])



.factory("user", function () {

    return {};

})



.directive('errSrc', function () {

            return {

                link: function (scope, element, attrs) {

                    element.bind('error', function () {

                        if (attrs.src != attrs.errSrc) {

                            attrs.$set('src', attrs.errSrc);

                        }

                    });

                }

            }

        })



.controller('HomeController', function ($scope) {

    $scope.message = 'This is home screen';

})

.controller('AboutController', function ($scope) {



    $scope.message = 'This is About screen';



})

.controller('MissionController', function ($scope) {



    $scope.message = 'This is Mission screen';



}).controller('WhatwedoController', function ($scope) {

    $scope.message = 'This is WhatWeDo screen';

})

.controller('TeamController', function ($scope , $http) {



    $scope.message = 'This is Team screen';

	$scope.activateFunction = function () {

                $(function() {

									  $('.material-card > .mc-btn-action').click(function () {

										  console.log('Clicked');

										  var card = $(this).parent('.material-card');

										  var icon = $(this).children('i');

										  icon.addClass('fa-spin-fast');

							  

										  if (card.hasClass('mc-active')) {

											  card.removeClass('mc-active');

							  

											  window.setTimeout(function() {

												  icon

													  .removeClass('fa-arrow-left')

													  .removeClass('fa-spin-fast')

													  .addClass('fa-bars');

							  

											  }, 800);

										  } else {

											  card.addClass('mc-active');

							  

											  window.setTimeout(function() {

												  icon

													  .removeClass('fa-bars')

													  .removeClass('fa-spin-fast')

													  .addClass('fa-arrow-left');

							  

											  }, 800);

										  }

									  });

								  });

            }

	$http.post("dataprocess/getPrimeProfile.php", {'post': 'data'})

                        .success(function (data, status, headers, config) {

                            console.log('Posted');

                            $scope.primeprofile = data;

							console.log(data);

							$(function() {

								$scope.activateFunction();

							});

						});

	$http.post("dataprocess/getLeadProfile.php", {'post': 'data'})

                        .success(function (data, status, headers, config) {

                            console.log('Posted');

                            $scope.leadprofile = data;

							console.log(data);

							$(function() {

								$scope.activateFunction();

							});

						});

	$http.post("dataprocess/getMemberProfile.php", {'post': 'data'})

                        .success(function (data, status, headers, config) {

                            console.log('Posted');

                            $scope.memberprofile = data;

							console.log(data);

							$(function() {

								//$scope.activateFunction();

							});

						});

	$http.post("dataprocess/getVolunProfile.php", {'post': 'data'})

                        .success(function (data, status, headers, config) {

                            console.log('Posted');

                            $scope.volunprofile = data;

							console.log(data);

							$(function() {

								$scope.activateFunction();

							});

						});

	

	

	



})

.controller('ContactController', function ($scope) {



    $scope.message = 'This is Contact screen';

	$('.processorxw').hide();



})

.controller('EventsController', function ($scope) {



    $scope.message = 'This is Events screen';



})

.controller('StoriesController', function ($scope) {



    $scope.message = 'This is Stories screen';



})

.controller('IkshaController', function ($scope) {



    $scope.message = 'This is Iksha screen';

    $('.storycontentview').hide();

	$('.searchmessage').hide();

	$('.busyfiller').hide();

    $('.closeview').click(function () {

        $('.storycontentview').hide();

		$('.busyfiller').hide();

		

    });

	$('.searchmessage').click(function () {

        $('.searchmessage').hide();

		$('.busyfiller').hide();

    });





})

.controller('SwabhimanController', function ($scope) {



    $scope.message = 'This is Swabhiman screen';

	$('.storycontentview').hide();

	$('.searchmessage').hide();

	$('.busyfiller').hide();

    $('.closeview').click(function () {

        $('.storycontentview').hide();

		$('.busyfiller').hide();

		

    });

	$('.searchmessage').click(function () {

        $('.searchmessage').hide();

		$('.busyfiller').hide();

    });



})

.controller('BloodController', function ($scope) {



    $scope.message = 'This is Blood Heroes screen';

	$('.storycontentview').hide();

	$('.searchmessage').hide();

	$('.busyfiller').hide();

    $('.closeview').click(function () {

        $('.storycontentview').hide();

		$('.busyfiller').hide();

		

    });

	$('.searchmessage').click(function () {

        $('.searchmessage').hide();

		$('.busyfiller').hide();

    });



})

.controller('GreenController', function ($scope) {



    $scope.message = 'This is Green Gang screen';

	$('.storycontentview').hide();

	$('.searchmessage').hide();

	$('.busyfiller').hide();

    $('.closeview').click(function () {

        $('.storycontentview').hide();

		$('.busyfiller').hide();

		

    });

	$('.searchmessage').click(function () {

        $('.searchmessage').hide();

		$('.busyfiller').hide();

    });

})

.controller('DonationsController', function ($scope) {



    $scope.message = 'This is Donation screen';



})

.controller('VolunteerController', function ($scope) {



    $scope.message = 'This is Volunteer screen';

	$('.processorv').hide();



})

.controller('MemberController', function ($scope) {



    $scope.message = 'This is Member screen';

	$('.processorm').hide();



})

.controller('SorryController', function ($scope) {



    $scope.message = 'This is Sorry screen';



})

.controller('blogStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrieveblogcard.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

    }])

	.controller('eventStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrieveeventcard.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

    }])

	.controller('videoStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrievevideocard.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

    }])

	.controller('evtbarShowCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrieveeventbar.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

    }])

	.controller('storiesStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrieveikshastorycardsec.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

		var searchmessage = angular.element(document.querySelector('.srchmsg'));

        var storyhead = angular.element(document.querySelector('.storyheading'));

		var authname = angular.element(document.querySelector('.storyauthorname'));

		var metadate = angular.element(document.querySelector('.metadate'));

		var metaview = angular.element(document.querySelector('.metaviews'));

		var metatype = angular.element(document.querySelector('.metatype'));

		var storyintro = angular.element(document.querySelector('.storyintroduce'));

		var captionhead1 = angular.element(document.querySelector('.sch1'));

		var captiontext1 = angular.element(document.querySelector('.sct1'));

		var storyconthead1 = angular.element(document.querySelector('.stconthead1'));

		var storycont1 = angular.element(document.querySelector('.stcont1'));

		var storyreadmore = angular.element(document.querySelector('.storyreadmore'));

		

        $scope.storyView = function (strId, strType) {

            alert("Story Id and type is "+strId+ strType);

			$('.busyfiller').show();

            $http.post("dataprocess/retrievestoryview.php", {'id': strId, 'type': strType})

                    .success(function (data, status, headers, config) {

                        storyhead.html('<divclass=\"\"><b>Processed</b></div>');

                        //$scope.result = data;

						if(data.length>0){

                        for (var i = 0; i < data.length; i++) {



                            storyhead.html('' + data[i].sname + '');

							metadate.html('<i class="material-icons">av_timer</i><div class="metainfotext">' + data[i].sdate + '</div>');

							metaview.html('<i class="material-icons">graphic_eq</i><div class="metainfotext">'+'</div>');

							metatype.html('<i class="material-icons">bubble_chart</i><div class="metainfotext">' + data[i].scat + '</div>');

							storyintro.html('' + data[i].storyintro + '');

							captionhead1.html('' + data[i].caption1head + '');

							captiontext1.html('' + data[i].caption1 + '');

							storyconthead1.html('' + data[i].sc1head+ '');

							storycont1.html('' + data[i].storycontent1+ '');

							storyreadmore.html('Read More');

                            $(function () {

                                var ht = 0;

                                var wt = 0;

                                ht = window.innerHeight;

                                wt = window.innerWidth;



                                $('.storyheaderimage').css({height: "100%", width: "100%", "position": "absolute", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "cover.jpg')"})

								$('.caption1').css({height: "200px", width: "100%", "position": "relative","display":"block","margin-top":"50px", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "caption1.jpg')"});

								$('.stimg1').css({height: "800px", width: "970px", "position": "relative","display":"block","margin-left":"auto","margin-right":"auto","margin-top":"50px", "background-position": "0px -10px", "background-size": "auto 100%", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "image1.jpg')"});

                                $('.storycontentview').show();

								$('.busyfiller').hide();

                            });

							 $http.post("dataprocess/retrieveuserdetail.php", {'id': data[i].uid})

                                        .success(function (data, status, headers, config) {

                                            //$scope.result = data;

                                            for (var i = 0; i < data.length; i++) {

                                                authname.html('' + data[i].usname + '');

												$('.storyauthorimage').css({height: "50px", width: "50px", "position": "relative", "background-position": "0px 0px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/users/user" + data[i].uid + ".jpg')","border-radius":"50%","float":"left"});

                                            }



                                        });

                        }

					}

					else{

						$('.searchmessage').show();

						searchmessage.html('We Are Exhausted, and Nothing Relative was Found.');

						

					}

                    });

					



        };



    }])

	.controller('swstoriesStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrieveikshastorycardsec.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

		var searchmessage = angular.element(document.querySelector('.srchmsgsw'));

        var storyhead = angular.element(document.querySelector('.storyheadingsw'));

		var authname = angular.element(document.querySelector('.storyauthornamesw'));

		var metadate = angular.element(document.querySelector('.metadatesw'));

		var metaview = angular.element(document.querySelector('.metaviewssw'));

		var metatype = angular.element(document.querySelector('.metatypesw'));

		var storyintro = angular.element(document.querySelector('.storyintroducesw'));

		var captionhead1 = angular.element(document.querySelector('.sch1sw'));

		var captiontext1 = angular.element(document.querySelector('.sct1sw'));

		var storyconthead1 = angular.element(document.querySelector('.stconthead1sw'));

		var storycont1 = angular.element(document.querySelector('.stcont1sw'));

		var storyreadmore = angular.element(document.querySelector('.storyreadmoresw'));

		

        $scope.storyView = function (strId, strType) {

            alert("Story Id and type is "+strId+ strType);

			$('.busyfiller').show();

            $http.post("dataprocess/retrievestoryview.php", {'id': strId, 'type': strType})

                    .success(function (data, status, headers, config) {

                        storyhead.html('<divclass=\"\"><b>Processed</b></div>');

                        //$scope.result = data;

						if(data.length>0){

                        for (var i = 0; i < data.length; i++) {



                            storyhead.html('' + data[i].sname + '');

							metadate.html('<i class="material-icons">av_timer</i><div class="metainfotext">' + data[i].sdate + '</div>');

							metaview.html('<i class="material-icons">graphic_eq</i><div class="metainfotext">'+'</div>');

							metatype.html('<i class="material-icons">bubble_chart</i><div class="metainfotext">' + data[i].scat + '</div>');

							storyintro.html('' + data[i].storyintro + '');

							captionhead1.html('' + data[i].caption1head + '');

							captiontext1.html('' + data[i].caption1 + '');

							storyconthead1.html('' + data[i].sc1head+ '');

							storycont1.html('' + data[i].storycontent1+ '');

							storyreadmore.html('Read More');

                            $(function () {

                                var ht = 0;

                                var wt = 0;

                                ht = window.innerHeight;

                                wt = window.innerWidth;



                                $('.storyheaderimage').css({height: "100%", width: "100%", "position": "absolute", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "cover.jpg')"})

								$('.caption1').css({height: "200px", width: "100%", "position": "relative","display":"block","margin-top":"50px", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "caption1.jpg')"});

								$('.stimg1').css({height: "800px", width: "970px", "position": "relative","display":"block","margin-left":"auto","margin-right":"auto","margin-top":"50px", "background-position": "0px -10px", "background-size": "auto 100%", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "image1.jpg')"});

                                $('.storycontentview').show();

								$('.busyfiller').hide();

                            });

							 $http.post("dataprocess/retrieveuserdetail.php", {'id': data[i].uid})

                                        .success(function (data, status, headers, config) {

                                            //$scope.result = data;

                                            for (var i = 0; i < data.length; i++) {

                                                authname.html('' + data[i].usname + '');

												$('.storyauthorimage').css({height: "50px", width: "50px", "position": "relative", "background-position": "0px 0px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/users/user" + data[i].uid + ".jpg')","border-radius":"50%","float":"left"});

                                            }



                                        });

                        }

					}

					else{

						$('.searchmessage').show();

						searchmessage.html('We Are Exhausted, and Nothing Relative was Found.');

						

					}

                    });

					



        };



    }])

	.controller('blstoriesStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrievebloodstorycardsec.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

		var searchmessage = angular.element(document.querySelector('.srchmsgbl'));

        var storyhead = angular.element(document.querySelector('.storyheadingbl'));

		var authname = angular.element(document.querySelector('.storyauthornamebl'));

		var metadate = angular.element(document.querySelector('.metadatebl'));

		var metaview = angular.element(document.querySelector('.metaviewsbl'));

		var metatype = angular.element(document.querySelector('.metatypebl'));

		var storyintro = angular.element(document.querySelector('.storyintroducebl'));

		var captionhead1 = angular.element(document.querySelector('.sch1bl'));

		var captiontext1 = angular.element(document.querySelector('.sct1bl'));

		var storyconthead1 = angular.element(document.querySelector('.stconthead1bl'));

		var storycont1 = angular.element(document.querySelector('.stcont1bl'));

		var storyreadmore = angular.element(document.querySelector('.storyreadmorebl'));

		

        $scope.storyView = function (strId, strType) {

            alert("Story Id and type is "+strId+ strType);

			$('.busyfiller').show();

            $http.post("dataprocess/retrievestoryview.php", {'id': strId, 'type': strType})

                    .success(function (data, status, headers, config) {

                        storyhead.html('<divclass=\"\"><b>Processed</b></div>');

                        //$scope.result = data;

						if(data.length>0){

                        for (var i = 0; i < data.length; i++) {



                            storyhead.html('' + data[i].sname + '');

							metadate.html('<i class="material-icons">av_timer</i><div class="metainfotext">' + data[i].sdate + '</div>');

							metaview.html('<i class="material-icons">graphic_eq</i><div class="metainfotext">'+'</div>');

							metatype.html('<i class="material-icons">bubble_chart</i><div class="metainfotext">' + data[i].scat + '</div>');

							storyintro.html('' + data[i].storyintro + '');

							captionhead1.html('' + data[i].caption1head + '');

							captiontext1.html('' + data[i].caption1 + '');

							storyconthead1.html('' + data[i].sc1head+ '');

							storycont1.html('' + data[i].storycontent1+ '');

							storyreadmore.html('Read More');

                            $(function () {

                                var ht = 0;

                                var wt = 0;

                                ht = window.innerHeight;

                                wt = window.innerWidth;



                                $('.storyheaderimage').css({height: "100%", width: "100%", "position": "absolute", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "cover.jpg')"})

								$('.caption1').css({height: "200px", width: "100%", "position": "relative","display":"block","margin-top":"50px", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "caption1.jpg')"});

								$('.stimg1').css({height: "800px", width: "970px", "position": "relative","display":"block","margin-left":"auto","margin-right":"auto","margin-top":"50px", "background-position": "0px -10px", "background-size": "auto 100%", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "image1.jpg')"});

                                $('.storycontentview').show();

								$('.busyfiller').hide();

                            });

							 $http.post("dataprocess/retrieveuserdetail.php", {'id': data[i].uid})

                                        .success(function (data, status, headers, config) {

                                            //$scope.result = data;

                                            for (var i = 0; i < data.length; i++) {

                                                authname.html('' + data[i].usname + '');

												$('.storyauthorimage').css({height: "50px", width: "50px", "position": "relative", "background-position": "0px 0px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/users/user" + data[i].uid + ".jpg')","border-radius":"50%","float":"left"});

                                            }



                                        });

                        }

					}

					else{

						$('.searchmessage').show();

						searchmessage.html('We Are Exhausted, and Nothing Relative was Found.');

						

					}

                    });

					



        };



    }])

	.controller('grstoriesStoreCtrl', ['$scope', '$http', function ($scope, $http) {

        $http.get("dataprocess/retrievegreenstorycardsec.php")

                .success(function (data) {

                    $scope.data = data;

                })

                .error(function () {

                    $scope.data = "error in fetching data";

                });

		var searchmessage = angular.element(document.querySelector('.srchmsggr'));

        var storyhead = angular.element(document.querySelector('.storyheadinggr'));

		var authname = angular.element(document.querySelector('.storyauthornamegr'));

		var metadate = angular.element(document.querySelector('.metadategr'));

		var metaview = angular.element(document.querySelector('.metaviewsgr'));

		var metatype = angular.element(document.querySelector('.metatypegr'));

		var storyintro = angular.element(document.querySelector('.storyintroducegr'));

		var captionhead1 = angular.element(document.querySelector('.sch1gr'));

		var captiontext1 = angular.element(document.querySelector('.sct1gr'));

		var storyconthead1 = angular.element(document.querySelector('.stconthead1gr'));

		var storycont1 = angular.element(document.querySelector('.stcont1gr'));

		var storyreadmore = angular.element(document.querySelector('.storyreadmoregr'));

		

        $scope.storyView = function (strId, strType) {

            alert("Story Id and type is "+strId+ strType);

			$('.busyfiller').show();

            $http.post("dataprocess/retrievestoryview.php", {'id': strId, 'type': strType})

                    .success(function (data, status, headers, config) {

                        storyhead.html('<divclass=\"\"><b>Processed</b></div>');

                        //$scope.result = data;

						if(data.length>0){

                        for (var i = 0; i < data.length; i++) {



                            storyhead.html('' + data[i].sname + '');

							metadate.html('<i class="material-icons">av_timer</i><div class="metainfotext">' + data[i].sdate + '</div>');

							metaview.html('<i class="material-icons">graphic_eq</i><div class="metainfotext">'+'</div>');

							metatype.html('<i class="material-icons">bubble_chart</i><div class="metainfotext">' + data[i].scat + '</div>');

							storyintro.html('' + data[i].storyintro + '');

							captionhead1.html('' + data[i].caption1head + '');

							captiontext1.html('' + data[i].caption1 + '');

							storyconthead1.html('' + data[i].sc1head+ '');

							storycont1.html('' + data[i].storycontent1+ '');

							storyreadmore.html('Read More');

                            $(function () {

                                var ht = 0;

                                var wt = 0;

                                ht = window.innerHeight;

                                wt = window.innerWidth;



                                $('.storyheaderimage').css({height: "100%", width: "100%", "position": "absolute", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "cover.jpg')"})

								$('.caption1').css({height: "200px", width: "100%", "position": "relative","display":"block","margin-top":"50px", "background-position": "0px -10px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "caption1.jpg')"});

								$('.stimg1').css({height: "800px", width: "970px", "position": "relative","display":"block","margin-left":"auto","margin-right":"auto","margin-top":"50px", "background-position": "0px -10px", "background-size": "auto 100%", "background-repeat": "no-repeat", "background-image": "url('files/images/stories/" + data[i].rsid + "image1.jpg')"});

                                $('.storycontentview').show();

								$('.busyfiller').hide();

                            });

							 $http.post("dataprocess/retrieveuserdetail.php", {'id': data[i].uid})

                                        .success(function (data, status, headers, config) {

                                            //$scope.result = data;

                                            for (var i = 0; i < data.length; i++) {

                                                authname.html('' + data[i].usname + '');

												$('.storyauthorimage').css({height: "50px", width: "50px", "position": "relative", "background-position": "0px 0px", "background-size": "100% auto", "background-repeat": "no-repeat", "background-image": "url('files/images/users/user" + data[i].uid + ".jpg')","border-radius":"50%","float":"left"});

                                            }



                                        });

                        }

					}

					else{

						$('.searchmessage').show();

						searchmessage.html('We Are Exhausted, and Nothing Relative was Found.');

						

					}

                    });

					



        };



    }])

	.controller('bloodcheckCtrl', function ($scope,$http) {

	$('.processor').hide();

	

$scope.blooddonatedata = function() {

	             $('.formbtn').hide();

				 $('.processor').show();

				 var myEl = angular.element( document.querySelector( '.sucres' ) );

				 //alert(''+$scope.contact+','+$scope.name+','+$scope.bldgrp+','+$scope.city);

				 

				$http.post("dataprocess/blooddonatecheck.php",{'contact':$scope.contact})

					.success(function(data,status,headers,config){

						$scope.result = data;

						

						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

						if(data.trim()==='correct'){

							myEl.html('<divclass=\"\"><b>Contact Already Exists</b></div>');

							$('.formbtn').show();

							$('.processor').hide();

						}

						else{

							//myEl.html('<divclass=\"\"><b>Request Processing...</b></div>');

							var rl='user';

							//alert($scope.name+$scope.password);

							$http.post("dataprocess/blddonatedata.php",{'name':$scope.name,'contact':$scope.contact,'bldgrp':$scope.bldgrp,'city':$scope.city})

							.success(function(data,status,headers,config){

								//myEl.html('<divclass=\"\"><b>Processed</b></div>');

								$scope.result = data;

								if(data.trim()==='created'){								

								myEl.html('Thanks <b>'+$scope.name+'!<b>,');

								$scope.cres='We have successfully recieved your response  regarding your interest to be part of our Blood Heroes.';

								$('.formbtn').show();

								$('.processor').hide();

						    	}							

							});

						}

					});

				 

	}

})

.controller('newsletterCtrl', function ($scope,$http) {

	$('.processornw').hide();

	

$scope.newsletterdata = function() {

	             $('.newsformbtn').hide();

				 $('.processornw').show();

				 var myEl = angular.element( document.querySelector( '.sucresnw' ) );

				 //alert(''+$scope.contact+','+$scope.name+','+$scope.bldgrp+','+$scope.city);

				 

				$http.post("dataprocess/newsmailcheck.php",{'email':$scope.email})

					.success(function(data,status,headers,config){

						$scope.result = data;

						

						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

						if(data.trim()==='correct'){

							myEl.html('<divclass=\"\"><b>email Already Exists</b></div>');

							$('.newsformbtn').show();

							$('.processornw').hide();

						}

						else{

							//myEl.html('<divclass=\"\"><b>Request Processing...</b></div>');

							var rl='user';

							//alert($scope.name+$scope.password);

							$http.post("dataprocess/newsdata.php",{'email':$scope.email})

							.success(function(data,status,headers,config){

								//myEl.html('<divclass=\"\"><b>Processed</b></div>');

								$scope.result = data;

								if(data.trim()==='created'){								

								myEl.html('Thanks for your email:  <b>'+$scope.email+'<b>,');

								$scope.cresnw='We will now send newsletters, having exciting stuff, Events and our work.';

								$('.newsformbtn').show();

								$('.processornw').hide();

								$('.newsletterform').transition({y:-25},1000,'snap');

						    	}							

							});

						}

					});

				 

	}

})

.directive('mapCanvas', function() {

  return {

    restrict: 'E',

    link: function() {

		var image = 'http://www.helpinghandsgroup.in/images/marker.png';

  var map = new google.maps.Map(document.getElementById('map'), {

    center: {lat: 23.213525, lng: 77.459423},

    zoom: 16,scrollwheel: false,

    mapTypeId: google.maps.MapTypeId.ROADMAP

  });

  var beachMarker = new google.maps.Marker({

          position: {lat: 23.213525230915852, lng: 77.4594231764786},

          map: map,

          icon: image

        });

  

}

  };

})

.directive('routeLoadingIndicator', function($rootScope) {

  return {

    restrict: 'E',

    template: "<div ng-show='isRouteLoading' class='loading-indicator'>" +

    "<div class='loading-indicator-body'>" +

    "<h3 class='loading-title'>Loading...</h3>" +

    "<div class='spinner'><rotating-plane-spinner></rotating-plane-spinner></div>" +

    "</div>" +

    "</div>",

    replace: true,

    link: function(scope, elem, attrs) {

      scope.isRouteLoading = false;

 

      $rootScope.$on('$routeChangeStart', function() {

        scope.isRouteLoading = true;

      });

      $rootScope.$on('$routeChangeSuccess', function() {

        scope.isRouteLoading = false;

      });

    }

  };

})

.controller('contactpageCtrl', function ($scope,$http) {

	$('.processorxw').hide();

	

$scope.contactpagedata = function() {

	             $('.contactpgformbtn').hide();

				 $('.processorxw').show();

				 var myEl = angular.element( document.querySelector( '.succnpg' ) );

							//alert($scope.name+$scope.password);

							$http.post("dataprocess/contactdata.php",{'name':$scope.namec,'contact':$scope.contactc,'email':$scope.emailc,'purpose':$scope.prpse,'summary':$scope.summary})

							.success(function(data,status,headers,config){

								//myEl.html('<divclass=\"\"><b>Processed</b></div>');

								$scope.result = data;

								if(data.trim()==='created'){								

								$scope.cresxw='Thanks '+ $scope.namec+'! for contacting us.A response email will be sent to you accordingly.';

								$('.contactpgformbtn').show();

								$('.processorxw').hide();

								$('.formholder').transition({y:-20},1000,'snap');

						    	}							

							});

						

					

				 

	}

})

.controller('donatePageCtrl', function ($scope,$http) {

	$scope.truefalse=true;

	

	$scope.val1=500;

	var $valcat1=1;  //number of children

	$scope.val1cat=1;

	$scope.childval= 'child';

	

	$scope.val2=1000;

	var $valcat2=1;  //3 cat, 1=1 activity, 2= monthly activity, 3= qtrly activity

	$scope.val2cat='One Activity';

	

	$scope.val3=4000;

	var $valcat3=1;  //festival

	$scope.val3cat='Republic Day';

	

	$scope.val4=3000;

	var $valcat4=1;  //4 cat, 1=a month,2= 3 months, 3= 6 months, 4= a year 

	$scope.val4cat='a month';

	

	$scope.valsw=3000;

	var $valcatsw=1;  //2 cat, 1=session,2= swabhiman

	$scope.valswcat='Session';

	

	$scope.val5=2000;

	var $valcat5=50;  //x50 multiples trees

	$scope.val5cat=50;

	

	$scope.val6=6000;

	var $valcat6=100;  // x100 multiples people

	$scope.val6cat=100;

	

	$scope.val7=500;

	var $valcat7=5;  // number of volunteer

	$scope.val7cat=5;

	

	$scope.val8=3000;

	var $valcat8=1;  // number of volunteer

	$scope.val8cat='In School';

	

	$scope.val9=1000;

	var $valcat9=1;  // number of volunteer

	$scope.val9cat='Health Camp';

	

	$scope.val10=1000;

	var $valcat10=1;  // number of volunteer

	$scope.val10cat='Workshop';

	

	$scope.valx=200;

	$scope.donatevaluex=300;

	

	$scope.valAdd1 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 var $value1=$scope.val1+500;

				 $valcat1=$valcat1+1;

				 $scope.val1cat=$valcat1;

				 $scope.val1=$value1;

				 if($valcat1>1){

					 $scope.childval= 'children';

				 }

	}

	$scope.valMinus1 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($scope.val1>=1000)

				 {

				 	var $value1=$scope.val1-500;					

				 	$valcat1=$valcat1-1;

				 	$scope.val1cat=$valcat1;

				 	$scope.val1=$value1;

					if($valcat1<2){

					 $scope.childval= 'child';

				 }

				 }				 

	}

	$scope.valAdd2 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcat2<=2)

				 {

				 	var $value2=$scope.val2+1000;					

				 	$valcat2=$valcat2+1;

					if($valcat2==1){						

				 		$scope.val2cat='One Activity';

					}

					else if($valcat2==2){						

				 		$scope.val2cat='One Monthly Activity';

					}

					else if($valcat2==3){						

				 		$scope.val2cat='One Quarterly Activity';

					}

				 	$scope.val2=$value2;

				 }					 

	}

	$scope.valMinus2 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcat2>=2)

				 {

				 	var $value2=$scope.val2-1000;					

				 	$valcat2=$valcat2-1;

					if($valcat2==1){						

				 		$scope.val2cat='One Activity';

					}

					else if($valcat2==2){						

				 		$scope.val2cat='One Monthly Activity';

					}

				 	$scope.val2=$value2;

				 }				 

	}

	$scope.valAdd3 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcat3<=8)

				 {

				 	//var $value3=$scope.val3+5000;					

				 	$valcat3=$valcat3+1;

					if($valcat3==1){						

				 		$scope.val3cat='Republic Day';

					}

					else if($valcat3==2){						

				 		$scope.val3cat='Holi';

					}

					else if($valcat3==3){						

				 		$scope.val3cat='Independence Day';

					}

					else if($valcat3==4){						

				 		$scope.val3cat='Children\'s Day';

					}

					else if($valcat3==5){						

				 		$scope.val3cat='Mahatma Gandhi Jayanti';

					}

					else if($valcat3==6){						

				 		$scope.val3cat='Diwali';

					}

					else if($valcat3==7){						

				 		$scope.val3cat='Christmas';

					}

					else if($valcat3==8){						

				 		$scope.val3cat='New Year';

					}

					else if($valcat3==9){						

				 		$scope.val3cat='ID';

					}

				 	//$scope.val3=$value3;

				 }					 

	}

	$scope.valMinus3 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				  if($valcat3>=2)

				 {

				 	//var $value3=$scope.val3+5000;					

				 	$valcat3=$valcat3-1;

					if($valcat3==1){						

				 		$scope.val3cat='Republic Day';

					}

					else if($valcat3==2){						

				 		$scope.val3cat='Holi';

					}

					else if($valcat3==3){						

				 		$scope.val3cat='Independence Day';

					}

					else if($valcat3==4){						

				 		$scope.val3cat='Children\'s Day';

					}

					else if($valcat3==5){						

				 		$scope.val3cat='Mahatma Gandhi Jayanti';

					}

					else if($valcat3==6){						

				 		$scope.val3cat='Diwali';

					}

					else if($valcat3==7){						

				 		$scope.val3cat='Christmas';

					}

					else if($valcat3==8){						

				 		$scope.val3cat='New Year';

					}

				 	//$scope.val3=$value3;

				 }					 

	}

	$scope.valAdd4 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcat4<=3)

				 {

				 	var $value4=$scope.val4;			

				 	$valcat4=$valcat4+1;

					if($valcat4==1){						

				 		$scope.val4cat='a month';

						var $value4=3000*1;

					}

					else if($valcat4==2){						

				 		$scope.val4cat='3 months';

						var $value4=3000*3;

					}

					else if($valcat4==3){						

				 		$scope.val4cat='6 months';

						var $value4=3000*6;

					}

					else if($valcat4==4){						

				 		$scope.val4cat='a year';

						var $value4=3000*12;

					}

				 	$scope.val4=$value4;

				 }					 

	}

	$scope.valMinus4 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcat4>=2)

				 {

				 	var $value4=$scope.val4;			

				 	$valcat4=$valcat4-1;

					if($valcat4==1){						

				 		$scope.val4cat='a month';

						var $value4=3000*1;

					}

					else if($valcat4==2){						

				 		$scope.val4cat='3 months';

						var $value4=3000*3;

					}

					else if($valcat4==3){						

				 		$scope.val4cat='6 months';

						var $value4=3000*6;

					}

				 	$scope.val4=$value4;

				 }				 

	}

	

	$scope.valAddsw = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcatsw<=1)

				 {

				 	var $valuesw=$scope.valsw;			

				 	$valcatsw=$valcatsw+1;

					if($valcatsw==1){						

				 		$scope.valswcat='Session';

						var $valuesw=3000;

					}

					else if($valcatsw==2){						

				 		$scope.valswcat='Seminar';

						var $valuesw=15000;

					}

				 	$scope.valsw=$valuesw;

				 }					 

	}

	$scope.valMinussw = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcatsw>=2)

				 {

				 	var $valuesw=$scope.valsw;			

				 	$valcatsw=$valcatsw-1;

					if($valcatsw==1){						

				 		$scope.valswcat='Session';

						var $valuesw=3000;

					}

				 	$scope.valsw=$valuesw;

				 }				 

	}

	

	$scope.valAdd5 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 var $value5=$scope.val5+2000;

				 $valcat5=$valcat5+50;

				 $scope.val5cat=$valcat5;

				 $scope.val5=$value5;				 

	}

	$scope.valMinus5 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($scope.val5>=4000)

				 {

				 	var $value5=$scope.val5-2000;					

				 	$valcat5=$valcat5-50;

				 	$scope.val5cat=$valcat5;

				 	$scope.val5=$value5;

				 }				 

	}

	$scope.valAdd6 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 var $value6=$scope.val6;

				 if($scope.val6<=24000){

					$value6=$scope.val6+6000;

				 	$valcat6=$valcat6+100;

				 	$scope.val6cat=$valcat6;

				 	$scope.val6=$value6;	

				 }

				 			 

	}

	$scope.valMinus6 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 var $value6=$scope.val6;

				 if($scope.val6>=12000)

				 {

				 	$value6=$scope.val6-6000;					

				 	$valcat6=$valcat6-100;

				 	$scope.val6cat=$valcat6;

				 	$scope.val6=$value6;

				 }				 

	}

	$scope.valAdd7 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				var $value7=$scope.val7;

				$value7=$scope.val7+500;

				$valcat7=$valcat7+5;

				$scope.val7cat=$valcat7;

				$scope.val7=$value7;	



				 			 

	}

	$scope.valMinus7 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 var $value7=$scope.val7;

				 if($scope.val7>=1000)

				 {

				 	$value7=$scope.val7-500;					

				 	$valcat7=$valcat7-5;

				 	$scope.val7cat=$valcat7;

				 	$scope.val7=$value7;

				 }				 

	}

	$scope.valAdd8 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				if($valcat8<=2)

				 {

				 	var $value8=$scope.val8;			

				 	$valcat8=$valcat8+1;

					if($valcat8==1){						

				 		$scope.val8cat='In School';

						var $value8=3000;

					}

					else if($valcat8==2){						

				 		$scope.val8cat='In College';

						var $value8=4000;

					}

					else if($valcat8==3){						

				 		$scope.val8cat='At My Place';

						var $value8=6000;

					}

				 	$scope.val8=$value8;

				 }	



				 			 

	}

	$scope.valMinus8 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($valcat8>=2)

				 {

				 	var $value8=$scope.val8;			

				 	$valcat8=$valcat8-1;

					if($valcat8==1){						

				 		$scope.val8cat='In School';

						var $value8=3000;

					}

					else if($valcat8==2){						

				 		$scope.val8cat='In College';

						var $value8=4000;

					}

				 	$scope.val8=$value8;

				 }				 

	}

	

	$scope.valAdd9 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($scope.val9<=19500)

				 {

				 	var $value9=$scope.val9+500;

				 	$scope.val9=$value9;

				 }

	}

	$scope.valMinus9 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($scope.val9>=1500)

				 {

				 	var $value9=$scope.val9-500;

				 	$scope.val9=$value9;

					

				 }				 

	}

	$scope.valAdd10 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($scope.val10<=19500)

				 {

				 	var $value10=$scope.val10+500;

				 	$scope.val10=$value10;

				 }

	}

	$scope.valMinus10 = function() {

				 //var myEl = angular.element( document.querySelector( '.succnpg' ) );

				 if($scope.val10>=1500)

				 {

				 	var $value10=$scope.val10-500;

				 	$scope.val10=$value10;

					

				 }				 

	}

	

	$scope.valData1 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val1);

			$(".finaldonateCat").val("iKSHA Education");

			$(".finaldonateOV").val("For " + $scope.val1cat+ " " +$scope.childval + " for a month");

			$scope.trans();

		});

	}

	$scope.valData2 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val2);

			$(".finaldonateCat").val("iKSHA Activities");

			$(".finaldonateOV").val("For " + $scope.val2cat);

			$scope.trans();

		});

	}

	$scope.valData3 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val3);

			$(".finaldonateCat").val("Festivals");

			$(".finaldonateOV").val("For " + $scope.val3cat);

			$scope.trans();

		});

	}

	$scope.valData4 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val4);

			$(".finaldonateCat").val("iKSHA Centre Expenditure");

			$(".finaldonateOV").val("For " + $scope.val4cat);

			$scope.trans();

		});

	}

	$scope.valData5 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.valsw);

			$(".finaldonateCat").val("Swabhiman");

			$(".finaldonateOV").val("For " + $scope.valswcat);

			$scope.trans();

		});

	}

	$scope.valData6 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val5);

			$(".finaldonateCat").val("Plantation");

			$(".finaldonateOV").val("For " + $scope.val5cat + " Trees");

			$scope.trans();

		});

	}

	$scope.valData7 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val6);

			$(".finaldonateCat").val("Blood Heroes");

			$(".finaldonateOV").val("For Blood Test and Donation by " + $scope.val6cat + " Persons");

			$scope.trans();

		});

	}

	$scope.valData8 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val7);

			$(".finaldonateCat").val("Volunteer");

			$(".finaldonateOV").val("For Encouraging " + $scope.val7cat + " Volunteers");

			$scope.trans();

		});

	}

	$scope.valData9 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val8);

			$(".finaldonateCat").val("Promotions");

			$(".finaldonateOV").val("For Event " + $scope.val8cat);

			$scope.trans();

		});

	}

	$scope.valData10 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val9);

			$(".finaldonateCat").val("Health Camp");

			$(".finaldonateOV").val("Funds for Health Camp");

			$scope.trans();

		});

	}

	$scope.valData11 = function() {

		console.log("Gotye!");

		$(function () {

			$(".finaldonateAmt").val($scope.val10);

			$(".finaldonateCat").val("Workshop");

			$(".finaldonateOV").val("Funds for Workshop");

			$scope.trans();

		});

	}

	$scope.simplePay = function() {

		

		$(function () {

			var spi=$scope.donatevaluex;

			if(isNaN(spi)){

				console.log("It's Not a Number");

				$('.spmsg').text("Please Enter Valid Amount");

			}

			else{

				console.log("00000");

				$('.spmsg').text("");

				if(spi<=99){

					$('.spmsg').text("We accept donations above ₹ 200 only");

				}

				else{

					$(".finaldonateAmt").val(spi);

					$(".finaldonateCat").val("Simple Donate");

					$scope.trans();

				}

				

			}

			

		});

					 

	}

	

	$scope.trans=function(){

		$(function () {

			$('.donorbox').transition({x:-360},400,'snap');

			$('.dbbodycover').css({display:"block"});

		});

	}

	$scope.dbCover = function() {

		$(function () {

			$('.donorbox').transition({x:0},300,'snap');

			$('.dbbodycover').css({display:"none"});

		});

	}

})

.controller('memberformCtrl', function ($scope,$http) {

	$('.processorm').hide();

	$scope.disvalue=false;

	$scope.useravail='';

	

$scope.memberformdata = function() {

	             $('.memformbtn').hide();

				 $('.processorm').show();

				 var myEl = angular.element( document.querySelector( '.sucresm' ) );

				 //alert(''+$scope.contact+','+$scope.name+','+$scope.bldgrp+','+$scope.city);

				 if($scope.passwordm===$scope.password1m){

				$http.post("dataprocess/membercheck.php",{'contact':$scope.contactm,'email':$scope.emailm})

					.success(function(data,status,headers,config){

						$scope.result = data;

						

						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

						if(data.trim()==='correct'){

							//myEl.html('<divclass=\"\"><b>Some Details Already Exists</b></div>');

							$scope.cresm='Email or contact already exists, please login in members area';

							$('.memformbtn').show();

							$('.processorm').hide();

						}

						else{

							$http.post("dataprocess/usernamecheck.php",{'username':$scope.usernamem})

					.success(function(data,status,headers,config){

						$scope.result = data;

						

						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

						if(data.trim()==='correct'){

							//myEl.html('<divclass=\"\"><b>Some Details Already Exists</b></div>');

							$scope.cresm='Username already exists, please login in members area';

							$('.memformbtn').show();

							$('.processorm').hide();

						}

						else{

							$http.post("dataprocess/memberdata.php",{'name':$scope.namem,'username':$scope.usernamem,'password':$scope.passwordm,'email':$scope.emailm,'contact':$scope.contactm,'city':$scope.citym,'address':$scope.addressm})

							.success(function(data,status,headers,config){

								//myEl.html('<divclass=\"\"><b>Processed</b></div>');

								$scope.result = data;

								if(data.trim()==='created'){

								$scope.cresm='Account Created. Please login & Verify by code sent to your email.';

								$('.memformbtn').show();

								$('.processorm').hide();

						    	}

							});

                        }

							

                    });

                }

                });

				 }

				 else{

					 $scope.cresm='Passwords didn\'t matched';

					 $('.memformbtn').show();

					 $('.processorm').hide();

				 }

}

})

.controller('volunteerformCtrl', function ($scope,$http) {

	$('.processorv').hide();

	

$scope.volunteerformdata = function() {

	             $('.volformbtn').hide();

				 $('.processorv').show();

				 var myEl = angular.element( document.querySelector( '.sucresv' ) );

				 ///alert(''+$scope.contactv);

				 

				$http.post("dataprocess/volunteercheck.php",{'contact':$scope.contactv})

					.success(function(data,status,headers,config){

						$scope.result = data;

						

						//myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

					//console.log(data);

						if(data.trim()==='correct'){

							//myEl.html('<divclass=\"\"><b>Contact Already Exists</b></div>');

							$scope.cresv='Contact Already Exists';

							$('.volformbtn').show();

							$('.processorv').hide();

						}

						else{

							//myEl.html('<divclass=\"\"><b>Request Processing...</b></div>');

							var rl='user';

							//alert($scope.name+$scope.password);

							$http.post("dataprocess/volunteerdata.php",{'name':$scope.namev,'email':$scope.emailv,'contact':$scope.contactv,'city':$scope.cityv,'address':$scope.addressv,'about':$scope.aboutv})

							.success(function(data,status,headers,config){

								//myEl.html('<divclass=\"\"><b>Processed</b></div>');

								//console.log(data);

								$scope.result = data;

								if(data.trim()==='created'){								

								$scope.cresv='Thank You for Registering. An email has been sent to you.';

								$('.volformbtn').show();

								$('.processorv').hide();

						    	}							

							});

						}

					});

				 

	}

});