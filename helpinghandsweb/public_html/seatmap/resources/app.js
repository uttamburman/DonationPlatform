// JavaScript Document
angular.module('SeatMap',['ngMaterial'])
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
.controller('seatMapping', function( $scope, $timeout, $mdSidenav, $log, $http, $compile, $mdToast ){
	
	$scope.fabisvisible= true;
     
	$scope.toggleRight = buildToggler('right');
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
			function buildToggler(navID) {
			  return function() {
				// Component lookup should always be available since we are not using `ng-if`
				$mdSidenav(navID)
				  .toggle()
				  .then(function () {
					$log.debug("toggle " + navID +" is done");
				  });
			  };
			}
	console.log("This is From seatMapping Controller");
	
	
	$(function () {
		 $("#canva").draggable({
			 cursor: 'move'
		 });

		 $(".section").draggable({
			 cursor: 'move',
			 containment: 'parent',
			 drag: function (event, ui) {

				 var divPos = ui.position.top;
				 if (divPos < -20) {

					 ui.position.top = -20;

				 }
			 }
		 });
		
	 });
	
	
	
	//var objarr = { "bitch" : {"name": "hilton hotel" }, "please" : {"name": "newton hotel"} };
	//var len= objarr.length;
	//objarr["know"]= {"name": "dude hotel" };
	//console.log(objarr);
	
	//-----------------------------------------------
	var sects= {};
	var temp_excs= {};
	var cur_elem= 0;
	
	
	$scope.saveMap = function () {
                    $scope.savemsg = 'Saving Map';
                    var smap = sects;
                    console.log(smap);
                    var smapstr = JSON.stringify(smap);
                    console.log(smapstr);
                    $http.post("rest/artichip.php", {'mid': 2, 's_map': smapstr})
                            .success(function (data, status, headers, config) {
                                console.log(data);
								$scope.savemsg = 'Map Saved';
                            })
                            .error(function (error, status) {
                                console.log(data.error.status);
                            });
               
            }
	
	$scope.newSection = function () {
		$(".des_canv").html("");
		var sects_length= Object.keys(sects).length;
		var sectid= 1000+sects_length;
		console.log("length: "+ sects_length);
		var new_secname= sects_length+1;
		sects[sects_length]= {"secid": sectid , "secname": "Section_"+new_secname, "posx": 700 , "posy": 700 , "val1": 10 , "val2": 6 , "rot_angle": 0 , "subtype" : "none" , "type": "section" , "excs" : {} , "curv" : 0, "skewx": 0, "skewy": 0, "l_lbl" : 1, "r_lbl": 1, "st_seat":1, "st_diff":0, "updown":'incremental'};
		console.log(sects);
		$(function () {	
				$scope.plotElements();	
				
		});
		
	}
	$scope.newTable = function () {
		var sects_length= Object.keys(sects).length;
		var new_secname= sects_length+1;
		var sectid= 1000+sects_length;		
		console.log(sects_length);
		sects[sects_length]= {"secid": sectid , "secname": "Section_"+new_secname, "posx": 1000 , "posy": 1000 , "val1": 10 , "val2": 0 , "rot_angle": 0 , "subtype" : "circle" , "type": "table" , "excs" : "none" , "curv" : 0, "skewx": 0, "skewy": 0, "l_lbl" : 1, "r_lbl": 1, "st_seat":1, "st_diff":1, "updown":'incremental'};
		var vali= sects[sects_length].val1;
		//console.log(vali);
		$(function () {	
				$scope.plotElements();	
				
		});
		
		
		
	}
	$scope.newBulkCurve = function () {
		//sects = {};  Make sure only Bulk Seating Category Exists in Seating Chart
		var sects_length= Object.keys(sects).length;
		var new_secname= sects_length+1;
		var sectid= 1000+sects_length;		
		console.log(sects_length);
		sects[sects_length]= {"secid": sectid , "secname": "Section_"+new_secname, "posx": 800 , "posy": 800 , "val1": 0 , "val2": 160.99 , "rot_angle": 0 , "subtype" : "arc" , "type": "bulkcurve" , "excs" : "none" , "curv" : 100, "skewx": 0, "skewy": 0, "l_lbl" : "Curve Block A", "r_lbl": 0, "st_seat":0, "st_diff":"#446688", "updown":100};
		var vali= sects[sects_length].val1;
		//console.log(vali);
		$(function () {	
				$scope.plotElements();	
				
		});
		
		
		
	}
	
	$scope.plotElements = function(){
		$(".des_canv").html("");
		var sects_length= Object.keys(sects).length;
		var sectid= 1000+sects_length;
		// Function for Converting PStart and End Polar Angle to Cartesian Angle
		function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
			  var angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;

			  return {
				x: centerX + (radius * Math.cos(angleInRadians)),
				y: centerY + (radius * Math.sin(angleInRadians))
			  };
			}
		// Function for Returning Values 
		function describeArc(x, y, radius, startAngle, endAngle){
				console.log("Came here"+ x +"|"+ y +"|"+ radius +"|"+ startAngle +"|"+ endAngle);
				var start = polarToCartesian(x, y, radius, endAngle);
				var end = polarToCartesian(x, y, radius, startAngle);

				var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

				var d = [
					"M", start.x, start.y, 
					"A", radius, radius, 0, largeArcFlag, 0, end.x, end.y
				].join(" ");

				return d;       
			}
		console.log(sects);
		for (var key in sects) {
			var threshrowy = 0;
			var threshspy= 0;
			var threshspx= 0;
			var excs_lth= Object.keys(sects[key].excs).length;
			var top_bot_lbl = 0;
			if(sects[key].type=="section"){
				var crv= sects[key].curv;
				var max_top = crv/2;
				var indl_val = crv/sects[key].val2;
				var half_col = parseInt(sects[key].val2/2);
				//var half_col = parseInt((parseInt(sects[key].val2)+parseInt(+sects[key].st_seat))/2);
				//console.log(half_col);
				if(crv<0){
					threshspy=-(max_top);
					console.log(threshspy);
				}
				else{
					threshspy=max_top;
				}
				
				var z_index=0;
				//threshspy = 
				$(".des_canv").append($compile("<div ng-click=\"showOptions("+key+")\" class=\"section sec_"+key+"_"+sects[key].secname+"\" id=\""+key+"\" style=\"position:absolute;left:"+sects[key].posx+"px;top:"+sects[key].posy+"px;min-height:50px;min-width:50px;height:"+sects[key].val1*36+"px; width:"+sects[key].val2*30+"px; padding:4px; border-radius:3px; -ms-transform: rotate("+sects[key].rot_angle+"deg) skew("+sects[key].skewx+"deg,"+sects[key].skewy+"deg); -webkit-transform: rotate("+sects[key].rot_angle+"deg) skew("+sects[key].skewx+"deg,"+sects[key].skewy+"deg); transform: rotate("+sects[key].rot_angle+"deg) skew("+sects[key].skewx+"deg,"+sects[key].skewy+"deg);cursor:move;\"><div class=\"rpoint section sec_"+key+"_"+sects[key].secname+"rpt\"></div><div class=\"rline\"></div></div>")($scope));
				var tot_seats= sects[key].val1 * sects[key].val2;
				var row_start_seat = parseInt(sects[key].st_seat);
				for(var i=1;i<=sects[key].val1;i++){
					
					$(".sec_"+key+"_"+sects[key].secname+"").append("<div class=\"seat_row seat_row_"+sects[key].secname + i+"\" style=\"top: "+threshrowy+"px;z-index:"+z_index+"\"></div>");
					if(sects[key].l_lbl=== 1){
						$(".seat_row_"+sects[key].secname + i+"").append($compile("<div class=\"rowname rnleft\" style=\"top:"+max_top*1.2+"px;\" id=\"rowname\" ng-click=\" modifyRowSeats("+ key +", "+i+")\">"+String.fromCharCode(64 + i)+"</div>")($scope));
					}
					if(sects[key].r_lbl=== 1){
						$(".seat_row_"+sects[key].secname + i+"").append($compile("<div class=\"rowname rnright\" style=\"top:"+max_top*1.2+"px;\" id=\"rowname\" ng-click=\" modifyRowSeats("+ key +", "+i+")\">"+String.fromCharCode(64 + i)+"</div>")($scope));
					}
					var nm=row_start_seat;
					var lst_seat = row_start_seat+parseInt(sects[key].val2-1);
					var point_count =1;
					threshrowy+=36;
					threshspx=0;
					if(crv>=0){
						z_index-=1;
					}
					else{
						z_index+=1;
					}
					//console.log(lst_seat);
					
					for(var j=row_start_seat;j<=lst_seat;j++){
						//threshspy = max_top;
						//console.log(point_count+"-"+half_col);
						if(crv>0||crv<0){
							
							if(point_count<=half_col){
									threshspy = threshspy*0.8;
									threshspy = threshspy-(indl_val*1.9);								
								
							}
							else if(point_count==half_col){
								//threshspy=0;
							}
							else if(point_count>half_col){								
									threshspy = threshspy*1.1;
									threshspy = threshspy+(indl_val*1.9);							
								
							}
						}
						if(j==row_start_seat){
							threshspy = max_top-(indl_val*0.4);
						}
						//console.log("Pos Y "+threshspy);
						if(excs_lth>0){
							var keyid= key+"_"+i+"_"+j;
							if(!(keyid in sects[key].excs) ){
								$(".seat_row_"+sects[key].secname +i+"").append($compile("<div ng-click=\" modifySeat("+ key +", "+i+", "+j+") \" class=\"seatpoint\" id=\""+ key + "_"+i+"_"+j+"\" style=\"top: "+threshspy+"px; left: "+threshspx+"px;\">"+nm+"</div>")($scope));
								nm++;
								threshspx+=30;
							}
							else{
								$(".seat_row_"+sects[key].secname +i+"").append("<div class=\"seatpoint remseat\" style=\"top: "+threshspy+"px; left: "+threshspx+"px;\"></div>");
								threshspx+=30;
							}
						}
						else{
							$(".seat_row_"+sects[key].secname +i+"").append($compile("<div ng-click=\" modifySeat("+ key +", "+i+", "+j+") \" class=\"seatpoint\" id=\""+ key + "_"+i+"_"+j+"\" style=\"top: "+threshspy+"px; left: "+threshspx+"px;\">"+nm+"</div>")($scope));
								nm++;
								threshspx+=30;
						}
						point_count+=1;
					}
					if(sects[key].updown==='incremental'){
						row_start_seat=row_start_seat+parseInt(sects[key].st_diff);
					}
					else if(sects[key].updown==='decremental'){
						row_start_seat=row_start_seat-parseInt(sects[key].st_diff);
						if(row_start_seat<=0){
							row_start_seat=1;
						}
					}
					
				}
			}
			else if(sects[key].type==="table"){
				var table_chairs = sects[key].val1;
				var wdth = 100;
				if(table_chairs<=5){
					wdth =  40;
				}
				else if(table_chairs>5 & table_chairs<=10){
					wdth =  75;
				}
				else if(table_chairs>10 & table_chairs<=20){
					wdth =  120;
				}
				else if(table_chairs>20 & table_chairs<=30){
					wdth =  150;
				}
				else if(table_chairs>30 & table_chairs<=50){
					wdth =  260;
				}
				else if(table_chairs>50 & table_chairs<=75){
					wdth =  360;
				}
				else if(table_chairs>75 & table_chairs<=100){
					wdth =  440;
				}
				$(".des_canv").append($compile("<div ng-click=\"showTableOptions("+key+")\" class=\"table sec_"+key+"_"+sects[key].secname+"\" id=\""+key+"\" style=\"position:absolute;left:"+sects[key].posx+"px;top:"+sects[key].posy+"px;min-height:50px;min-width:50px;height:"+wdth*2.2+"px; width:"+wdth*2.2+"px; padding:4px; border-radius:3px; -ms-transform: rotate("+sects[key].rot_angle+"deg) ; -webkit-transform: rotate("+sects[key].rot_angle+"deg); transform: rotate("+sects[key].rot_angle+"deg);cursor:move;\"><div class=\"rpoint section sec_"+key+"_"+sects[key].secname+"rpt\"></div><div class=\"rline\"></div><div class=\"innercircle\"></div></div>")($scope));
				//Plot Chairs around circular Table
				for(var i=1; i <= sects[key].val1; i++){					
					$(".sec_"+key+"_"+sects[key].secname+"").append("<div class=\"chairs chair"+key+" chair_"+i+"_sec_"+key+"_"+sects[key].secname+"\">"+i+"</div>");
				}
				var elems = document.getElementsByClassName('chair'+key+'');

                var increase = Math.PI * 2 / elems.length;
                var x = 0, y = 0, angle = 0;

                for (var i = 0; i < elems.length; i++) {
 					var elem = elems[i];
                    // modify to change the radius and position of a circle
                    x = wdth * Math.cos(angle) + wdth;
                    y = wdth * Math.sin(angle) + wdth;
                    elem.style.position = 'absolute';
                    elem.style.left = x + 'px';
                    elem.style.top = y + 'px';                    
                    var rot = 90 + (i * (360 / elems.length));
                    elem.style['-moz-transform'] = "rotate("+rot+"deg)";
                    elem.style.MozTransform = "rotate("+rot+"deg)";
                    elem.style['-webkit-transform'] = "rotate("+rot+"deg)";
                    elem.style['-o-transform'] = "rotate("+rot+"deg)";
                    elem.style['-ms-transform'] = "rotate("+rot+"deg)";
                    angle += increase;
                    console.log(angle/ Math.PI * 180);
                }
			}
			else if(sects[key].type==="bulkcurve"){
				var svgwidth = 1000;
				var svgheight= 1000;
				var px= 500;
				var py= 500;
				
				var svgs = $(".des_canv").find('svg');
				if(svgs.length<1){
					console.log("Here inside 1");
					$(".des_canv").append("<svg  class=\"curvsvg \" id=\""+key+"\" style=\"width:"+svgwidth+"px; height:"+svgheight+"px; position:absolute;overflow:visible; top:500px; left:800px; \"><defs></defs> </svg>");
					
					$("defs").append("<path id=\"textpath"+key+"\" d=\""+describeArc(px, py, sects[key].curv, sects[key].val1, sects[key].val2)+"\" />");
					
					$(".curvsvg").append("<path ng-click=\"showCurveOptions("+key+")\" class=\"curve curve_"+key+"_"+sects[key].secname+"\" fill=\"none\" stroke=\""+sects[key].st_diff+"\" stroke-width=\""+sects[key].updown+"\" /> <text class=\"tx\" x=\"5\" y=\"50\" style=\"stroke: #000000; font-family: Roboto; font-size: 12px; font-weight: 100; stroke: #000000; letter-spacing:1px;\" text-anchor=\"middle\"><textPath xlink:href=\"#textpath"+key+"\" startOffset=\"50%\">"+sects[key].l_lbl+"</textPath></text>");
					
					$(".curve_"+key+"_"+sects[key].secname+"").attr("d", describeArc(px, py, sects[key].curv, sects[key].val1, sects[key].val2));
					$(".des_canv").html($compile($(".des_canv").html())($scope)); //Refresh SVG Element , Refresh DOM Namespace
				}
				else if(svgs.length>=1){
					console.log("Here inside 2");
					$("defs").append("<path id=\"textpath"+key+"\" d=\""+describeArc(px, py, sects[key].curv, sects[key].val1, sects[key].val2)+"\" />");
					
					$(".curvsvg").append("<path ng-click=\"showCurveOptions("+key+")\" class=\"curve curve_"+key+"_"+sects[key].secname+"\" fill=\"none\" stroke=\""+sects[key].st_diff+"\" stroke-width=\""+sects[key].updown+"\" /> <text class=\"tx\" x=\"5\" y=\"50\" style=\"stroke: #000000; font-family: Roboto; font-size: 12px; font-weight: 100; stroke: #000000; letter-spacing:1px;\" text-anchor=\"middle\"><textPath xlink:href=\"#textpath"+key+"\" startOffset=\"50%\">"+sects[key].l_lbl+"</textPath></text>");
					
					$(".curve_"+key+"_"+sects[key].secname+"").attr("d", describeArc(px, py, sects[key].curv, sects[key].val1, sects[key].val2));
					$(".des_canv").html($compile($(".des_canv").html())($scope)); //Refresh SVG Element , Refresh DOM Namespace
				}
				console.log(svgs.length);
				
			}
			//Draggable Init
				$(".sec_"+key+"_"+sects[key].secname+"").draggable({
						 cursor: 'move',
						 containment: 'parent',
						 cancel: "div.rpoint, div.rline",
						 drag: function (event, ui) {
							 var item = event.target;
							 var divPos = ui.position.top;
							 if (divPos < -20) {
								 ui.position.top = -20;
							 }
							 sects[item.id].posx = ui.position.left;
							 sects[item.id].posy = ui.position.top;
							 
						 }
					 });
			
			//Rotatable
			$(".sec_"+key+"_"+sects[key].secname+"").rotatable( {
				handle: $(".sec_"+key+"_"+sects[key].secname+"rpt"),
				 start: function(event, ui) {
					 console.log("Started");
				},
				stop: function(event, ui) {
						var item = event.target;
						var new_angle = ui.angle.stop/ Math.PI * 180;
						sects[item.id].rot_angle = new_angle;
				}
			} );
			
			//Draggable For Bulk Seating unavailable
			
			//function bracket closer			
		}
	}
	$scope.showOptions = function (keyval) {
		$scope.rows= sects[keyval].val1;
		$scope.cols= sects[keyval].val2;
		$scope.sec_name= sects[keyval].secname;
		$scope.rotang= sects[keyval].rot_angle;
		$scope.curv= sects[keyval].curv;
		$scope.l_lbl= sects[keyval].l_lbl;
		$scope.r_lbl= sects[keyval].r_lbl;
		$scope.skwx= sects[keyval].skewx;
		$scope.skwy= sects[keyval].skewy;
		$scope.st_seat= sects[keyval].st_seat;
		$scope.st_diff= sects[keyval].st_diff;
		$scope.ud= sects[keyval].updown;
		//console.log($scope.rows);
		$mdToast.show({
		  locals: {row: $scope.rows, col: $scope.cols, nme: $scope.sec_name, rtangle: $scope.rotang , crv : $scope.curv, llbl : $scope.l_lbl, rlbl : $scope.r_lbl, skwx : $scope.skwx, skwy : $scope.skwy, sts : $scope.st_seat, std : $scope.st_diff, ud : $scope.ud },
          hideDelay   : 0,
          position    : 'bottom right',
          controller  : 'ToastCtrl',
          template : '<md-toast ><div layout="column" md-theme="dark-purple" class="md-block"><md-tabs md-dynamic-height md-border-bottom md-selected="selectedTab" md-stretch-tabs="always"><md-tab label="Options"><div layout="column" md-theme="dark-purple">    <div flex layout="column"> <div flex><md-input-container>        <label>Rows</label> <input ng-value="rows" ng-model="rows">      </md-input-container><md-input-container>        <label>Seats every Row</label> <input ng-value="cols" ng-model="cols">      </md-input-container></div></div><div layout class="md-block"><md-slider-container flex>  <span>Angle</span>  <md-slider flex class="md-primary" md-discrete ng-model="rotangle" step="1" min="-90" max="271" aria-label="Angle"> </md-slider><md-input-container><input flex type="number" ng-model="rotangle" aria-label="rotangle" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><md-slider-container flex>  <span>Curve</span>  <md-slider flex class="md-primary" md-discrete ng-model="curvangle" step="5" min="-90" max="90" aria-label="Angle"> </md-slider><md-input-container><input flex type="number" ng-model="curvangle" aria-label="curve" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><md-slider-container flex>  <span>→ SkewX</span>  <md-slider flex class="md-primary" md-discrete ng-model="skewanglex" step="5" min="-30" max="30" aria-label="Skew"> </md-slider><md-input-container><input flex type="number" ng-model="skewanglex" aria-label="SkewX" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><md-slider-container flex>  <span>↓ SkewY</span>  <md-slider flex class="md-primary" md-discrete ng-model="skewangley" step="5" min="-30" max="30" aria-label="SkewY"> </md-slider><md-input-container><input flex type="number" ng-model="skewangley" aria-label="Skew" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div></div></md-tab><md-tab label="Labels"><div layout="column" md-theme="dark-purple" class="md-block"><div flex><md-input-container class="md-block">        <label>Name</label> <input ng-value="sec_name" ng-model="sec_name">      </md-input-container></div><div  layout="row"><div flex layout="column"><span class="md-body-1">Left Label</span><md-switch ng-model="lftlbl" aria-label="Switch 2" ng-true-value="1" ng-false-value="0" class="md-primary"> {{ lftlbl }}  </md-switch></div><div flex layout="column"><span class="md-body-1">Right Label</span><md-switch ng-model="rgtlbl" aria-label="Switch 2" ng-true-value="1" ng-false-value="0" class="md-primary"> {{ rgtlbl }}  </md-switch></div></div><div  layout="row"><div flex class="strseats" layout="column"><span class="md-body-1 slbl">Start Seats</span><md-input-container>        <label>Start Seat From</label> <input ng-value="stseats" ng-model="stseats">      </md-input-container></div><div flex layout="column"><span class="md-body-1"> Row Difference</span><md-input-container>        <label>Start Seat From</label> <input ng-value="seatdiff" ng-model="seatdiff">      </md-input-container><md-switch ng-model="updown" aria-label="Switch 2" ng-true-value="\'incremental\'" ng-false-value="\'decremental\'" class="swtch md-primary"> {{ updown }}  </md-switch></div></div> </div></md-tab></md-tabs><div class="toastbtn" flex layout="row" md-theme="default"><md-button class="md-fab md-primary" ng-click="applySpec(rows, cols , sec_name)"><md-tooltip md-direction="top">Apply</md-tooltip><i class="material-icons">done</i> </md-button><md-button class="md-fab" ng-click="duplicateSection()"><i class="material-icons toastbtnico">content_copy</i> </md-button><md-button class="md-fab md-raised" ng-click="deleteSection()"><i class="material-icons toastbtnico">delete_forever</i> </md-button><md-button class="md-fab md-raised" ng-click="resetLabel()"><i class="material-icons toastbtnico">label_outline</i> </md-button><md-button class="md-primary" style="width:120px !important;" ng-click="restoreSeats()">Restore Seats </md-button></div></div></md-toast>'
        })
				.then(function ( result ) {
							//console.log("Returned Row"+ result.newrow);
							//console.log("Returned Col"+ result.newcol);
							//console.log("Returned Name"+ result.newname);
							if(result.del==0){
								sects[keyval].val1= result.newrow;
								sects[keyval].val2= result.newcol;
								sects[keyval].secname= result.newname;
								sects[keyval].rot_angle= result.rotangle;
								sects[keyval].curv= result.curvangle;
								sects[keyval].skewx= result.skewanglex;
								sects[keyval].skewy= result.skewangley;
								sects[keyval].l_lbl= result.llbl;
								sects[keyval].r_lbl= result.rlbl;
								sects[keyval].st_seat= result.stset;
								sects[keyval].st_diff= result.stdff;
								sects[keyval].updown= result.upd;
							}
							else if(result.del==1){
								delete sects[keyval];
							}
							if(result.dup==1){
								var newkeyval= Object.keys(sects).length;
								var sectid= 1000+newkeyval;
								var new_secname= newkeyval+1;
								sects[newkeyval]= {"secid": sectid , "secname": "Section_"+new_secname, "posx": sects[keyval].posx+40 , "posy": sects[keyval].posy+40 , "val1": sects[keyval].val1 , "val2": sects[keyval].val2 , "rot_angle": sects[keyval].rot_angle , "subtype" : "none" , "type": "section" , "excs" : sects[keyval].excs , "curv" : sects[keyval].curv, "skewx": sects[keyval].skewx, "skewy": sects[keyval].skewy, "l_lbl" : sects[keyval].l_lbl, "r_lbl": sects[keyval].r_lbl, "st_seat":sects[keyval].st_seat, "st_diff":sects[keyval].st_diff, "updown":sects[keyval].updown};
								//sects[newkeyval]=
								
							}
							if(result.reslbl==1){
								sects[keyval].st_seat= 1;
								sects[keyval].st_diff= 0;
							}
							if(result.reseat==1){
								sects[keyval].excs= {};
							}
								
							$(function () {	
							    $scope.plotElements();		
							});
                        })
	}
	$scope.showTableOptions = function (keyval) {
		$scope.rows= sects[keyval].val1;
		$scope.cols= 0;
		$scope.sec_name= sects[keyval].secname;
		$scope.rotang= sects[keyval].rot_angle;
		$scope.curv= sects[keyval].curv;
		$scope.l_lbl= sects[keyval].l_lbl;
		$scope.r_lbl= sects[keyval].r_lbl;
		$scope.skwx= sects[keyval].skewx;
		$scope.skwy= sects[keyval].skewy;
		$scope.st_seat= sects[keyval].st_seat;
		$scope.st_diff= sects[keyval].stdiff;
		$scope.ud= sects[keyval].updown;
		//console.log($scope.rows);
		$mdToast.show({
		  locals: {row: $scope.rows, col: $scope.cols, nme: $scope.sec_name, rtangle: $scope.rotang , crv : $scope.curv, llbl : $scope.l_lbl, rlbl : $scope.r_lbl, skwx : $scope.skwx, skwy : $scope.skwy, sts : $scope.st_seat, std : $scope.st_diff, ud : $scope.ud },
          hideDelay   : 0,
          position    : 'bottom right',
          controller  : 'ToastCtrl',
          template : '<md-toast ><div layout="column" md-theme="dark-purple">  <div flex><span class="md-toast-text" flex>Options</span></div>  <div flex layout="column"> <div flex><md-input-container>        <label>Chairs</label> <input ng-value="rows" ng-model="rows">      </md-input-container></div></div><div flex><md-input-container class="md-block">        <label>Name</label> <input ng-value="sec_name" ng-model="sec_name">      </md-input-container></div><div layout class="md-block"><md-slider-container flex>  <span>Angle</span>  <md-slider flex class="md-primary" md-discrete ng-model="rotangle" step="1" min="-90" max="271" aria-label="Angle"> </md-slider><md-input-container><input flex type="number" ng-model="rotangle" aria-label="rotangle" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div class="toastbtn" flex layout="row" md-theme="default"><md-button class="md-fab md-primary" ng-click="applySpec(rows, cols , sec_name)"><md-tooltip md-direction="top">Apply</md-tooltip><i class="material-icons">done</i> </md-button><md-button class="md-fab" ng-click="duplicateSection()"><md-tooltip md-direction="top">Duplicate</md-tooltip><i class="material-icons toastbtnico">content_copy</i> </md-button></div></md-toast>'
        })
				.then(function ( result ) {
							//console.log("Returned Row"+ result.newrow);
							//console.log("Returned Col"+ result.newcol);
							//console.log("Returned Name"+ result.newname);
							sects[keyval].val1= result.newrow;
							sects[keyval].secname= result.newname;
							sects[keyval].rot_angle= result.rotangle;
							$(function () {	
							    $scope.plotElements();		
							});
                        })
	}
	$scope.modifyRowSeats = function (key, navrow) {
		var elmnts = $(".seat_row_"+sects[key].secname +navrow+"" ).children();
		var i=1;
		//console.log(elmnts);
		for (var elm in elmnts) {
			var elm_id=elmnts[elm].id;
			var e_id= elm_id+"";			
			if(e_id.charAt(0)==key){
				i++;
				var elm_col=elmnts[elm].innerText;
				console.log(elm_col);
				$(function () {	
					$scope.modifySeat(key, navrow, elm_col);		
				});
			}
		}		
	}
	$scope.modifySeat = function (key, navrow, navcol) {
		//console.log("Key: " + key + "Row: " + navrow + " Col: " + navcol);
		var excs_length= Object.keys(temp_excs).length;
		if(excs_length==0){
			$(function () {	
				$scope.AddRemoveSeat(key, navrow, navcol);		
			});
			
		}
		else{
			for (var elm in temp_excs) {
				var elmkey= elm.charAt(0);
				if(elmkey == key){

					$scope.AddRemoveSeat(key, navrow, navcol);	
					break;
				}
				else{
					temp_excs = {};
					$( ".seatpoint").removeClass('selectionseat');
					$scope.AddRemoveSeat(key, navrow, navcol);
					break;
				}
			}
		}
		
		
		
		
		
		
		
//		var excs_length= Object.keys(sects[key].excs).length;
//		sects[key].excs[excs_length] = {"rownum": navrow , "colnum" : navcol};
//		console.log(sects);
	}
	$scope.AddRemoveSeat = function (key, navrow, navcol) {
		var keyid= key+"_"+navrow+"_"+navcol;
		
		if(!(keyid in temp_excs) ){
			temp_excs[keyid] = {"rownum": navrow , "colnum" : navcol};
			
			$(function () {	
				$( "#"+key+'_'+navrow+'_'+navcol +"").addClass('selectionseat');
			});
			$scope.fabisvisible= false;
		}
		else{
			delete temp_excs[keyid];
			$(function () {	
				$( "#"+key+'_'+navrow+'_'+navcol +"").removeClass('selectionseat');
			});
			var excs_len= Object.keys(temp_excs).length;
			if(excs_len>=1){
				$scope.fabisvisible= false;
			}
			else{
				$scope.fabisvisible= true;
			}
		}
	}
	$scope.deleteSeats = function () {
		for (var elm in temp_excs) {
			var elmkey= elm.charAt(0);
			var excs_length= Object.keys(sects[elmkey].excs).length;
			
			sects[elmkey].excs[elm]= {"rownum": temp_excs[elm].rownum , "colnum" : temp_excs[elm].colnum};
			
		}
		$(function () {	
				$scope.plotElements();	
				
		});
		$scope.fabisvisible= true;
	}
	$scope.restoreSeats = function () {
		for (var elm in temp_excs) {
				var elmkey= elm.charAt(0);
				sects[elmkey].excs ={};
		}
		$(function () {	
				$scope.plotElements();	
				
		});
		$scope.fabisvisible= true;
	}
	$scope.showCurveOptions = function (keyval) {
		console.log("Compiled: "+keyval);
		$scope.rows= sects[keyval].val1;
		$scope.cols= sects[keyval].val2;
		$scope.sec_name= sects[keyval].secname;
		$scope.rotang= sects[keyval].rot_angle;
		$scope.curv= sects[keyval].curv;
		$scope.l_lbl= sects[keyval].l_lbl;
		$scope.r_lbl= sects[keyval].r_lbl;
		$scope.skwx= sects[keyval].skewx;
		$scope.skwy= sects[keyval].skewy;
		$scope.st_seat= sects[keyval].st_seat;
		$scope.st_diff= sects[keyval].st_diff;
		$scope.ud= sects[keyval].updown;
		//console.log($scope.rows);
		$mdToast.show({
		  locals: {row: $scope.rows, col: $scope.cols, nme: $scope.sec_name, rtangle: $scope.rotang , crv : $scope.curv, llbl : $scope.l_lbl, rlbl : $scope.r_lbl, skwx : $scope.skwx, skwy : $scope.skwy, sts : $scope.st_seat, std : $scope.st_diff, ud : $scope.ud },
          hideDelay   : 0,
          position    : 'bottom right',
          controller  : 'ToastCtrl',
          template : '<md-toast ><div layout="column" md-theme="dark-purple" class="md-block"> <div layout="column" md-theme="dark-purple"><div layout class="md-block"><md-slider-container flex>  <span>Radius</span>  <md-slider flex class="md-primary" md-discrete ng-model="curvangle" step="5" min="20" max="400" aria-label="Angle"> </md-slider><md-input-container><input flex type="number" ng-model="curvangle" aria-label="rotangle" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><md-slider-container flex>  <span>Width</span>  <md-slider flex class="md-primary" md-discrete ng-model="updown" step="5" min="20" max="200" aria-label="Angle"> </md-slider><md-input-container><input flex type="number" ng-model="updown" aria-label="curve" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><md-slider-container flex>  <span>→ Start</span>  <md-slider flex class="md-primary" md-discrete ng-model="rows" step="5" min="0" max="355" aria-label="Skew"> </md-slider><md-input-container><input flex type="number" ng-model="rows" aria-label="SkewX" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><md-slider-container flex>  <span>↓ Stop</span>  <md-slider flex class="md-primary" md-discrete ng-model="cols" step="5" min="10" max="359" aria-label="SkewY"> </md-slider><md-input-container><input flex type="number" ng-model="cols" aria-label="Skew" aria-controls="angle-slider"> </md-input-container> </md-slider-container></div><div layout class="md-block"><div flex><div layout="row"><md-input-container>        <label>Color</label> <input ng-value="seatdiff" ng-model="seatdiff">      </md-input-container><div ng-attr-style="border: 1px solid gray; height:48px; width:40px; background: {{seatdiff}} ;)">     </div></div></div></div><div layout class="md-block"><div flex><md-input-container>        <label>Label</label> <input ng-value="lftlbl" ng-model="lftlbl">      </md-input-container></div></div></div><div class="toastbtn" flex layout="row" md-theme="default"><md-button class="md-fab md-primary" ng-click="applySpec(rows, cols , sec_name)"><md-tooltip md-direction="top">Apply</md-tooltip><i class="material-icons">done</i> </md-button><md-button class="md-fab" ng-click="duplicateSection()"><i class="material-icons toastbtnico">content_copy</i> </md-button><md-button class="md-fab md-raised" ng-click="deleteSection()"><i class="material-icons toastbtnico">delete_forever</i> </md-button><md-button class="md-fab md-raised" ng-click="resetCurve()"><i class="material-icons toastbtnico">label_outline</i> </md-button></div></div></md-toast>'
        })
				.then(function ( result ) {
							//console.log("Returned Row"+ result.newrow);
							//console.log("Returned Col"+ result.newcol);
							//console.log("Returned Name"+ result.newname);
							if(result.del==0){
								sects[keyval].val1= result.newrow;
								sects[keyval].val2= result.newcol;
								sects[keyval].secname= result.newname;
								sects[keyval].rot_angle= result.rotangle;
								sects[keyval].curv= result.curvangle;
								sects[keyval].skewx= result.skewanglex;
								sects[keyval].skewy= result.skewangley;
								sects[keyval].l_lbl= result.llbl;
								sects[keyval].r_lbl= result.rlbl;
								sects[keyval].st_seat= result.stset;
								sects[keyval].st_diff= result.stdff;
								sects[keyval].updown= result.upd;
							}
							else if(result.del==1){
								delete sects[keyval];
							}
							if(result.dup==1){
								var newkeyval= Object.keys(sects).length;
								var sectid= 1000+newkeyval;
								var new_secname= newkeyval+1;
								sects[newkeyval]= {"secid": sectid , "secname": "Section_"+new_secname, "posx": sects[keyval].posx , "posy": sects[keyval].posy , "val1": sects[keyval].val2+2 , "val2": sects[keyval].val2+20 , "rot_angle": sects[keyval].rot_angle , "subtype" : "arc" , "type": "bulkcurve" , "excs" : sects[keyval].excs , "curv" : sects[keyval].curv, "skewx": sects[keyval].skewx, "skewy": sects[keyval].skewy, "l_lbl" : sects[keyval].l_lbl, "r_lbl": sects[keyval].r_lbl, "st_seat":sects[keyval].st_seat, "st_diff":sects[keyval].st_diff, "updown":sects[keyval].updown};
								//sects[newkeyval]=
								
							}
							$(function () {	
							    $scope.plotElements();		
							});
				
	})
	}
})
.controller('ToastCtrl', function($scope, $mdToast, row , col , nme , rtangle , crv, llbl, rlbl, skwx, skwy, sts, std, ud , $mdDialog) {
	$scope.selectedTab = 0;
	$scope.rows=row;
	$scope.cols=col;
	$scope.sec_name=nme;
	$scope.rotangle = rtangle;
	$scope.curvangle = crv;
	$scope.sbtype= "";
	$scope.skewanglex = skwx;
	$scope.skewangley = skwy;
	$scope.lftlbl = llbl;
	$scope.rgtlbl = rlbl;
	$scope.stseats = sts;
	$scope.seatdiff = std;
	$scope.updown = ud;
	
    $scope.applySpec = function ( new_row, new_col , new_name ) {
		console.log(new_row+ "-" +new_col + new_name);
		$scope.result={'newrow' : $scope.rows, 'newcol' : $scope.cols, 'newname' : $scope.sec_name , 'rotangle' : $scope.rotangle , 'curvangle' : $scope.curvangle, 'skewanglex' : $scope.skewanglex, 'skewangley' : $scope.skewangley , 'llbl' : $scope.lftlbl , 'rlbl' : $scope.rgtlbl , 'stset' : $scope.stseats, 'stdff' : $scope.seatdiff, 'upd' : $scope.updown, 'del': "0", 'dup':"0", 'reslbl': "0", 'reseat': "0" };
		$mdToast.hide($scope.result);
	}
	$scope.deleteSection = function () {
		$scope.result={'newrow' : $scope.rows, 'newcol' : $scope.cols, 'newname' : $scope.sec_name , 'rotangle' : $scope.rotangle , 'curvangle' : $scope.curvangle, 'skewanglex' : $scope.skewanglex, 'skewangley' : $scope.skewangley , 'llbl' : $scope.lftlbl , 'rlbl' : $scope.rgtlbl , 'stset' : $scope.stseats, 'stdff' : $scope.seatdiff, 'upd' : $scope.updown, 'del': "1", 'dup':"0", 'reslbl': "0", 'reseat': "0"  };
		$mdToast.hide($scope.result);
	}
	$scope.duplicateSection = function () {
		$scope.result={'newrow' : $scope.rows, 'newcol' : $scope.cols, 'newname' : $scope.sec_name , 'rotangle' : $scope.rotangle , 'curvangle' : $scope.curvangle, 'skewanglex' : $scope.skewanglex, 'skewangley' : $scope.skewangley , 'llbl' : $scope.lftlbl , 'rlbl' : $scope.rgtlbl , 'stset' : $scope.stseats, 'stdff' : $scope.seatdiff, 'upd' : $scope.updown, 'del': "0", 'dup':"1", 'reslbl': "0", 'reseat': "0"  };
		$mdToast.hide($scope.result);
	}
	$scope.resetLabel = function(){
		$scope.result={'newrow' : $scope.rows, 'newcol' : $scope.cols, 'newname' : $scope.sec_name , 'rotangle' : $scope.rotangle , 'curvangle' : $scope.curvangle, 'skewanglex' : $scope.skewanglex, 'skewangley' : $scope.skewangley , 'llbl' : $scope.lftlbl , 'rlbl' : $scope.rgtlbl , 'stset' : $scope.stseats, 'stdff' : $scope.seatdiff, 'upd' : $scope.updown, 'del': "0", 'dup':"0", 'reslbl': "1", 'reseat': "0"  };
		$mdToast.hide($scope.result);
	}
	$scope.restoreSeats = function(){
		$scope.result={'newrow' : $scope.rows, 'newcol' : $scope.cols, 'newname' : $scope.sec_name , 'rotangle' : $scope.rotangle , 'curvangle' : $scope.curvangle, 'skewanglex' : $scope.skewanglex, 'skewangley' : $scope.skewangley , 'llbl' : $scope.lftlbl , 'rlbl' : $scope.rgtlbl , 'stset' : $scope.stseats, 'stdff' : $scope.seatdiff, 'upd' : $scope.updown, 'del': "0", 'dup':"0", 'reslbl': "0", 'reseat': "1"  };
		$mdToast.hide($scope.result);
	}
})
.controller('SeatsToastCtrl', function($scope, $mdToast, $mdDialog) {
	
})
.controller('RightNavCtrl', function($scope, $timeout, $mdSidenav , $log) {
	$scope.close = function () {
      // Component lookup should always be available since we are not using `ng-if`
      $mdSidenav('right').close()
        .then(function () {
          $log.debug("close Left is done");
        });
    };
})
