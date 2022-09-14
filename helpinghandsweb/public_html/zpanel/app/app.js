 angular.module('orgApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngSanitize'])



//Define Routing for app

//Uri /AddNewOrder -> template add_order.html and Controller AddOrderController

//Uri /ShowOrders -> template show_orders.html and Controller AddOrderController



        .config(['$routeProvider',

            function ($routeProvider) {

                $routeProvider.

                        when('/Home', {

                            templateUrl: 'app/zpanel.php',

                            controller: 'AddEventController'

                        }).

                        when('/Messages', {

                            templateUrl: 'app/messages.php',

                            controller: 'ShowEventController'

                        }).

                        when('/Mailing', {

                            templateUrl: 'app/mailing.php',

                            controller: 'AddEventImageController'

                        }).

                        when('/BloodData', {

                            templateUrl: 'app/blooddata.php',

                            controller: 'BloodDataController'

                        }).

                        when('/Users', {

                            templateUrl: 'app/users.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/Editor', {

                            templateUrl: 'app/articleeditor.php',

                            controller: 'ArticleEditorController'

                        }).

                        when('/MyArticles', {

                            templateUrl: 'app/myarticles.php',

                            controller: 'MyStoriesController'

                        }).

                        when('/Eventcreate', {

                            templateUrl: 'app/eventcreate.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/EventStory', {

                            templateUrl: 'app/eventstory.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/Eventstories', {

                            templateUrl: 'app/eventstories.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/Allarticles', {

                            templateUrl: 'app/articles.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/Performance', {

                            templateUrl: 'app/articleperf.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/Volunteers', {

                            templateUrl: 'app/volunteers.php',

                            controller: 'EventPreviewController'

                        }).

                        when('/Revarticles', {

                            templateUrl: 'app/articlereview.php',

                            controller: 'ReviewController'

                        }).

                        when('/Settings', {

                            templateUrl: 'app/settings.php',

                            controller: 'SettingsController'

                        }).

                        when('/Submit', {

                            templateUrl: 'app/submissions.php',

                            controller: 'SubmissionsController'

                        }).

                        when('/Select', {

                            templateUrl: 'app/selections.php',

                            controller: 'selectionController'

                        }).

                        when('/Photologic', {

                            templateUrl: 'app/photologic.php',

                            controller: 'photologicController'

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

		.directive('myYoutube', function($sce) {

			return {

			  restrict: 'EA',

			  scope: { code:'=' },

			  replace: true,

			  template: '<div style="height:400px;"><iframe style="overflow:hidden;height:100%;width:100%" width="100%" height="100%" src="{{url}}" frameborder="0" allowfullscreen></iframe></div>',

			  link: function (scope) {

				  console.log('here');

				  scope.$watch('code', function (newVal) {

					 if (newVal) {

						 scope.url = $sce.trustAsResourceUrl("http://www.youtube.com/embed/" + newVal);

					 }

				  });

			  }

			};

		  })

		  

        .controller('AppController', function ($scope, $timeout, $mdSidenav, $log, $location, $http, passService) {

            $scope.fmbr = true;

            $scope.fchf = true;

            $scope.fedt = true;

            $scope.fadm = true;

            $scope.newStory = function () {

                passService.setid("");

                //console.log("passed-"+id);

                $location.path("/Editor");

            }

            $http.get("app/dataprocess/membercheck.php")

                    .success(function (data, status, headers, config) {

                        $scope.data = data;



                        for (var i = 0; i < data.length; i++) {

                            if (data[i].role == 'member') {

                                $scope.fmbr = false;

                            } else if (data[i].role == 'editor') {

                                $scope.fmbr = false;

                                $scope.fedt = false;

                            } else if (data[i].role == 'admin') {

                                $scope.fmbr = false;

                                $scope.fedt = false;

                                $scope.fadm = false;

                            } else if (data[i].role == 'chief') {

                                $scope.fmbr = false;

                                $scope.fedt = false;

                                $scope.fadm = false;

                                $scope.fchf = false;

                            }

                        }

                    })

                    .error(function () {

                        $scope.data = "error in fetching data";

                        window.location = "../members";

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

                $http.post("app/logout.php", {})

                        .success(function (data, status, headers, config) {



                            //$scope.responsev='Verification Data Posted'+data;

                            //alert(data);

                            if (data.trim() === 'correct') {

                                window.location = "../members";

                            } else {

                                //alert($scope.name+$scope.password);

                                //$scope.responsev='Incorrect Verification Code';

                                window.location = "../members";

                            }

                        });

            }

            $scope.settingsCtrl = function () {

                $location.path("/Settings");

            }



        })



        .controller('AddEventController', function ($scope) {

            $scope.message = 'This is Add New Event screen';

        })

 		.controller('BloodDataController', function ($scope) {

            $scope.message = 'This is Add New Event screen';

        })

		.controller('SubmissionsController', function ($scope , $http ) {

            $scope.message = 'This is Submission screen';

			 $scope.activated = true;

            $scope.activated1 = true;

            $scope.activated2 = true;

			$(function () {

					$scope.availStory();

                    $scope.acceptedSubmit();

                    $scope.allSubmit();

					console.log("Function Executed");

                });

			$scope.availStory = function () {

            $http.get("app/dataprocess/operats/availsubmitlist.php")

                    .success(function (data) {

                        $scope.activated = false;

                        $scope.availstory = data;

						console.log(data);

						

                    })

                    .error(function () {

                        $scope.availstory = "error in fetching data";

                    });

			}

			$scope.acceptedSubmit = function () {

			$http.get("app/dataprocess/operats/acceptedlist.php")

                    .success(function (data) {

                        $scope.activated1 = false;

                        $scope.acceptstory = data;

						console.log(data);



                    })

                    .error(function () {

                        $scope.acceptstory = "error in fetching data";

                    });

			}

			$scope.allSubmit = function () {

			$http.get("app/dataprocess/operats/allsubmitlist.php")

                    .success(function (data) {

                        $scope.activated2 = false;

                        $scope.submitstory = data;

						console.log(data);



                    })

                    .error(function () {

                        $scope.submitstory = "error in fetching data";

                    });

			}

					

			$scope.submitLegend = function (arid) {

				console.log(arid);

				$http.post("app/dataprocess/operats/legendsubmit.php", {'aid': arid})

                                .success(function (data, status, headers, config) {

									console.log(data);

									if(data.trim()==="already"){

										console.log("Only One Entry allowed per Person");

										$scope.replymsg="Only One Entry allowed per Person";

									}

									else if(data.trim()==="packed"){

										console.log("Sorry, We are packed for more entries");

										$scope.replymsg="Sorry, We are now packed for more entries";

									}

									$(function () {

										$scope.availStory();

										$scope.allSubmit();

									});

                                })

                                .error(function (error, status) {

                                    console.log(data.error.status);

                                });

			}

			$scope.submitEditor = function (arid) {

				console.log(arid);

				$http.post("app/dataprocess/operats/editorsubmit.php", {'aid': arid})

                                .success(function (data, status, headers, config) {

									console.log(data);

									$(function () {

										$scope.availStory();

										$scope.allSubmit();

									});

                                })

                                .error(function (error, status) {

                                    console.log(data.error.status);

                                });

			}

			$scope.submitFeatured = function (arid) {

				console.log(arid);

				$http.post("app/dataprocess/operats/featuresubmit.php", {'aid': arid})

                                .success(function (data, status, headers, config) {

									console.log(data);

									$(function () {

										$scope.availStory();

										$scope.allSubmit();

									});

                                })

                                .error(function (error, status) {

                                    console.log(data.error.status);

                                });

			}

        })

        .controller('ShowEventController', function ($scope) {



            $scope.message = 'This is Show Events screen';



        }).controller('AddEventImageController', function ($scope) {



    $scope.message = 'This is Add New Event screen';



}).controller('EventPreviewController', function ($scope) {



    $scope.message = 'This is Add New Event screen';



})

        .directive('upload', ['$http', function ($http) {

                return {

                    restrict: 'E',

                    replace: true,

                    scope: {},

                    require: '?ngModel',

                    template: '<div class="asset-upload">Drag here to upload</div>',

                    link: function (scope, element, attrs, ngModel) {



                        // Code goes here

                        element.on('dragover', function (e) {

                            e.preventDefault();

                            e.stopPropagation();

                        });

                        element.on('dragenter', function (e) {

                            e.preventDefault();

                            e.stopPropagation();

                        });

                        element.on('drop', function (e) {

                            e.preventDefault();

                            e.stopPropagation();

                            if (e.dataTransfer) {

                                if (e.dataTransfer.files.length > 0) {

                                    upload(e.dataTransfer.files);

                                }

                            }

                            return false;

                        });

                        var upload = function (files) {

                            var data = new FormData();

                            angular.forEach(files, function (value) {

                                data.append("files[]", value);

                            });



                            data.append("objectId", ngModel.$viewValue);



                            $http({

                                method: 'POST',

                                url: attrs.to,

                                data: data,

                                withCredentials: true,

                                headers: {'Content-Type': undefined},

                                transformRequest: angular.identity

                            }).success(function (data) {

                                console.log("Uploaded");

                                console.log(data);

                            }).error(function () {

                                console.log("Error");

                            });

                        };

                    }

                };

            }])

        .directive('focus',

                function ($timeout) {

                    return {

                        scope: {

                            trigger: '@focus'

                        },

                        link: function (scope, element) {

                            scope.$watch('trigger', function (value) {

                                if (value === "true") {

                                    $timeout(function () {

                                        element[0].focus();

                                    });

                                }

                            });

                        }

                    };

                })



        .controller('ArticleEditorController', function ($scope, $http, $mdConstant, passService, $sce, $mdDialog) {

            $('#titletext').focus();

            $scope.savemsg = 'Start With Title';

			$scope.filemsg ='';

            $scope.aid = passService.getid();

            if ($scope.aid !== '') {

                $(function () {

					$scope.getMeta();

                    $scope.getMedia();

                    

                });

            }

            document.getElementById("articid").value = $scope.aid;

            document.getElementById("cvarticid").value = $scope.aid;

            //console.log($scope.aid);

            $scope.titletext = '';

            $scope.shortdesctext = '';

            $scope.tags = ["Tag"];

            $scope.articlecat = "people";

			$scope.articlelang= "english";

            var totaldesc = "";

            $scope.chipread = true;

            $scope.createdate = "-";

            $scope.totalmed = "0";

            $scope.storystat = "Raw";

            //Description from code itself no scope

            //Rest would be auto generated and will be stored in Media Component Boxes





            //Toggles

            $scope.distoggle = true;

            $scope.storymediauphide = true;

            $scope.coverimghash = "fallback.jpg";

            $scope.storyimg = "http://www.helpinghandsgroup.in/impressions/fallback.jpg";

            var delay = (function () {

                var timer = 0;

                return function (callback, ms) {

                    clearTimeout(timer);

                    timer = setTimeout(callback, ms);

                };

            })();

            ///Ttpost

            $scope.titlekeySubmit = function () {

                delay(function () {

                    $scope.savemsg = 'Saving Title';

                    var ttle = $scope.titletext;

                    console.log(ttle);

                    if (ttle !== '')

                    {

                        ttle = ttle.replace(/\s+$/, '');

                        var result = ttle.replace(/ /g, "-");

                        result = result.replace(/-\s*$/, "");

                        $scope.slug = result.replace(/["']/g, " ");



                        console.log('ARID' + $scope.aid);

                        $http.post("app/dataprocess/artittmeta.php", {'aid': $scope.aid, 'title': $scope.titletext, 'slug': $scope.slug})

                                .success(function (data, status, headers, config) {

                                    $scope.aid = data.trim();

                                    document.getElementById("articid").value = $scope.aid;

                                    document.getElementById("cvarticid").value = $scope.aid;

									$scope.savemsg = 'Saved';

                                    $scope.distoggle = false;

                                    $scope.chipread = false;

                                })

                                .error(function (error, status) {



                                    console.log(data.error.status);

                                });

                    } else

                    {

                        console.log('No title');

                    }

                }, 600);

            }

            $scope.shortkeySubmit = function () {

                delay(function () {

                    $scope.savemsg = 'Saving Short Description';

                    var shd = $scope.shortdesctext;

                    console.log(shd);

                    $http.post("app/dataprocess/artisdmeta.php", {'aid': $scope.aid, 'shortdesc': $scope.shortdesctext})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

								$scope.savemsg = 'Short Description Saved';

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 400);

            }

            $scope.chipkeySubmit = function () {

                delay(function () {

                    $scope.savemsg = 'Saving Tags';

                    var chip = $scope.tags;

                    console.log(chip);

                    var chipstr = JSON.stringify(chip);

                    console.log(chipstr);

                    $http.post("app/dataprocess/artichip.php", {'aid': $scope.aid, 'chip': chipstr})

                            .success(function (data, status, headers, config) {

                                console.log(data);

								$scope.savemsg = 'Tags Saved';

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 500);

            }

            $scope.catSelect = function () {

                delay(function () {

                    $scope.savemsg = 'Saving Category';

                    var cat = $scope.articlecat;

                    console.log(cat);

                    $http.post("app/dataprocess/articat.php", {'aid': $scope.aid, 'categ': $scope.articlecat})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

								$scope.savemsg = 'Category Saved';

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 300);

            }

			$scope.langSelect = function () {

                delay(function () {

                    $scope.savemsg = 'Saving Language';

                    var lang = $scope.articlelang;

                    console.log(lang);

                    $http.post("app/dataprocess/artilang.php", {'aid': $scope.aid, 'lang': $scope.articlelang})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

								$scope.savemsg = 'Language Saved';

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 300);

            }

            $scope.slugkeySubmit = function () {

                $(function () {

                    $scope.titlekeySubmit();

                });

            }

			$scope.deleteMedia = function (rcid) {

				console.log(rcid);

				$scope.savemsg = 'Deleting Media';

				$http.post("app/dataprocess/deleteMedia", {'rcid': rcid})

                        .success(function (data, status, headers, config) {

							console.log(data);

							$scope.savemsg = 'Media Deleted';

							$(function () {

								$scope.getMeta();

								$scope.getMedia();

								

							});

						})

			}

            $scope.getMeta = function () {

                var eid = "";

                console.log('ARID' + $scope.aid);

                $http.post("app/dataprocess/getMetainfo.php", {'aid': $scope.aid})

                        .success(function (data, status, headers, config) {

                            $scope.metainfo = data;

                            console.log(data);

                            for (var i = 0; i < data.length; i++) {

                                $scope.coverimghash = data[i].thumbimg;

                                $scope.createdate = data[i].dtofcreate;

                                $scope.totalmed = data[i].mediacount;

                                $scope.titletext = data[i].title;

                                $scope.shortdesctext = data[i].shortdesc;

                                $scope.distoggle = false;

                                $scope.chipread = false;

                                $scope.slug = data[i].slug;

                                var chipstring = JSON.parse(data[i].tagchips);

                                console.log(chipstring);

                                //$scope.tags = data[i].tagchips;

                                $scope.tags = chipstring;

                                $scope.articlecat = data[i].categ;

                                $(function () {

                                    for (edId in tinyMCE.editors)

                                    {

                                        var ed_id = tinyMCE.editors[edId].id;

                                        tinyMCE.editors[edId].remove();

                                        console.log("Editor ID" + ed_id);

                                        console.log(edId);

                                    }



                                    tinymce.init({

                                        selector: '.articledescription',

                                        plugins: "code save textcolor colorpicker autoresize link image wordcount",

                                        toolbar: "undo redo | fontselect fontsizeselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code ",

                                        menubar: "",

                                        autosave_interval: "3s",

                                        font_formats: 'Roboto=roboto;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',

                                        setup: function (ed) {

                                            ed.on('init', function (e) {

                                                eid = tinyMCE.activeEditor.id;

                                                //$scope.mcid=eid;

                                                console.log('Initializing' + eid);

                                            });

                                            ed.on('click', function (e) {

                                                console.log('Active');

                                            });

                                            ed.on('keyup', function (e) {

                                                delay(function () {

                                                    var ttle = $scope.titletext;

                                                    if (ttle !== '')

                                                    {

                                                        $scope.savemsg = 'Desc Initiated';

                                                        var desc = tinyMCE.activeEditor.getContent();

                                                        totaldesc = desc;

                                                        console.log(desc);

                                                        $http.post("app/dataprocess/artidcmeta.php", {'aid': $scope.aid, 'descrpt': desc})

                                                                .success(function (data, status, headers, config) {

                                                                    console.log(data.trim());

                                                                })

                                                                .error(function (error, status) {

                                                                    console.log(data.error.status);

                                                                });

                                                    } else {

                                                        console.log('Not Prepared');

                                                    }

                                                }, 700);

                                            });



                                        }

                                    });



                                });

                                angular.forEach($scope.metainfo, function (item) {

                                    var dscrpt = $sce.trustAsHtml(item.storydesc);



                                    var dscrptstr = String(dscrpt);

                                    $(function () {

                                        tinyMCE.get(eid).setContent(dscrptstr);

                                    });

                                })

                            }



                        });



            }

            $scope.getCover = function () {

                console.log('ARID' + $scope.aid);

                $http.post("app/dataprocess/getArticleCover.php", {'aid': $scope.aid})

                        .success(function (data, status, headers, config) {

                            console.log(data);

                            for (var i = 0; i < data.length; i++) {

                                $scope.coverimghash = data[i].thumbimg;

                            }



                        });

            }

            $scope.getMedia = function () {



                $http.post("app/dataprocess/getArticleMedia.php", {'aid': $scope.aid})

                        .success(function (data, status, headers, config) {

                            //console.log(data);

                            $scope.media = data;



                            //$scope.initEditor();

                            





                            $(function () {

                                tinymce.init({

                                    selector: '.storymediadesc',

                                    theme: 'inlite',

                                    allow_html_in_named_anchor: true,

                                    plugins: 'table link paste contextmenu textpattern autolink',

                                    insert_toolbar: 'link table',

                                    selection_toolbar: 'bold italic | quicklink h2 h3 forecolor | bullist numlist outdent indent alignleft aligncenter alignright alignjustify',

                                    inline: true,

                                    paste_data_images: true,

                                    save_onsavecallback: function () {

                                        console.log('Saving');

                                        var eid = tinyMCE.activeEditor.id;

                                        var desc = tinyMCE.activeEditor.getContent();

                                        console.log(desc + "\n" + eid);

                                    },

                                    setup: function (ed) {

                                        ed.on('keyup', function (e) {

                                            delay(function () {

                                                var desc = tinyMCE.activeEditor.getContent();

                                                var mid = tinyMCE.activeEditor.id;

                                                var midtrim = mid.replace("_desc", "");

                                                console.log(desc + "-id: " + midtrim);

                                                $http.post("app/dataprocess/artimddesc.php", {'aid': $scope.aid, 'mid': midtrim, 'desc': desc})

                                                        .success(function (data, status, headers, config) {

                                                            console.log(data.trim());

                                                        })

                                                        .error(function (error, status) {

                                                            console.log(data.error.status);

                                                        });

                                            }, 500);

                                        });



                                    }

                                });

                                tinymce.init({

                                    selector: '.storymediacaption',

                                    theme: 'inlite',

                                    plugins: 'contextmenu textpattern',

                                    insert_toolbar: '',

                                    max_height: 70,

                                    selection_toolbar: '',

                                    inline: true,

                                    setup: function (ed) {

                                        ed.on('keyup', function (e) {

                                            delay(function () {

                                                var capt = tinyMCE.activeEditor.getContent();

                                                var mid = tinyMCE.activeEditor.id;

                                                var midtrim = mid.replace("_caption", "");

                                                console.log(capt + "-id: " + midtrim);

                                                $http.post("app/dataprocess/artimdcapt.php", {'aid': $scope.aid, 'mid': midtrim, 'capt': capt})

                                                        .success(function (data, status, headers, config) {

                                                            console.log(data.trim());

                                                        })

                                                        .error(function (error, status) {

                                                            console.log(data.error.status);

                                                        });

                                            }, 500);

                                        });

                                    }

                                });

                                tinymce.init({

                                    selector: '.storymediaref',

                                    theme: 'inlite',

                                    insert_toolbar: '',

                                    selection_toolbar: '',

                                    max_height: 40,

                                    inline: true,

                                    setup: function (ed) {

                                        ed.on('keyup', function (e) {

                                            delay(function () {

                                                var ref = tinyMCE.activeEditor.getContent({format: 'text'});

                                                var mid = tinyMCE.activeEditor.id;

                                                var midtrim = mid.replace("_source", "");

                                                console.log(ref + "-id: " + midtrim);

                                                $http.post("app/dataprocess/artimdref.php", {'aid': $scope.aid, 'mid': midtrim, 'ref': ref})

                                                        .success(function (data, status, headers, config) {

                                                            console.log(data.trim());

                                                        })

                                                        .error(function (error, status) {

                                                            console.log(data.error.status);

                                                        });

                                            }, 500);

                                        });

                                    }

                                });

                            });

                            angular.forEach($scope.media, function (item) {

                                var dsc = $sce.trustAsHtml(item.meddesc);

                                var cpt = $sce.trustAsHtml(item.medcapt);

                                var ref = $sce.trustAsHtml(item.medref);

                                var dscstr = String(dsc);

                                var cptstr = String(cpt);

                                var refstr = String(ref);

                                console.log("html:- " + dscstr);

                                var riddsc = item.recid + "_" + "desc";

                                var ridcpt = item.recid + "_" + "caption";

                                var ridref = item.recid + "_" + "source";



                                console.log("RID:- " + riddsc);

                                $(function () {

                                    tinyMCE.get(riddsc).setContent(dscstr);

                                    tinyMCE.get(ridcpt).setContent(cptstr);

                                    tinyMCE.get(ridref).setContent(refstr);

									 $('html, body').animate({scrollTop : $(document).height()},200);

                                });

                            })



                            //tinymce.EditorManager.execCommand('mceAddEditor', true, ".storymediadesc");

                            //console.log('initEditor Execution Called');

                        })

                        .error(function (error, status) {

                            console.log(data.error.status);

                        });

            }



            $scope.articlePreview = function (stid) {

                $mdDialog.show({

                    locals: {dataToPass: stid},

                    controller: articlePreviewCtrl,

                    templateUrl: 'app/templates/previewdialog.tmpl.php',

                    parent: angular.element(document.body),

                    clickOutsideToClose: true, // Only for -xs, -sm breakpoints.

                    fullscreen: true

                })

                        .then(function () {

                            $scope.status = 'No Changes Applied.';

                        });

            }

            function articlePreviewCtrl($scope, $http, dataToPass, $sce) {

                $scope.msg = dataToPass;

                $scope.activated = false;

                $scope.trustAsHtml = function (string) {

                    return $sce.trustAsHtml(string);

                };

                $http.post("app/dataprocess/articleeditprevmeta.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.storymeta = data;



                        });

                $http.post("app/dataprocess/articleeditprevcont.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.storycont = data;

                            $scope.activated = true;

                        });

                $scope.hide = function () {

                    $mdDialog.hide();

                };

                $scope.cancel = function () {

                    $mdDialog.cancel();

                };



            }

			

            

			

			

			

            $scope.articleProduce = function (stid) {

                if ($scope.titletext !== '' && $scope.shortdesctext !== '' && $scope.slug !== '' && totaldesc !== '')

                {

                    $http.post("app/dataprocess/articleprod.php", {'id': stid})

                            .success(function (data, status, headers, config) {

                                $scope.savemsg = "Produced";

                            });

                } else {

                    $scope.savemsg = "Please Complete Story.";

                }

            }



            /// For  Image

            $(function () {

                //Editor <-

                tinymce.init({

                    selector: '.articledescription',
					branding: false,

                    plugins: "code save textcolor colorpicker autoresize link image wordcount",

                    toolbar: "undo redo | fontselect fontsizeselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code ",

                    menubar: "",

                    autosave_interval: "3s",

                    font_formats: 'Roboto=roboto;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',

                    setup: function (ed) {

                        ed.on('click', function (e) {

                            console.log('Active');

                        });

                        ed.on('keyup', function (e) {

                            delay(function () {

                                var ttle = $scope.titletext;

                                if (ttle !== '')

                                {

                                    $scope.savemsg = 'Saving Story description';

                                    var desc = tinyMCE.activeEditor.getContent();

                                    totaldesc = desc;

                                    console.log(desc);

                                    $http.post("app/dataprocess/artidcmeta.php", {'aid': $scope.aid, 'descrpt': desc})

                                            .success(function (data, status, headers, config) {

												$scope.savemsg = 'Story Description Saved';

                                                console.log(data.trim());

                                            })

                                            .error(function (error, status) {

                                                console.log(data.error.status);

                                            });

                                } else {

                                    console.log('Not Prepared');

                                }

                            }, 700);

                        });



                    }

                });





                //End of Editor ->

                var ht = 0;

                var wt = 0;

                ht = window.innerHeight;

                wt = window.innerWidth;

                

            });

            $(window).resize(function () {

                var ht = 0;

                var wt = 0;

                ht = window.innerHeight;

                wt = window.innerWidth;

                

            });

            $('#upload').on('change', function () {

                var $form = $(this).closest('form');

                $form.find('input[type=submit]').click();

                readURL(this);

				



            });

            function readURL(input) {

                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('#imgshow').attr('src', e.target.result);

                    }

                    reader.readAsDataURL(input.files[0]);

					$(".authenticmessage").append("Checking...");

					var fs= input.files[0].size;

					console.log("File Size"+fs);

					if(fs>1590000){

						$(".authenticmessage").html("Image Size Too Large(>1.5MB), Image will Not be accepted");

					}

					else{

						$(".authenticmessage").html("Image Will probably be accepted.");

					}

                }

            }

            $('#coverupload').on('change', function () {

                var $form = $(this).closest('form');

                $form.find('input[type=submit]').click();

                readcoverURL(this);

            });

            function readcoverURL(input) {

                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('#coverimgshow').attr('src', e.target.result);

                    }

                    reader.readAsDataURL(input.files[0]);

                }

            }

            $(function () {

                //elements

                var progressbox = $('#progressbox');

                var progressbar = $('#progressbar');

                var statustxt = $('#statustxt');

                var submitbutton = $("#SubmitButton");

                var myform = $("#UploadForm");

                var output = $("#output");

                var completed = '0%';

                var input = $("#upload");

                var box = $(".mediauploadbox");

                box.hide();

                $(myform).ajaxForm({

                    beforeSend: function () { //before sending form

                        box.show();

                        submitbutton.attr('disabled', ''); // disable upload button

                        statustxt.empty();

                        progressbox.slideDown(); //show progressbar

                        progressbar.width(completed); //initial value 0% of progressbar

                        statustxt.html(completed); //set status text

                        statustxt.css('color', '#000000'); //initial color of status text

						$scope.savemsg = 'Uploading Image';

						$(".editorbody").animate({ scrollTop: $(".editorbody")[0].scrollHeight}, 1000);

                    },

                    uploadProgress: function (event, position, total, percentComplete) { //on progress

                        progressbar.width(percentComplete + '%') //update progressbar percent complete

                        statustxt.html(percentComplete + '%'); //update status text



                        if (percentComplete > 50)

                        {

                            statustxt.css('color', '#000000'); //change status text to white after 50%

                        }

                        if (percentComplete == 100)

                        {

                            statustxt.html('Preparing');

                            statustxt.css('color', '#000000');

                        }



                    },

                    complete: function (response) { // on complete

                        //output.append(response.responseText); //update element with received data

                        console.log(response.responseText);

                        myform.resetForm();  // reset form

                        document.getElementById("articid").value = $scope.aid;

                        submitbutton.removeAttr('disabled'); //enable submit button

                        //tinyMCE.editors.length = 0;

                        //console.log("passed-"+id);													

						$scope.getMeta();

						$scope.getMedia();

                        //$scope.setEditor();

                        console.log('getMedia Method called');

						$scope.savemsg = 'Processed Successfully';

                        box.hide();



                    }

                });



                //Cover Image Elements

                var cvprogressbox = $('#cvprogressbox');

                var cvprogressbar = $('#cvprogressbar');

                var cvstatustxt = $('#cvstatustxt');

                var cvsubmitbutton = $("#CoverSubmitButton");

                var coverform = $("#CoverUploadForm");

                var cvoutput = $("#cvoutput");

                var cvcompleted = '0%';

                var cvinput = $("#coverupload");

                $(coverform).ajaxForm({

                    beforeSend: function () { //brfore sending form

                        cvsubmitbutton.attr('disabled', ''); // disable upload button

                        cvstatustxt.empty();

                        cvprogressbox.slideDown(); //show progressbar

                        cvprogressbar.width(cvcompleted); //initial value 0% of progressbar

                        cvstatustxt.html(cvcompleted); //set status text

                        cvstatustxt.css('color', 'white'); //initial color of status text

                        cvprogressbar.height(6 + 'px')

                    },

                    uploadProgress: function (event, position, total, percentComplete) { //on progress

                        cvprogressbar.width(percentComplete + '%') //update progressbar percent complete

                        cvstatustxt.html(percentComplete + '%'); //update status text

                        if (percentComplete > 50)

                        {

                            cvstatustxt.css('color', 'white'); //change status text to white after 50%

                        }

                        if (percentComplete == 100)

                        {

                            cvstatustxt.html('Preparing');

                            cvstatustxt.css('color', 'transparent');

                        }

                    },

                    complete: function (response) { // on complete

                        //cvoutput.html(response.responseText); //update element with received data

                        coverform.resetForm();  // reset form

                        document.getElementById("cvarticid").value = $scope.aid;

                        $scope.getCover();

                        console.log('getCover Method called');

                        cvsubmitbutton.removeAttr('disabled'); //enable submit button

                        cvprogressbar.height(0 + 'px')



                    }

                });

            });

			$scope.addVideo = function (stid) {

                $mdDialog.show({

                    locals: {dataToPass: stid},

                    controller: addVideoCtrl,

                    templateUrl: 'app/templates/videoembed.tmpl.php',

                    parent: angular.element(document.body),

                    clickOutsideToClose: true, // Only for -xs, -sm breakpoints.

                    fullscreen: true

                })

                        .then(function (answer) {

                            $scope.status = 'Changes Applied.';

							$(function () {	

							    $scope.getMeta();							

								$scope.getMedia();

								

							});

                        }, function () {

                            $scope.status = 'No Changes Applied';

                        });

            }

			function addVideoCtrl($scope, $http, dataToPass, $sce) {

                $scope.msg = dataToPass;

                $scope.activated = true;

                //$scope.videoembed="";

				

                $scope.answer = function (answer) {

                    $scope.activated = false;

					var res=$scope.vidembed;

					var check=""

					$(function () {

						var parser = document.createElement("a");

						parser.href = res;						

						var prot=parser.protocol; // => "http:"

						parser.hostname; // => "example.com"

						parser.port;     // => "3000"

						parser.pathname; // => "/pathname/"

						parser.v;   // => "?search=test"

						parser.hash;     // => "#hash"

						parser.host;     // => "example.com:3000"

						console.log(prot);

						console.log(parser.hostname);

						//console.log(parser.search);

						var video_id = parser.search.split('v=')[1];

						var ampersandPosition = video_id.indexOf('&');

						if(ampersandPosition != -1) {

						  video_id = video_id.substring(0, ampersandPosition);

						}

						console.log("http://img.youtube.com/vi/"+video_id+"/0.jpg");

						if(prot==="https:"){

							$scope.checkmsg ="Protocol Matched But not Website";

							if(parser.hostname==="www.youtube.com")

							{

								$scope.checkmsg="Protocol & Website Matched ";

								if(video_id!==""){

									$scope.checkmsg="Okay It Seems Just Okay, Saving...";

									$http.post("app/dataprocess/uploadvideo.php", {'id': $scope.msg, 'url': $scope.vidembed, 'imgcap' : video_id})

                            		  .success(function (data, status, headers, config) {

									  $scope.reply = 'Done';

									  console.log(data);

									  $scope.activated = true;

									  $mdDialog.hide('Done');

									  

									  //$scope.setEditor();

									  console.log('getMedia Method called');

								  });		 

															//$scope.activated = true;									

								}

								else{

									$scope.checkmsg="No Video ID Found";

								}

							} 

							else{

								$scope.checkmsg="Doesn't Seems to be coming from Youtube";

							}

						}

						else{

							check ="Something wrong with Protocol, make sure it's https and not http in URL";

						}

						//$scope.checkmsg=check;						

					});					

                    

                };

                $scope.hide = function () {

                    $mdDialog.hide();

                };

                $scope.cancel = function () {



                    $mdDialog.cancel();

                };



            }

        })

        .service('passService', function () {

            var storyid = "";

            var setid = function (id) {

                storyid = id;

            };

            var getid = function () {

                return storyid;

            };

            return {

                setid: setid,

                getid: getid

            };

        })

        .controller('MyStoriesController', function ($scope, $http, passService, $location) {

            $scope.activated = true;

            $scope.activated1 = true;

            $scope.activated2 = true;

            $http.get("app/dataprocess/myarticlelist.php")

                    .success(function (data) {

                        $scope.activated = false;

                        $scope.editstory = data;



                    })

                    .error(function () {

                        $scope.editstory = "error in fetching data";

                    });

            $http.get("app/dataprocess/myarticlelistpub.php")

                    .success(function (data) {

                        $scope.activated1 = false;

                        $scope.pubstory = data;



                    })

                    .error(function () {

                        $scope.editstory = "error in fetching data";

                    });

            $http.get("app/dataprocess/myarticlelistrun.php")

                    .success(function (data) {

                        $scope.activated2 = false;

                        $scope.runstory = data;



                    })

                    .error(function () {

                        $scope.editstory = "error in fetching data";

                    });

            $scope.openStory = function (id) {

                passService.setid(id);

                //console.log("passed-"+id);

                $location.path("/Editor");

            };

        })

        .controller('articleeditorpreviewCtrl', function ($scope, $http, $mdDialog) {

            //$scope.useract = false;            



        })

        .controller('userListCtrl', function ($scope, $http, $mdDialog) {

            $scope.useract = false;

			$scope.profileimghash="profile.jpg";

            $http.get("app/dataprocess/userlist.php")

                    .success(function (data) {

                        $scope.data = data;

                        $scope.useract = true;

						angular.forEach($scope.data, function (item) {

								$scope.profileimghash=item.prof;

								console.log($scope.profileimghash);

                            });

                    })

                    .error(function () {

                        $scope.data = "error in fetching data";

                    });

            $scope.userView = function (userid) {

                $mdDialog.show({

                    locals: {dataToPass: userid},

                    controller: userViewCtrl,

                    templateUrl: 'app/templates/dialog.tmpl.php',

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

            function userViewCtrl($scope, $http, dataToPass) {

                $scope.msg = dataToPass;

				$scope.profileimghash="profile.jpg";

                $scope.activated = false;

                $http.post("app/dataprocess/singleuserdata.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.userdata = data;

                            $scope.activated = true;

							angular.forEach($scope.userdata, function (item) {

                                $scope.ver = item.adminverif;

								$scope.role=item.role;

								$scope.pos=item.posit;

								$scope.subposit=item.subposit;

								$scope.profileimghash=item.prof;

                            });

                        });

                $scope.hide = function () {

                    $mdDialog.hide();

                };

                $scope.cancel = function () {

                    $mdDialog.cancel();

                };

                $scope.answer = function (answer) {

                    $scope.activated = false;

                    $http.post("app/dataprocess/uservnadata.php", {'id': $scope.msg, 'role': $scope.role, 'ver': $scope.ver, 'posit': $scope.pos, 'subposit': $scope.subposit})

                            .success(function (data, status, headers, config) {

								//console.log(data);

                                $scope.reply = 'Done';

                                $scope.activated = true;

                                $mdDialog.hide('Done');

                            });

                };

            }

        })

        .controller('ReviewController', function ($scope, $http, $mdDialog) {

            //$scope.useract = false;       

            $scope.activated = true;

            $http.get("app/dataprocess/reviewarticlelist.php")

                    .success(function (data) {

                        $scope.activated = false;

                        $scope.reviewstory = data;



                    })

                    .error(function () {

                        $scope.reviewstory = "error in fetching data";

                    });

            $scope.articleReview = function (stid) {

                $mdDialog.show({

                    locals: {dataToPass: stid},

                    controller: articleReviewCtrl,

                    templateUrl: 'app/templates/reviewdialog.tmpl.php',

                    parent: angular.element(document.body),

                    clickOutsideToClose: true, // Only for -xs, -sm breakpoints.

                    fullscreen: true

                })

                        .then(function () {

                            $scope.status = 'No Changes Applied.';

                        });

            };

            function articleReviewCtrl($scope, $http, dataToPass, $sce) {

                $scope.msg = dataToPass;

                $scope.activated = false;

                $scope.review = 'pending';

				$scope.remark="";

                $scope.trustAsHtml = function (string) {

                    return $sce.trustAsHtml(string);

                };

                $http.post("app/dataprocess/articleeditprevmeta.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.storymeta = data;

                            angular.forEach($scope.storymeta, function (item) {

                                $scope.review = item.review;

								$scope.remark=item.remarks;

                            });



                        });

                $http.post("app/dataprocess/articleeditprevcont.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.storycont = data;

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

                    $http.post("app/dataprocess/articlereviewdata.php", {'id': $scope.msg, 'review': $scope.review, 'remark': $scope.remark})

                            .success(function (data, status, headers, config) {



                                $scope.reply = 'Done';

                                $scope.activated = true;

                                $mdDialog.hide('Done');

                            });

                };

            }



        }).controller('SettingsController', function ($scope, $http) 

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

                $http.post("app/dataprocess/getMemberProfile.php", {'post': 'data'})

                        .success(function (data, status, headers, config) {

                            //console.log(data);

                            for (var i = 0; i < data.length; i++) {

								$scope.mid=data[i].id;

                                $scope.profileimghash = data[i].prof;

								$scope.profilecoverimghash = data[i].profcov;

								$scope.memname = data[i].name;

								$scope.memusrname = data[i].usrname;

								$scope.memcontact = data[i].contact;

								$scope.memseccontact = data[i].seccontact;

								$scope.mememail = data[i].email;

								$scope.memcity = data[i].city;

								$scope.memaddress = data[i].address;

								$scope.memdate = data[i].regdate;

								$scope.memrole = data[i].role;

								$scope.memsecemail = data[i].secemail;

								$scope.memintro = data[i].introd;

								$scope.memtheme = data[i].theme;

								$scope.memfb = data[i].fb;

								$scope.memln = data[i].ln;

								$scope.memgp = data[i].gp;

								$scope.memtw = data[i].tw;

								$scope.membe = data[i].be;

								$scope.mempn = data[i].pn;

								$scope.memmoddt = data[i].moddt;

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

			$scope.memnameSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memname.php", {'name': $scope.memname})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 900);

            }

			$scope.memcontactSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memcnt.php", {'contact': $scope.memseccontact})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 900);

            }

			$scope.memsecemailSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/mememail.php", {'email': $scope.memsecemail})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 900);

            }

			$scope.memcitySubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memcity.php", {'city': $scope.memcity})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 900);

            }

			$scope.memaddressSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memaddress.php", {'address': $scope.memaddress})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 900);

            }

			$scope.memintroSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memintro.php", {'intro': $scope.memintro})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 900);

            }

			$scope.themeSelect = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memtheme.php", {'theme': $scope.memtheme})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.memfbSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memfb.php", {'fb': $scope.memfb})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.memlnSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memln.php", {'ln': $scope.memln})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.memgpSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memgp.php", {'gp': $scope.memgp})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.memtwSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/memtw.php", {'tw': $scope.memtw})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.membeSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/membe.php", {'be': $scope.membe})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.mempnSubmit = function () {

				delay(function () {                    

                    $http.post("app/dataprocess/userops/mempn.php", {'pn': $scope.mempn})

                            .success(function (data, status, headers, config) {

                                console.log(data.trim());

                            })

                            .error(function (error, status) {

                                console.log(data.error.status);

                            });

                }, 800);

            }

			$scope.changePassword = function () {	

				$scope.pwdchangebtn=true;			    

                    $http.post("app/dataprocess/userops/mempwd.php", {'pwd': $scope.memcurpwd , 'pwd1': $scope.memnewpwd1})

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

			

			

			

			//Profile Upload

			$('#profileupload').on('change', function () {

                var $form = $(this).closest('form');

                $form.find('input[type=submit]').click();

                readprofileURL(this);

            });

            function readprofileURL(input) {

                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('#profileimgshow').attr('src', e.target.result);

                    }

                    reader.readAsDataURL(input.files[0]);

                }

            }

			$('#profilecoverupload').on('change', function () {

                var $form = $(this).closest('form');

                $form.find('input[type=submit]').click();

                readprofilecoverURL(this);

            });

            function readprofilecoverURL(input) {

                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {

                        $('#profilecoverimgshow').attr('src', e.target.result);

                    }

                    reader.readAsDataURL(input.files[0]);

                }

            }

            $(function () {

				var pfprogressbox = $('#pfprogressbox');

                var pfprogressbar = $('#pfprogressbar');

                var pfstatustxt = $('#pfstatustxt');

                var pfsubmitbutton = $("#ProfileSubmitButton");

                var profileform = $("#ProfileUploadForm");

                //var pfoutput = $("#pfoutput");

                var pfcompleted = '0%';

                var pfinput = $("#profileupload");

                $(profileform).ajaxForm({

                    beforeSend: function () { //brfore sending form

                        pfsubmitbutton.attr('disabled', ''); // disable upload button

                        pfstatustxt.empty();

                        pfprogressbox.slideDown(); //show progressbar

                        pfprogressbar.width(pfcompleted); //initial value 0% of progressbar

                        pfstatustxt.html(pfcompleted); //set status text

                        pfstatustxt.css('color', 'white'); //initial color of status text

                        pfprogressbar.height(6 + 'px')

                    },

                    uploadProgress: function (event, position, total, percentComplete) { //on progress

                        pfprogressbar.width(percentComplete + '%') //update progressbar percent complete

                        pfstatustxt.html(percentComplete + '%'); //update status text

                        if (percentComplete > 50)

                        {

                            pfstatustxt.css('color', 'white'); //change status text to white after 50%

                        }

                        if (percentComplete == 100)

                        {

                            pfstatustxt.html('Preparing');

                            pfstatustxt.css('color', 'transparent');

                        }

                    },

                    complete: function (response) { // on complete

                        //cvoutput.html(response.responseText); //update element with received data

                        profileform.resetForm();  // reset form

                        pfsubmitbutton.removeAttr('disabled'); //enable submit button

                        pfprogressbar.height(0 + 'px')

						console.log(response);

                    }

                });

				var pfcvprogressbox = $('#pfcvprogressbox');

                var pfcvprogressbar = $('#pfcvprogressbar');

                var pfcvstatustxt = $('#pfcvstatustxt');

                var pfcvsubmitbutton = $("#ProfileCoverSubmitButton");

                var profilecoverform = $("#ProfileCoverUploadForm");

                //var pfcvoutput = $("#pfcvoutput");

                var pfcvcompleted = '0%';

                var pfcvinput = $("#profilecoverupload");

                $(profilecoverform).ajaxForm({

                    beforeSend: function () { //brfore sending form

                        pfcvsubmitbutton.attr('disabled', ''); // disable upload button

                        pfcvstatustxt.empty();

                        pfcvprogressbox.slideDown(); //show progressbar

                        pfcvprogressbar.width(pfcvcompleted); //initial value 0% of progressbar

                        pfcvstatustxt.html(pfcvcompleted); //set status text

                        pfcvstatustxt.css('color', 'white'); //initial color of status text

                        pfcvprogressbar.height(6 + 'px');

                    },

                    uploadProgress: function (event, position, total, percentComplete) { //on progress

                        pfcvprogressbar.width(percentComplete + '%') //update progressbar percent complete

                        pfcvstatustxt.html(percentComplete + '%'); //update status text

                        if (percentComplete > 50)

                        {

                            pfcvstatustxt.css('color', 'white'); //change status text to white after 50%

                        }

                        if (percentComplete == 100)

                        {

                            pfcvstatustxt.html('Preparing');

                            pfcvstatustxt.css('color', 'transparent');

                        }

                    },

                    complete: function (response) { // on complete

                        //cvoutput.html(response.responseText); //update element with received data

                        //profilecoverform.resetForm();  // reset form

                        pfcvsubmitbutton.removeAttr('disabled'); //enable submit button

                        pfcvprogressbar.height(0 + 'px')

						console.log(response);

                    }

                });

			});

			//End Profile Upload

			$(function() {

        $('.material-card > .mc-btn-action').click(function () {

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

		})

		.controller('selectionController', function ($scope, $http, $mdDialog) {

            //$scope.useract = false;       

            $scope.activated = true;

			$scope.activated1 = true;

			$scope.activated2 = true;

			$(function () {

				$scope.listlegendstory();

				$scope.listeditorstory();

				$scope.listfeaturedstory();

			});

            $scope.listlegendstory=function () {

				$http.get("app/dataprocess/operats/selectlegendsubmitlist.php")

                    .success(function (data) {

                        $scope.activated = false;

                        $scope.legendstory = data;

                    })

                    .error(function () {

                        $scope.legendstory = "error in fetching data";

                    });

			}

			$scope.listeditorstory=function () {

				$http.get("app/dataprocess/operats/selecteditorsubmitlist.php")

                    .success(function (data) {

                        $scope.activated1 = false;

                        $scope.editorstory = data;

                    })

                    .error(function () {

                        $scope.editorstory = "error in fetching data";

                    });

			}

			$scope.listfeaturedstory=function () {

				$http.get("app/dataprocess/operats/selectfeaturedsubmitlist.php")

                    .success(function (data) {

                        $scope.activated2 = false;

                        $scope.featurestory = data;

                    })

                    .error(function () {

                        $scope.featurestory = "error in fetching data";

                    });

			}

			

            $scope.articleSelect = function (stid) {

                $mdDialog.show({

                    locals: {dataToPass: stid},

                    controller: articleSelectCtrl,

                    templateUrl: 'app/templates/selectdialog.tmpl.php',

                    parent: angular.element(document.body),

                    clickOutsideToClose: true, // Only for -xs, -sm breakpoints.

                    fullscreen: true

                })

                        .then(function () {

                            $scope.status = 'No Changes Applied.';

                        });

            };

            function articleSelectCtrl($scope, $http, dataToPass, $sce) {

                $scope.msg = dataToPass;

                $scope.activated = false;

                $scope.review = 'pending';

				$scope.remark="";

                $scope.trustAsHtml = function (string) {

                    return $sce.trustAsHtml(string);

                };

                $http.post("app/dataprocess/articleeditprevmeta.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.storymeta = data;

                            angular.forEach($scope.storymeta, function (item) {

                                $scope.review = item.review;

								$scope.remark=item.remarks;

                            });



                        });

                $http.post("app/dataprocess/articleeditprevcont.php", {'id': $scope.msg})

                        .success(function (data, status, headers, config) {

                            $scope.storycont = data;

                            $scope.activated = true;

                        });

                $scope.hide = function () {

                    $mdDialog.hide();

                };

                $scope.deny = function () {

					$scope.activated = false;

                    $http.post("app/dataprocess/operats/storydenydata.php", {'id': $scope.msg})

                            .success(function (data, status, headers, config) {

                                $scope.reply = 'Removed';

                                $scope.activated = true;

                                $mdDialog.hide('Done');

                            });

                };

                $scope.answer = function (answer) {

                    $scope.activated = false;

                    $http.post("app/dataprocess/operats/storyselectdata.php", {'id': $scope.msg})

                            .success(function (data, status, headers, config) {

                                $scope.reply = 'Selected';

                                $scope.activated = true;

                                $mdDialog.hide('Done');

                            });

                };

            }



        })

		.controller('photologicController', function ($scope, $http) {

			$('#photoupload').on('change', function () {

                var $form = $(this).closest('form');

                $form.find('input[type=submit]').click();

                readURL(this);

				



            });

            function readURL(input) {

				var l = input.files.length;

				console.log("Files Length: "+ l);

				

				for(var i=0;i<l;i++){

                    var reader = new FileReader();

					var fs= input.files[i].size;

					console.log("File Size"+fs);

                    

						console.log("Inside Reader onload");

						var img = $("<img />");

                        img.attr("style", "height:100px;width: 100px");

                        img.attr("src", URL.createObjectURL(input.files[i]));

                        $('#photospreview').append(img);

                   

                    //reader.readAsDataURL(input.files[0]);

//					$(".authenticmessage").append("Checking...");

//					var fs= input.files[0].size;

//					console.log("File Size"+fs);

//					if(fs>1590000){

//						$(".authenticmessage").html("Image Size Too Large(>1.5MB), Image will Not be accepted");

//					}

//					else{

//						$(".authenticmessage").html("Image Will probably be accepted.");

//					}

               

			  }

            }

			$(function () {

				var phprogressbox = $('#progressbox');

                var phprogressbar = $('#progressbar');

                var phstatustxt = $('#statustxt');

                var phsubmitbutton = $("#SubmitButton");

                var photoform = $("#PhotoUploadForm");

                //var pfoutput = $("#pfoutput");

                var phcompleted = '0%';

                var phinput = $("#photoupload");

                $(photoform).ajaxForm({

                    beforeSend: function () { //brfore sending form

                        phsubmitbutton.attr('disabled', ''); // disable upload button

                        phstatustxt.empty();

                        phprogressbox.slideDown(); //show progressbar

                        phprogressbar.width(phcompleted); //initial value 0% of progressbar

                        phstatustxt.html(phcompleted); //set status text

                        phstatustxt.css('color', 'white'); //initial color of status text

                        phprogressbar.height(6 + 'px')

                    },

                    uploadProgress: function (event, position, total, percentComplete) { //on progress

                        phprogressbar.width(percentComplete + '%') //update progressbar percent complete

                        phstatustxt.html(percentComplete + '%'); //update status text

                        if (percentComplete > 50)

                        {

                            phstatustxt.css('color', 'white'); //change status text to white after 50%

                        }

                        if (percentComplete == 100)

                        {

                            phstatustxt.html('Preparing');

                            phstatustxt.css('color', 'transparent');

                        }

                    },

                    complete: function (response) { // on complete

                        //cvoutput.html(response.responseText); //update element with received data

                        photoform.resetForm();  // reset form

                        phsubmitbutton.removeAttr('disabled'); //enable submit button

                        phprogressbar.height(0 + 'px')

						console.log(response);

                    }

                });

			});

		})

        ;