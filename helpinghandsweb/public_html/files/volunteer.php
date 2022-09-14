<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74079661-6', 'auto');
  ga('send', 'pageview');

</script>
<div class="formleft">
<div class="leftformtextwrapper">
	<div class="mainformheadtext">WANT<br> TO BE A<BR> VOLUNTEER</div>
    <div class="mainformsectext">To become a volunteer register with us.</div>
    
    <div class="mainformnotetext">Registering with us ensures that you are volunteering for us(Helping Hands Group), and makes it easy for us to keep a record of our volunteers. If you are already a volunteer but hadn't been registered yet, fill this form to get yourself registered.<br><br>To become a permanent member follow this link - <a href="#Membership">Membership Form</a></div>
</div>
</div>
<div class="formright">
	<div class="mainformslinker">
    	<div class="mainformlinktext">Take me to <a href="#Membership">Membership Form</a></div>
    </div>
    <div class="mainform" ng-controller="volunteerformCtrl">
               
                <form name="form" id="volform" novalidate >
                <div class="formcomponentsmall">
                 <div class="mfinputhead">NAME</div>
                <input ng-model="namev" type="text" placeholder="" ng-required="true" minlength="3">
                </div>  
                <div class="formcomponentsmall">             
                 <div class="mfinputhead">Email</div>
                <input ng-model="emailv" type="email" placeholder="" class="forminput" ng-required="true" minlength="6">
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">How can we contact you?</div>
                <input ng-model="contactv" type="number" placeholder="" class="forminput" ng-required="true" minlength="10" maxlength="11">
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">Which City Do You Currently live in??</div>
                <select ng-model="cityv" name="city">
                	<option value="" disabled selected>City</option>
                    <option value="indore">Indore</option>
      				<option value="bhopal">Bhopal</option>
                    <option value="jabalpur">Jabalpur</option>
    			</select>
                </div>
                <div class="formcomponentbig">
                <div class="mfinputhead">And what is your address?</div>
                <input ng-model="addressv" type="text" placeholder="" class="forminput" ng-required="true" minlength="5">                
                </div>
                <div class="formcomponentbig">
                <div class="mfinputhead">HOW DID YOU FIND ABOUT US</div>
                <select ng-model="aboutv" name="city">
                	<option value="" disabled selected>Friend | Relative | Newspaper | Social Media</option>
                    <option value="friend">Friend</option>
      				<option value="relative">Relative</option>
                    <option value="newspaper">Newspaper</option>
                    <option value="Social Media">Social Media</option>
    			</select>
                </div>
                <input type="submit" class="volformbtn" value="BECOME VOLUNTEER" ng-click="form.$valid && volunteerformdata()"/>
                <div class="formcomponentbig">
                <div class="processorv"></div></div>
                <div class="sucresv"></div>
                <div class="formcomponentbig">
                <div class="sucresmes">{{cresv}}</div>
                </div>
                </form>
            </div>
    </div>
</div>

<div class="fillbar"><div class="seclogot2"><div class="secimg"></div><div class="seclogotxt">HELPING HANDS<BR><span class="secboldtext">GROUP</span></div></div></div>

<script>

</script>


