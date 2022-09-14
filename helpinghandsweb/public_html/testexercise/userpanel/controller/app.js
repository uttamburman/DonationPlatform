 angular.module('orgApp', ['ngRoute', 'ngMaterial', 'ngMessages'])

//Define Routing for app
//Uri /AddNewOrder -> template add_order.html and Controller AddOrderController
//Uri /ShowOrders -> template show_orders.html and Controller AddOrderController

        .config(['$routeProvider',
            function ($routeProvider) {
                $routeProvider.                        
                        when('/UserView', {
                            templateUrl: 'views/userview.php',
                            controller: 'userViewController'
                        }).
                        otherwise({
                            redirectTo: '/UserView'
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
            
            $rootScope.$on('$routeChangeStart', function() {
                //console.log("Root Change Started");
                $scope.indexactivated=false;
            });

            $rootScope.$on('$routeChangeSuccess', function() {
                //console.log("Root Change Finished");
                $scope.indexactivated=true;
            });
            
            $http.get("service/usercheck.php")
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
                //$location.path("/Settings");
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

        .controller('userViewController', function ($scope, $http, $mdDialog, passService) {
            $scope.userId = passService.getid();
            $http.post("service/userviewdata.php", {'id': $scope.userId})
                        .success(function (data, status, headers, config) {
                            $scope.userdata = data;
                            $scope.activated = true;
                            
                        });
        })
        
        
        .controller('SettingsController', function ($scope, $http) 
        {
            $(function () {
                $scope.getProfile();
            });
            $scope.message = 'This is Add New Event screen';
            $scope.profilecoverimghash = "profile.jpg";
            $scope.profileimghash = "profile.jpg";
            $scope.memcurpwd = "xxxxxxxx";
            $scope.pwdchange=true;
            $scope.pwdchangebtn=true;
            $scope.distogglematch=true;
            $scope.editPassword = function () {
                $scope.pwdchange=false;
                $scope.pwdchangebtn =false;
                $scope.distogglematch = true;
            }
            $scope.getProfile = function () {
                //console.log('ARID' + $scope.aid);
                $http.post("service/userviewdata.php", {'post': 'data'})
                        .success(function (data, status, headers, config) {
                            //console.log(data);
                            for (var i = 0; i < data.length; i++) {
                                $scope.fname=data[i].p_fname;
                                $scope.lname = data[i].p_lname;
                            }

                        });
            }
            
            //User Operations
            var delay = (function () {
                var timer = 0;
                return function (callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();
            $scope.pnameSubmit = function () {
                delay(function () {                    
                    $http.post("service/pname.php", {'name': $scope.fname})
                            .success(function (data, status, headers, config) {
                                console.log(data.trim());
                            })
                            .error(function (error, status) {
                                console.log(data.error.status);
                            });
                }, 900);
            }
            
            $scope.changePassword = function () {   
                $scope.pwdchangebtn=true;               
                    $http.post("service/upwd.php", {'pwd': $scope.memcurpwd , 'pwd1': $scope.memnewpwd1})
                            .success(function (data, status, headers, config) {
                                console.log(data.trim());
                                if(data.trim()==="success"){
                                    $scope.pwdchange=true;
                                    $scope.pwdchangebtn=true;
                                    $scope.memcurpwd ="xxxxxx";
                                    $scope.memnewpwd1 ="";
                                    $scope.memnewpwd2 ="";
                                }
                                else{
                                    
                                }
                            })
                            .error(function (error, status) {
                                console.log(data.error.status);
                            });
               
            }
            $scope.matchPwd1 = function () {
                if($scope.memnewpwd1===$scope.memnewpwd2){
                    $scope.distogglematch=false;
                }
                
                else{
                    $scope.distogglematch=true;
                }
            }
            $scope.matchPwd2 = function () {
                if($scope.memnewpwd1===$scope.memnewpwd2){
                    $scope.distogglematch=false;
                }
                else{
                    $scope.distogglematch=true;
                }
            }
            
        })
        
        ;