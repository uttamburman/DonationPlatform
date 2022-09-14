
<div class="viewbody">

	
    <div class="vwname">Add Events</div>
    <div class="formcontain">
        <div ng-controller="formCtrl" layout="column" layout-padding="" ng-cloak="" class="inputdemoIcons fmsform"> 
        <div class="step initialstep">   
        <div class="stephead">Event Profile</div>       
           <input ng-model="name" type="text" class="evtinput" id="evtinput" placeholder="Event Name"/>
           <input ng-model="categ" type="text" class="evtinput" id="evtinput" placeholder="Event Name"/>
           <input ng-model="dte" type="date" class="evtinput" id="evtinput" placeholder="Time"/>
           <input ng-model="tme" type="time" class="evtinput" id="evtinput" placeholder="Time"/>
           </div>
           <div class="step secondstep">
           <div class="stephead">Location</div>
           <div class="stepinput">
           <input ng-model="city" class="catselect evtinput ss" id="evtinput" placeholder="Select City">
           <input ng-model="addr" type="text" class="evtinput ss" id="evtinput" placeholder="Address"/>
           <input ng-model="near" type="text" class="evtinput ss" id="evtinput" placeholder="Nearest Spot"/>
           <input ng-model="lati" type="hidden" class="evtinput"  id="evtlat" placeholder="Latitude" readonly/>
           <input ng-model="longi" type="hidden" class="evtinput"  id="evtlong" placeholder="Longitude" readonly/>
           </div>
           <div class="mapholder">
           <input id="pac-input" class="controls" type="text" placeholder="Search Box">
  			<h3>Specify Location</h3>
  			<map-canvas id="map" class="map" ></map-canvas>
			</div>
           </div>
           <div class="step finalstep">
           <div class="stephead">Storyline & Terms</div>
           <input ng-model="summ" type="text" class="evtinput biginput" id="evtinput" placeholder="Summary"/>
           <input ng-model="tnc" type="text" class="evtinput biginput" id="evtinput" placeholder="T&C"/>           
           
           <input type="submit" value="Create" ng-click="evtcreatedata()" class="imgbrbtn evtinput"/>           
           <div class="lt" id="lt"></div><div class="lg" id="lg"></div>
                     
<div class="response" id="response"></div>
<a href="#EventImage" class="anchor imgo"> <i class="material-icons icn">view_quilt</i><span class="alink">Add Event Image</span> </a>
           
           </div>
        </div>
    </div>
</div>




