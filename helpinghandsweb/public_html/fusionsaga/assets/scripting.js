//URI				:		helpinghandsgroup.in/fusionsaga
//
//Description		:		Bas kar Pagle...

angular.module('orgApp', ['infinite-scroll'])
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
.controller('contentController', function($scope, $http ,$location , $sce) {
	console.log("This is From Controller");
	var url = $location.absUrl().split('?')[0]
	console.log("This is URL:- "+url);
	$(function () {
								
							});
	$scope.trustAsHtml = function (string) {
                    return $sce.trustAsHtml(string);
                };
	$scope.someFunction = function(fromUI) {

        console.log("Text is from UI: "+ fromUI.trim());
		$http.post("../../fusionsaga/dataprocess/storymeta.php", {'id': fromUI.trim()})
                        .success(function (data, status, headers, config) {
                            $scope.storymeta = data;
                            console.log(data);
							
                        });
                $http.post("../../fusionsaga/dataprocess/storycontent.php", {'id': fromUI.trim()})
                        .success(function (data, status, headers, config) {
                            $scope.storycont = data;
							console.log(data);
                        });
		
    };
	
})
.controller('mediumcurateCtrl', function($scope, $http ,$location , $sce) {
	$scope.trustAsHtml = function (string) {
                    return $sce.trustAsHtml(string);
                };
	$scope.someFunction = function(fromUI) {
        console.log("Text is from UI: "+ fromUI.trim());
		$http.post("../../fusionsaga/dataprocess/mediumcuratestory.php", {'id': fromUI.trim()})
                        .success(function (data, status, headers, config) {
                            $scope.mediumcurate = data;
                            console.log(data);
                        });                
    };
})
.controller('curateCtrl', function($scope, $http ,$location , $sce) {
	$scope.trustAsHtml = function (string) {
                    return $sce.trustAsHtml(string);
                };
	$scope.someFunction = function(fromUI) {
        console.log("Text is from UI: "+ fromUI.trim());
		$http.post("../../fusionsaga/dataprocess/curatestory.php", {'id': fromUI.trim()})
                        .success(function (data, status, headers, config) {
                            $scope.curate = data;
                            console.log(data);
                        });                
    };
})

.controller('topmenuController', function($scope , $http , Story) {
	$scope.weblang="english";
	$(function () {
		$scope.getLanguage();
		
		$(window).scroll(function() {
			var ht=window.innerHeight;
			var pos=window.scrollY;
			
			if(pos>=128){
				$('.catwrap').css({top: 0,left:0, position:'fixed'});
				$('.legendwrap').css({'padding-top': '100px'});
				$('.storypagewrap').css({'margin-top': '100px'});
			}
			else{
				$('.catwrap').css({ position:'relative'});
				$('.legendwrap').css({'padding-top': '48px'});
				$('.storypagewrap').css({'margin-top': '48px'});
			}
			
			
		});
	});
	$scope.getLanguage =  function () {
	  $http.post("../../fusionsaga/dataprocess/language.php", {})
								  .success(function (data, status, headers, config) {
									  console.log(data);	
									  if(data.trim()==="new"){
										  $scope.weblang= "english";	
									  }
									  else{
										  $scope.weblang= data.trim();	
									  }
									  
									  							
								  })
								  .error(function (error, status) {
									  console.log(data.error.status);
								  })
	}
  $scope.languageSelect  = function () {
	  
	  console.log($scope.weblang);
	  $http.post("../../fusionsaga/dataprocess/setlang.php", {'lang': $scope.weblang})
								  .success(function (data, status, headers, config) {
									  console.log(data);	
									  	$(function () {
										  location.reload();
										});						
								  })
								  .error(function (error, status) {
									  console.log(data.error.status);
								  })
	  
  }
})
.controller('legendCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievelegend.php", {'limit': '1', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.legend=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('editorCtrl', function($scope, $http ) {
	
	$http.post("dataprocess/retrieveeditor.php", {'limit': '6', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.editor=data;
									$(function () {
										for (var i = 0; i < data.length; i++) {
										  $(".editorswiperwrapper").append("<div class=\"epbox swiper-slide\"><div class=\"epimagewrap\"><img src=\"http://cdn.helpinghandsgroup.in/"+data[i].arid+"/400/"+data[i].thumbimg+"\" err-SRC=\"http://www.helpinghandsgroup.in/images/nocover.jpg\" class=\"edpickimage\" alt=\""+data[i].title+"\"><div class=\"epimagecover\"></div></div><a href=\"http://www.helpinghandsgroup.in/fusionsaga/"+data[i].arid+"/"+data[i].slug+"\"><span class=\"eptitletext\">"+data[i].title+"</span></a></div>");
										}
										var swiper = new Swiper('.editorswipercontainer', {
											slidesPerView: 3,
											paginationClickable: true,
											spaceBetween: 20,
											nextButton: '.editornext',
											loop: true,
											freeMode: true
										});
									});
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
    
})
.controller('popbigCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievepopbig.php", {'limit': '1', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.bigpop=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('popCtrl', function($scope, $http ) {
	$http.post("../../fusionsaga/dataprocess/retrievefeatured.php", {'limit': '3', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.popular=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('latestbigCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievelatestbig.php", {'limit': '2', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.latbig=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('latestCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievelatest.php", {'limit': '12', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.lat=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('bigvideoCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievebigvideo.php", {'limit': '1', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.bigvid=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('videoCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievevideo.php", {'limit': '9', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.vid=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('bigchewCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievemtbig.php", {'limit': '5', 'offset': 0})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									//$scope.bigchew=data;
									$(function () {
										for (var i = 0; i < data.length; i++) {
											if(data[i].storytype==='video')
											{
										  $(".bigchswiperwrapper").append("<div class=\"legend\">	<a href=\"http://www.helpinghandsgroup.in/fusionsaga/"+data[i].arid+"/"+data[i].slug+"\" >	<img src=\"http://cdn.helpinghandsgroup.in/"+data[i].arid+"/"+data[i].covimg+"\" err-SRC=\"http://www.helpinghandsgroup.in/images/nocover.jpg\" class=\"legendimage\" alt=\""+data[i].title+"\">    <div class=\"legenditemwrap\">  <i class=\"fa fa-play-circle-o videolink legendvideo\" style=\"font-size:24px\"></i>  <span class=\"legendtitle\">"+data[i].title+"</span>    </div>    </a> </div>");
											}
											else{
												$(".bigchswiperwrapper").append("<div class=\"legend\">	<a href=\"http://www.helpinghandsgroup.in/fusionsaga/"+data[i].arid+"/"+data[i].slug+"\" >	<img src=\"http://cdn.helpinghandsgroup.in/"+data[i].arid+"/"+data[i].covimg+"\" err-SRC=\"http://www.helpinghandsgroup.in/images/nocover.jpg\" class=\"legendimage\" alt=\""+data[i].title+"\">    <div class=\"legenditemwrap\">   <span class=\"legendtitle\">"+data[i].title+"</span>    </div>    </a> </div>");
											}
										}
										var swiper = new Swiper('.bigchswipercontainer', {
											paginationClickable: true,
											nextButton: '.bigchnext',
											prevButton: '.bigchprev',
											loop: true,
											freeMode: true
										});
									});
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('mediumchewCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievemchew.php", {'limit': '1', 'offset': 1})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.mediumchew=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('chewCtrl', function($scope, $http ) {
	$http.post("dataprocess/retrievechew.php", {'limit': '8', 'offset': 1})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.chew=data;
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
})
.controller('menublock1Controller', function($scope, $http ) {
	$scope. busy= true;
	$scope.media=[];
	$scope.offset=0;
	$scope.counter=0;
	$scope.prevpress=0;
	$(function () {
		$scope.nextPage();
	});
	$scope.nextPage =  function () {
		if($scope.prevpress===1){
			$scope.offset+=4;
			$scope.prevpress=0;
		}
		$http.post("../../fusionsaga/dataprocess/retrieveent.php", {'limit': '4', 'offset': $scope.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.media=data;
									//var items = data;
									
									$scope.busy = false;
									$scope.offset += 4;
									$scope.counter += 1;
									console.log("Offset:- "+$scope.offset+", Counter:- "+$scope.counter);
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
	}
	$scope.prevPage =  function () {
		$scope.offset -= 8;
		$scope.prevpress=1;
		if(counter!=0){
		$http.post("../../fusionsaga/dataprocess/retrieveent.php", {'limit': '4', 'offset': $scope.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.media=data;
									//var items = data;
									
									$scope.busy = false;
									
									$scope.counter -= 1;
									console.log("Offset:- "+$scope.offset+", Counter:- "+$scope.counter);
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
		}
	}
	

})
.controller('menublock2Controller', function($scope, $http ) {
	$scope. busy= true;
	$scope.media=[];
	$scope.offset=0;
	$scope.counter=0;
	$scope.prevpress=0;
	$(function () {
		$scope.nextPage();
	});
	$scope.nextPage =  function () {
		if($scope.prevpress===1){
			$scope.offset+=4;
			$scope.prevpress=0;
		}
		$http.post("../../fusionsaga/dataprocess/retrievechewmenu.php", {'limit': '4', 'offset': $scope.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.media=data;
									//var items = data;
									
									$scope.busy = false;
									$scope.offset += 4;
									$scope.counter += 1;
									console.log("Offset:- "+$scope.offset+", Counter:- "+$scope.counter);
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
	}
	$scope.prevPage =  function () {
		$scope.offset -= 8;
		$scope.prevpress=1;
		$http.post("../../fusionsaga/dataprocess/retrievechewmenu.php", {'limit': '4', 'offset': $scope.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.media=data;
									//var items = data;
									
									$scope.busy = false;
									
									$scope.counter -= 1;
									console.log("Offset:- "+$scope.offset+", Counter:- "+$scope.counter);
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
	}
	

})
.controller('menublock3Controller', function($scope, $http ) {
	$scope. busy= true;
	$scope.media=[];
	$scope.offset=0;
	$scope.counter=0;
	$scope.prevpress=0;
	$(function () {
		$scope.nextPage();
	});
	$scope.nextPage =  function () {
		if($scope.prevpress===1){
			$scope.offset+=4;
			$scope.prevpress=0;
		}
		$http.post("../../fusionsaga/dataprocess/retrievevideomenu.php", {'limit': '4', 'offset': $scope.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.media=data;
									//var items = data;
									
									$scope.busy = false;
									$scope.offset += 4;
									$scope.counter += 1;
									console.log("Offset:- "+$scope.offset+", Counter:- "+$scope.counter);
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
	}
	$scope.prevPage =  function () {
		$scope.offset -= 8;
		$scope.prevpress=1;
		$http.post("../../fusionsaga/dataprocess/retrievevideomenu.php", {'limit': '4', 'offset': $scope.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									$scope.media=data;
									//var items = data;
									
									$scope.busy = false;
									
									$scope.counter -= 1;
									console.log("Offset:- "+$scope.offset+", Counter:- "+$scope.counter);
                                })
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
	}
	

})

.controller('scrollCtrl', function($scope , $http , Story) {
  $scope.posts = [];
   
  $scope.story = new Story();
})
.factory('Story', function($http ) {
  var Story = function() {
    this.items = [];
    this.busy = false;
	this.offset = 14;
  };
  Story.prototype.nextPage = function() {
    if (this.busy) return;
    this.busy = true;
    $http.post("../../fusionsaga/dataprocess/retrievescroll.php", {'limit': '6', 'offset': this.offset})
                                .success(function (data, status, headers, config) {
                                    console.log(data);
									//$scope.media=data;
									//var items = data;
									for (var i = 0; i < data.length; i++) {
									  this.items.push(data[i]);
									}
									this.busy = false;
									this.offset = this.offset+6;
                                }.bind(this))
                                .error(function (error, status) {
                                    console.log(data.error.status);
                                }) 
  };
  return Story;
})

