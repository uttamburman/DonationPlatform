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
	<div class="mainformheadtext">BECOME<br> MEMBER</div>
    <div class="mainformsectext">To become a member register with us.</div>
    
    <div class="mainformnotetext">Registering with us ensures that you are member of us(Helping Hands Group), and makes it easy for us to keep a record of our members. If you are already a member but hadn't been registered yet, fill this form to get yourself registered.<br><br>
    If you are a registered member you can access your account by <a href="members">Logging in Here</a>
    </div>
</div>
</div>
<div class="formright">
	<div class="mainformslinker">
    	<div class="mainformlinktext">Take me to <a href="#Volunteer">Volunteer Form</a></div>
    </div>
    <div class="mainform" ng-controller="memberformCtrl">
               
                <form name="form" novalidate >
                <div class="formcomponentsmall">
                 <div class="mfinputhead">NAME</div>
                <input ng-model="namem" type="text" placeholder="" ng-required="true" minlength="3">
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">USERNAME</div>
                <input ng-model="usernamem" type="text" placeholder="" ng-required="true" minlength="6" ng-keyup="keyupevt()">
                <div class="usercheckvalue">{{useravail}}</div>
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">PASSWORD</div>
                <input ng-model="passwordm" type="password" placeholder="" ng-required="true" minlength="3">
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">CONFIRM PASSWORD</div>
                <input ng-model="password1m" type="password" placeholder="" ng-required="true" minlength="3">  
                </div>  
                <div class="formcomponentsmall">             
                 <div class="mfinputhead">EMAIL</div>
                <input ng-model="emailm" type="email" placeholder="" class="forminput" ng-required="true" minlength="10">
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">CONTACT</div>
                <input ng-model="contactm" type="number" placeholder="" class="forminput" ng-required="true" minlength="10" maxlength="11">
                </div>
                <div class="formcomponentsmall">
                <div class="mfinputhead">CITY</div>
                <select ng-model="citym" name="city">
                	<option value="" disabled selected>City</option>
                    <option value="indore">Indore</option>
      				<option value="bhopal">Bhopal</option>
                    <option value="jabalpur">Jabalpur</option>
    			</select>
                </div>
                <div class="formcomponentbig">
                <div class="mfinputhead">ADDRESS</div>
                <input ng-model="addressm" type="text" placeholder="" class="forminput" ng-required="true" minlength="10">                
                </div>
                <input type="submit" class="memformbtn" value="BECOME MEMBER" ng-click="form.$valid && memberformdata()" ng-disabled="{{disvalue}}"/>
                <div class="formcomponentbig">
                <div class="processorm"></div></div>
                <div class="sucresm"></div>
                <div class="formcomponentbig">
                <div class="sucresmes">{{cresm}}</div>
                </div>
                </form>
            </div>
    </div>
</div>

<div class="fillbar"><div class="seclogot2"><div class="secimg"></div><div class="seclogotxt">HELPING HANDS<BR><span class="secboldtext">GROUP</span></div></div></div>





