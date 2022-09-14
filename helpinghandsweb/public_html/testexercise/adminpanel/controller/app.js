 angular.module('orgApp', ['ngRoute', 'ngMaterial', 'ngMessages'])

//Define Routing for app
//Uri /AddNewOrder -> template add_order.html and Controller AddOrderController
//Uri /ShowOrders -> template show_orders.html and Controller AddOrderController

        .config(['$routeProvider',
            function ($routeProvider) {
                $routeProvider.
                        when('/Home', {
                            templateUrl: 'views/home.php',
                            controller: 'HomeController'
                        }).
                        when('/Notifications', {
                            templateUrl: 'views/notifications.php',
                            controller: 'NotificationController'
                        }).                        
                        when('/Users', {
                            templateUrl: 'views/users.php',
                            controller: 'usersController'
                        }).                        
                        when('/UserView', {
                            templateUrl: 'views/userview.php',
                            controller: 'userViewController'
                        }).
                        when('/Settings', {
                            templateUrl: 'views/settings.php',
                            controller: 'SettingsController'
                        }).
                        otherwise({
                            redirectTo: '/Home'
                        });
            }])
        .config(['$mdIconProvider', function ($mdIconProvider) {
                $mdIconProvider.icon('md-close', 'img/icons/ic_close_24px.svg', 24);
            }])
        .config(function ($mdThemingProvider) {
            $mdThemingProvider.theme('docs-dark', 'default')
                    .primaryPalette('yellow')
                    .dark();
            $mdThemingProvider.theme('dark-grey').backgroundPalette('grey').dark();
            $mdThemingProvider.theme('dark-orange').backgroundPalette('orange').dark();
            $mdThemingProvider.theme('dark-purple').backgroundPalette('deep-purple').dark();
            $mdThemingProvider.theme('dark-blue').backgroundPalette('blue').dark();
        })
        
          
        .controller('AppController', function ($scope,$rootScope, $timeout, $mdSidenav, $log, $location, $http, passService) {
            $scope.fmbr = true;
            $scope.fchf = true;
            $scope.fedt = true;
            $scope.fadm = true;
            $scope.newStory = function () {
                passService.setid("");
                //console.log("passed-"+id);
                $location.path("/Editor");
            }
            $rootScope.$on('$routeChangeStart', function() {
                //console.log("Root Change Started");
                $scope.indexactivated=false;
            });

            $rootScope.$on('$routeChangeSuccess', function() {
                //console.log("Root Change Finished");
                $scope.indexactivated=true;
            });

             $http.get("service/userprofcheck.php")
                    .success(function (data, status, headers, config) {
                        $scope.data = data;

                    })
                    .error(function () {
                        $scope.data = "error in fetching data";
                        window.location = "../";
                    });
            
            $scope.message = 'This is App Controller';
            $scope.toggleLeft = buildDelayedToggler('left');
            function debounce(func, wait, context) {
                var timer;

                return function debounced() {
                    var context = $scope,
                            args = Array.prototype.slice.call(arguments);
                    $timeout.cancel(timer);
                    timer = $timeout(function () {
                        timer = undefined;
                        func.apply(context, args);
                    }, wait || 10);
                };
            }
            function buildDelayedToggler(navID) {
                return debounce(function () {
                    // Component lookup should always be available since we are not using `ng-if`
                    $mdSidenav(navID)
                            .toggle()
                            .then(function () {
                                $log.debug("toggle " + navID + " is done");
                            });
                }, 200);
            }
            $scope.logoutCtrl = function () {
                $http.post("service/logout.php", {})
                        .success(function (data, status, headers, config) {

                            //$scope.responsev='Verification Data Posted'+data;
                            //alert(data);
                            if (data.trim() === 'correct') {
                                window.location = "../";
                            } else {
                                //alert($scope.name+$scope.password);
                                //$scope.responsev='Incorrect Verification Code';
                                window.location = "../";
                            }
                        });
            }
            $scope.settingsCtrl = function () {
                $location.path("/Settings");
            }
            $scope.userView = function(id) {
                passService.setid(id);
                    //console.log("passed-"+id);
                    $location.path("/UserView"); 
            }
            $scope.listNotify = function(id) {
                $http.post("service/changeslist.php", {})
                        .success(function (data, status, headers, config) {
                            $scope.notifdata= data;                
                        });
            }

        })
        .controller('HomeController', function ($scope) {
              $scope.message = 'Home';
              
        })
        .service('passService', function () {
            var userid = "";
            var setid = function (id) {
                userid = id;
            };
            var getid = function () {
                return userid;
            };
            return {
                setid: setid,
                getid: getid
            };
        })

        .controller('userCreateCtrl', function ($scope, $http) {
            $scope.ucProgress=true;
            $scope.userFName="";
            $scope.userLName="";
            $scope.userName="";
            $scope.userPassword="";
            $scope.userCPassword="";
            //$scope.activated = true;

            $scope.response='';

            $scope.signListener = function() {

                 $('.signbtn').hide();

                 //$('.processor').show();  

                 $scope.ucProgress = false;           

                 //var myEl = angular.element( document.querySelector( '.includediv' ) );

                    $http.post("service/usercheck.php",{'username':$scope.userName})

                    .success(function(data,status,headers,config){

                        $scope.result = data;

                        console.log(data);

                        //myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

                        if(data.trim()==='correct'){

                            //myEl.html('<divclass=\"\"><b>Some Details Already Exists</b></div>');

                            $scope.response='Username already exists, please login in members area';


                            $scope.ucProgress = true;

                        }

                        else{

                            $http.post("service/usersign.php",{'fname':$scope.userFName,'lname':$scope.userLName,'username':$scope.userName,'password':$scope.userPassword})

                            .success(function(data,status,headers,config){

                                //myEl.html('<divclass=\"\"><b>Processed</b></div>');

                                $scope.result = data;

                                console.log(data);


                                if(data.trim()==='created'){

                                $scope.response='Account Created';

                                $scope.ucProgress = true;

                                }

                                else{

                                    $scope.sresponse='Something went wrong.If this continues please contact technical administrator.';

                                    //

                                    $scope.ucProgress = true;

                                }

                            });

                        }

                            

                    });

                 

    }
        })
        .controller('userViewController', function ($scope, $http, $mdDialog, passService) {
            $scope.userId = passService.getid();
            $http.post("service/userviewdata.php", {'id': $scope.userId})
                        .success(function (data, status, headers, config) {
                            console.log(data);
                            $scope.userdata = data;
                            $scope.activated = true;
                            //console.log($scope.userdata);
                            
                        });
        })
        
        .controller('usersController', function ($scope, $http, $mdDialog, passService, $location) {
            $scope.ucProgress=true;
            $scope.userFName="";
            $scope.userLName="";
            $scope.userName="";
            $scope.userPassword="";
            $scope.userCPassword="";

            $scope.useract = false;
            $scope.profileimghash="profile.jpg";

            $(function () {
                    $scope.userListRetrieve();
                });

            $scope.userListRetrieve = function () {
                $http.get("service/userlist.php")
                    .success(function (data) {
                        $scope.data = data;
                        $scope.useract = true;                      
                    })
                    .error(function () {
                        $scope.data = "error in fetching data";
                    });
                }
            $scope.userView = function (userid) {
                $mdDialog.show({
                    locals: {dataToPass: userid},
                    controller: userViewCtrl,
                    templateUrl: 'views/templates/dialog.tmpl.php',
                    parent: angular.element(document.body),
                    clickOutsideToClose: true, // Only for -xs, -sm breakpoints.
                    fullscreen: true
                })
                        .then(function (answer) {
                            $scope.status = 'Changes Applied.';
                        }, function () {
                            $scope.status = 'No Changes Applied';
                        });
            };
            function userViewCtrl($scope, $http, dataToPass, passService, $location) {
                $scope.msg = dataToPass;
                $scope.profileimghash="profile.jpg";
                $scope.activated = false;
                $http.post("service/singleuserdata.php", {'id': $scope.msg})
                        .success(function (data, status, headers, config) {
                            $scope.userdata = data;
                            $scope.activated = true;

                            
                        });
                $scope.hide = function () {
                    $mdDialog.hide();
                };
                $scope.cancel = function () {
                    $mdDialog.cancel();
                };
                $scope.answer = function (answer) {
                    $scope.activated = false;
                    $mdDialog.hide('Done');  
                    passService.setid($scope.msg);
                    //console.log("passed-"+id);
                    $location.path("/UserView");                  
                };
            }
            $scope.response='';

            $scope.signListener = function() {

                 $('.signbtn').hide();

                 //$('.processor').show();  

                 $scope.ucProgress = false;           

                 //var myEl = angular.element( document.querySelector( '.includediv' ) );

                    $http.post("service/usercheck.php",{'username':$scope.userName})

                    .success(function(data,status,headers,config){

                        $scope.result = data;

                        console.log(data);

                        //myEl.html('<divclass=\"\"><b>Succeeded To check</b></div>');

                        if(data.trim()==='correct'){

                            //myEl.html('<divclass=\"\"><b>Some Details Already Exists</b></div>');

                            $scope.response='Username already exists, please login in members area';


                            $scope.ucProgress = true;

                        }

                        else{

                            $http.post("service/usersign.php",{'fname':$scope.userFName,'lname':$scope.userLName,'username':$scope.userName,'password':$scope.userPassword})

                            .success(function(data,status,headers,config){

                                //myEl.html('<divclass=\"\"><b>Processed</b></div>');

                                $scope.result = data;

                                console.log(data);


                                if(data.trim()==='created'){

                                $scope.response='Account Created';

                                $scope.ucProgress = true;

                                 $(function () {
                                    console.log("Function Called");
                                    $scope.userListRetrieve();
                                });

                                }

                                else{

                                    $scope.sresponse='Something went wrong.If this continues please contact technical administrator.';

                                    //

                                    $scope.ucProgress = true;

                                }

                            });

                        }

                            

                    });
                }
        })
        
        
        ;