<!doctype html>

<html>

<!-- 	URI 			: www.helpinghandsgroup.in

		Developer Info 	: Main Public Website MPver1.2, 12|24|2017

        Description		: ©2016 BPL Helping Hands Society (No. 01/01/01/29540/15). All Rights Reserved

-->

<head>

<meta charset="utf-8">

<meta name="HandheldFriendly" content="true">

<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

<meta name="viewport" content="width=device-width">

<title>Helping Hands Group</title>

<link rel="icon" type="image/x-icon" href="logo/linklogo.png" />



<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Merriweather:300italic,300,400italic,400,700italic,700,900italic,900' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,300,400italic,400,700italic,700' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js"></script>



<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js'></script>



<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.min.js'></script>

<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js'></script>

<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js'></script>

<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js'></script>

  <!-- Angular Material Library -->

<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>









<script src="stylesheets/inscript.js"></script>

<script type="text/javascript" src="stylesheets/app.js"></script>



<link href="stylesheets/sheet.css"  rel="stylesheet"  type="text/css" />

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFAKjLFiPSbkOZP-0UCD7ykA4aot3RATI" type="text/javascript"></script>

</head>





<body ng-app="orgApp">

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-74079661-6', 'auto');

  ga('send', 'pageview');



</script>

<div class="progress"></div>

<div class="hhbusy"></div>

 	

    <div class="content">

    

        <div class="containerx">

            <div ng-view ></div>

    </div>

    </div> 

    <div class="infocentre">

    	<div class="infocardhold">

    		<div class="infocard inf1">

            	<div class="infimg iimg1">

                	<div class="infocardicon"></div>

                    <div class="infocardiconlbl">The Giving<br> Machine</div>

                 </div>

                 <div class="infocardheading">Support and Donations</div>

                 <div class="infocarddetails">Donating to Helping Hands Group is easy and won't cost you a penny to support our mission.</div>

                 <a href="#Donations"><div class="infocardbutton">Find out how to donate</div></a>

            </div>

        	<div class="infocard inf2">

            	<div class="infimg iimg2"></div>

                 <div class="infocardheading">Helping Hands<br> Group Events</div>

                 <div class="infocarddetails">Helping Hands Group hosts regular local events for all the people</div>

                 <div class="infocardbutton">See our events list</div>

            </div>

        </div>

    </div>

    <div class="orginfo">

        <div class="newslettersect">

            

                

        	<div class="newslettertext">SUBSCRIBE TO OUR NEWSLETTER!</div>

            <div class="newsletterform" ng-controller="newsletterCtrl">

            <div class="sucresnw"></div>

            <div class="sucresmes">{{cresnw}}</div>

            <form name="form" novalidate >

            	<input ng-model="email" type="email" placeholder="Enter your email address" ng-required="true" minlength="5">

                <input type="submit" class="newsformbtn" value="Send" ng-click="form.$valid && newsletterdata()"/>

                <div class="processornw"></div>

                

            </form>

            </div>

        </div>

        

    	<div class="botlinkssection"><div class="botlinksbox">

          <a href="members/" class="botlink"><span class="alink">MEMBERS</span><div class="filler"></div></a>         <a href="#Media" class="botlink"><span class="alink"> MEDIA</span><div class="filler"></div></a>         <a href="#Work" class="botlink"><span class="alink"> WORK</span><div class="filler"></div></a>            <a href="#Stories" class="botlink"><span class="alink"> VOLUNTEER</span><div class="filler"></div></a>			<a href="#Donations" class="botlink"><span class="alink">SUPPORT & DONATIONS</span><div class="filler"></div></a></div></div>

          <div class="quicklinks">

          	<div class="qlbox">

            	<div class="qlheader">INFORMATION</div>

                <a href="#About" class="quicklink">About Us</a>

                <a href="#Mission" class="quicklink">Mission</a>

                <a href="#Whatwedo" class="quicklink">Our Work</a>

                <a href="#Team" class="quicklink">Team</a>

                <a href="#Membership" class="quicklink">Membership</a>

            </div>

            <div class="qlbox">

            	<div class="qlheader">INITIATIVES</div>

                <a href="#Iksha" class="quicklink">Iksha</a>

                <a href="#Swabhiman" class="quicklink">Swabhiman</a>

                <a href="#Blood" class="quicklink">Blood Heroes</a>

                <a href="#Green" class="quicklink">Green Gang</a>

            </div>

            <div class="qlbox">

            	<div class="qlheader">HAPPENINGS</div>

                <a href="#Events" class="quicklink">Events</a>

                <a href="#Success" class="quicklink">Success Stories</a>

                <a href="#Impressions" class="quicklink">Articles</a>

                <a href="#Contribute" class="quicklink">Contribute</a>

            </div>

            <div class="qlbox qlboxbig" ng-controller="bloodcheckCtrl">

            	<div class="qlheader">DONATE BLOOD</div>

                <div class="blooddonatetag">Want to be Part of Our Blood Heroes? <br> Give us some information.</div>

                <form name="form" novalidate >

                <input ng-model="name" type="text" placeholder="Name" ng-required="true" minlength="3">

                <input ng-model="contact" type="number" placeholder="Contact" class="forminput" ng-required="true" minlength="10" maxlength="11">

                <select ng-model="bldgrp" name="bloodtype">

                	<option value="" disabled selected>Select Blood Group</option>

      				<option value="O-">O- 	| O Negative</option>

      				<option value="O+">O+ 	| O Positive</option>

      				<option value="A-">A- 	| A Negative</option>

                    <option value="A+">A+ 	| A Positive</option>

      				<option value="B-">B- 	| B Negative</option>

      				<option value="B+">B+ 	| B Positive</option>

                    <option value="AB-">AB- | AB Negative</option>

      				<option value="AB+">AB+ | AB Positive</option>

    			</select>

                <select ng-model="city" name="bloodtype">

                	<option value="" disabled selected>Area | City</option>

                    <option value="indore">Indore</option>

      				<option value="bhopal">Bhopal</option>

                    <option value="jabalpur">Jabalpur</option>

      				<option value="gwalior">Gwalior</option>

      				<option value="ujjain">Ujjain</option>

      				<option value="mumbai">Mumbai</option>

      				<option value="delhi">Delhi</option>

      				<option value="bangalore">Bangalore</option>

                    <option value="hyderabad">Hyderabad</option>

      				<option value="chennai">Chennai</option>

      				<option value="ahmedabad">Ahmedabad</option>

                    <option value="kolkata">Kolkata</option>

      				<option value="surat">Surat</option>

                    <option value="pune">Pune</option>

                    <option value="jaipur">Jaipur</option>

      				<option value="nagpur">Nagpur</option>

      				<option value="vadodara">Vadodara</option>

    			</select>

                <input type="submit" class="formbtn" value="Send" ng-click="form.$valid && blooddonatedata()"/>

                <div class="processor"></div>

                <div class="sucres"></div>

                <div class="sucresmes">{{cres}}</div>

                </form>

            </div>

            <div class="qlbox qlboxreach">

            	<div class="qlheader">REACH US</div>

                <div class="qladdress">L.I.G A/40, E-6 , Arera Colony , Near 10 No , 462016 Bhopal, Madhya Pradesh<br>Tel. +91 882 754 4765<br>

                	<a class="qlemaillink" href="mailto:inbox@helpinghandsgroup.in?Subject=Your%20Subject" target="_top">inbox@helpinghandsgroup.in</a>

                </div>
 
                <div class="qltimingheader">Opening hours</div>

                <div class="qltimings"><div class="qltimingsub">Monday to Friday</div><div class="qltimingsub">9.30am - 8.30pm</div></div>

                <div class="qltimings"><div class="qltimingsub">Saturday | Sunday</div><div class="qltimingsub">8.00am - 6.30pm</div></div>

                

                

            </div>

            

          </div>

          <div class="socialconnect">

          	<div class="social-connect-tagline">LET'S CONNECT</div>

            <div class="social-connect-buttons">

            	<a href="https://www.facebook.com/HelpingHandsGroup/" target="_blank"><div class="social-connect-button fbbtn"></div></a>

            	<a href=""><div class="social-connect-button igbtn"></div></a>

            	<a href=""><div class="social-connect-button twbtn"></div></a>

            	<a href=""><div class="social-connect-button gpbtn"></div></a>

                <a href="https://www.youtube.com/channel/UCzmX25OqMj9Q3Dd43K153lA" target="_blank"><div class="social-connect-button ytbtn"></div></a>

            </div>

          </div>

       

        <div class="botcopyright">©2016 BPL Helping Hands Society (No. 01/01/01/29540/15). All Rights Reserved  <a href="http://www.createahead.com" class="deslink"></a><br/></div>

    </div> 

    <div class="topbar"><div class="seclogo"><div class="secimg"></div><div class="seclogotxt">HELPING HANDS<BR><span class="secboldtext">GROUP</span></div></div></div>

    <div class="menu">

    <div class="col-md-3">

            

                <a href="#Home" class="anchor"><span class="alink">Home</span><div class="filler"></div></a>

                <div class="anchorhold anchold1">

                	<div class="anchor ancx1">About Us <div class="menuexp mex1"><i class="material-icons">add</i></div></div>

                    <a href="#Mission" class="anchor anc1"><span class="alink">Our Mission</span><div class="filler"></div></a>

                    <a href="#About" class="anchor anc1"><span class="alink">Who We Are</span><div class="filler"></div></a>

                    <a href="#Whatwedo" class="anchor anc1"><span class="alink">What We Do</span><div class="filler"></div></a>

                    <a href="#Team" class="anchor anc1"><span class="alink">Our Team</span><div class="filler"></div></a>

                    

                </div>   

                <div class="anchorhold anchold2">

                	<div class="anchor ancx2">Happenings <div class="menuexp mex2"><i class="material-icons">add</i></div></div>                    

                	<a href="#Events" class="anchor anc1"><span class="alink">Events</span><div class="filler"></div></a>

                	<a href="#Stories" class="anchor anc1"><span class="alink">Stories</span><div class="filler"></div></a>

                </div>  

                 <div class="anchorhold anchold3">

                	<div class="anchor ancx3">Our Initiatives <div class="menuexp mex3"><i class="material-icons">add</i></div></div>                    

                	<a href="#Iksha" class="anchor anc1"><span class="alink">iKSHA</span><div class="filler"></div></a>

                	<a href="#Swabhiman" class="anchor anc1"><span class="alink">Swabhiman</span><div class="filler"></div></a>

                	<a href="#Blood" class="anchor anc1"><span class="alink">Blood Heroes</span><div class="filler"></div></a>

                	<a href="#Green" class="anchor anc1"><span class="alink">Green Gang</span><div class="filler"></div></a>

                </div>                

                <div class="anchorhold anchold4">

                	<div class="anchor ancx4">Get Involved <div class="menuexp mex4"><i class="material-icons">add</i></div></div>                    

                	<a href="#Volunteer" class="anchor anc1"><span class="alink">Be A Volunteer</span><div class="filler"></div></a>

                	<a href="#Membership" class="anchor anc1"><span class="alink">Be A Member</span><div class="filler"></div></a>

                	<a href="#Contact" class="anchor anc1"><span class="alink">Keep In Touch</span><div class="filler"></div></a>

                </div>

                <a href="#Donations" class="anchor"><span class="alink">Support Us</span><div class="filler"></div></a>

                <a href="#Contact" class="anchor"><span class="alink">Contact Us</span><div class="filler"></div></a>

            

        </div>

    </div>

     <div class="menubutton"><div class="menutxt">MENU</div><div class="menuicon"><i class="material-icons">view_headline</i></div></div>           



<!----   - Uttam Burman |Helping_Hands_Group---->

<link href="stylesheets/errorcss.css"  rel="stylesheet"  type="text/css" />

  </body>







</html>