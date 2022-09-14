<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74079661-6', 'auto');
  ga('send', 'pageview');

</script>
<div class="wwheader">
<div class="mmheadimg contactmmheadimg"></div>
<div class="cntiscover"></div>
<div class="wwheadertxt cntistxt">CONTACT US</div>
<div class="wwhdrtag cntistag">Feel free to ask us anything</div>
<div class="wwlinecont ggiscont"><div class="wwhdrline ggline"></div></div>
</div>
<div class="contcontentwrapper">
<div class="contactwrapper">
<div class="addressholder">
<div class="seclogot2"><div class="secimg"></div><div class="seclogotxt">HELPING HANDS<BR>GROUP</div></div>
     
                <div class="qladdress">127/2C, DRM Road, Saket Nagar, Near AIIMS Bhopal<br>Tel. +91 75 66 000 322<br>
                	<a class="qlemaillink" href="mailto:inbox@helpinghandsgroup.in?Subject=Your%20Subject" target="_top">inbox@helpinghandsgroup.in</a>
                </div>
                <div class="qltimingheader">Opening hours</div>
                <div class="qltimings"><div class="qltimingsub">Monday to Friday</div><div class="qltimingsub">9.30am - 8.30pm</div></div>
                <div class="qltimings"><div class="qltimingsub">Saturday | Sunday</div><div class="qltimingsub">8.00am - 6.30pm</div></div>
                <div class="socialconnect">
            <div class="social-connect-buttons">
            	<div class="social-connect-button fbbtn"></div>
            	<div class="social-connect-button igbtn"></div>
            	<div class="social-connect-button twbtn"></div>
            	<div class="social-connect-button gpbtn"></div>
                <div class="social-connect-button ytbtn"></div>
            </div>
          </div>
</div>
<div class="formholder" ng-controller="contactpageCtrl">
<div class="qlheader">Send us a letter - we'd love to chat</div>
	<form name="form" id="usrform" novalidate >
                <input ng-model="namec" type="text" placeholder="Name" ng-required="true" minlength="3">
                <input ng-model="emailc" type="email" placeholder="Your email address" ng-required="true" minlength="5">
                <input ng-model="contactc" type="number" placeholder="Your contact number" class="forminput" ng-required="true" minlength="10" maxlength="11">
                <select ng-model="prpse" name="Purpose">
                	<option value="" disabled selected>Your Purpose</option>
      				<option value="information">Want Information</option>
                    <option value="join">Want to be Part</option>
                    <option value="reach">Want to Meet</option>
                    <option value="other">Other</option>
    			</select>
                <span class="messageheader">Message</span>
                <textarea ng-model="summary" maxlength="120" name="summary" form="usrform"></textarea>

                <input type="submit" class="contactpgformbtn" value="SUBMIT" ng-click="form.$valid && contactpagedata()"/>
                <div class="processorxw"></div>
                <div class="succnpg"></div>
                <div class="sucrescnpg">{{cresxw}}</div>
                </form>
</div>
</div>
<div class="maplocate">
	 <map-canvas id="map" class="map" ></map-canvas>
    
    
</div>
</div>
<script>
$(function() {
	var ht=0;
	var wt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	
	
		$('.wwheader').css({height:ht/1.5,width:wt,"position":"relative","display":"block","margin":"0px"});
		$('.wwheadertxt').transition({
                    y:150},1000,'snap');		
		$('.wwhdrtag').transition({
                    y:180},1400,'snap');
		$('.wwhdrline').transition({
                    y:180},1500,'snap');
		
		
});
$(window).resize(function() {
	var ht=0;
	var wt=0;
	var divwt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	
	    $('.wwheader').css({height:ht/1.5,width:wt,"position":"relative","display":"block","margin":"0px"});
		$('.storycontentview').css({height:ht-60,width:"100%","position":"fixed","top":"60px","left":"0%","overflow-y":"scroll","overflow-x":"hidden","background":"white"});

});
</script>
