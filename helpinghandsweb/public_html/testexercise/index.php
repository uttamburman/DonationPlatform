<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd"> 

<?php
$usrname= '';
if(!isset($_COOKIE['username'])) {
    $usrname= "new";
} else {
    $usrname= $_COOKIE['username'];
}
?>
<html> 

<head> 

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="viewport" content="width=device-width">

<link rel="icon" type="image/x-icon" href="favicon.png" />

<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="assets/jscript.js"></script>
<link href="assets/stylesheet.css"  rel="stylesheet"  type="text/css" />


<title>Test Exercise</title> 

</head> 

<body ng-app="testApp" ng-controller="AppController"> 
<div class="nav-wrap">
	<div class="nav-float">
		<div class="logo-wrap"></div>
		<div class="menu-button-wrap" ng-click="menuListener()"><md-icon md-font-icon="material-icons menu-icon" >menu</md-icon></div>
    <div class="menu-clsbutton-wrap" ng-click="menucloseListener()"><md-icon md-font-icon="material-icons menu-icon" >clear</md-icon></div>
		<div class="sign-button" ng-click="signListener()">Sign In</div>
	</div>
</div>
<div class="hero-wrap">
	<div class="hero-content-wrap">
		
	</div>
	<div class="human-immersive-wrap">	</div>
	<div class="access-box-wrap" ng-controller="loginCtrl">
	<div class="form-wrap">
	<div class="access-title">Sign In</div>

    <form ng-submit="form.$valid && logindata()" name="form" novalidate ng-cloak >

    <md-input-container class="md-block md-subhead" flex-gt-xs>

            <label>User ID</label>

            <input ng-model="userid" class="forminput md-padding" ng-value="" type="text" ng-required="true" minlength="3">

          </md-input-container>

          <md-input-container class="md-block md-subhead" flex-gt-xs>

            <label>Password</label>

            <input ng-model="password" type="password" class="forminput md-padding" ng-required="true" minlength="8" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$^*)(._-])(?=.*[^a-zA-Z._-])(?=.*[^a-zA-Z._-])/">

          </md-input-container>

          <div class="result" layout-align="center center">{{response}}</div>

          <md-button class="md-raised formbtn" value="Send" ng-click="form.$valid && loginListener()">Sign In</md-button>
          <md-button class="md-raised formbtn" value="Cancel" ng-click="cancelSign()">Cancel</md-button>

          

           

           <div layout="row" layout-sm="column" layout-align="space-around" ng-hide="activated">

        <md-progress-circular md-mode="indeterminate" ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>

        </div>

          </form>

          </div>
	</div>
  <div class="menu-wrap">
  <div class="menu-item">Menu Content</div>
  <div class="menu-item">Menu Content Other</div>
  <div class="menu-item">Menu Content Contact</div>
  <div class="menu-item">Menu Content more</div>
  </div>
  <div class="hero-head-wrap">
    <div class="tag-line"><div class="tagtext">INTRODUCTION</div></div>
    <div class="tag-line"><div class="tagtext">TAGLINE</div></div>
  </div>
</div>
<div class="feature-wrap">
<div class="services">

<div class="servleft">
<div class="slhead">OUR TECHNOLOGY</div>
<div class="sltag">From an idea to an unforgetable and measurable digital experience.</div>
<div class="slline"></div>
<div class="slstory">Integrating flawless production, cutting edge technology and meticulous performance measuring, our services work together to deliver a first class final product.</div>
</div>
	<div class="servright">

  <div class="sr strategy">
      <div class="srp srp1">
          <img class="srpic" src="resource/strategy.png" height="64px" width=auto>
          <div class="srpictxt">FEATURE</div>
        </div>
        <div class="srline srl1">Tag Text<br/>Tag Text<br/>Tag Text</div>
        <div class="srlink srln1">Read about Feature →</div>
  </div>

  <div class="sr analytics">
      <div class="srp srp2">
          <img class="srpic" src="resource/analytics.png" height="64px" width=auto>
          <div class="srpictxt">FEATURE</div>
        </div>
        <div class="srline srl2">Tag Text<br/>Tag Text<br/>Tag Text</div>
        <div class="srlink srln2">Read about Feature →</div>
  </div>

  <div class="sr develop">
      <div class="srp srp3">
          <img class="srpic" src="resource/develop.png" height="64px" width=auto>
          <div class="srpictxt">FEATURE</div>
        </div>
        <div class="srline srl3">Tag Text<br/>Tag Text<br/>Tag Text</div>
        <div class="srlink srln3">Read about Feature →</div>
  </div>

  <div class="sr content">
      <div class="srp srp4">
          <img class="srpic" src="resource/content.png" height="64px" width=auto>
          <div class="srpictxt">FEATURE</div>
        </div>
        <div class="srline srl4">Tag Text<br/>Tag Text<br/>Tag Text</div>
        <div class="srlink srln4">Read about Feature →</div>
  </div>

  <div class="sr design">
      <div class="srp srp5">
          <img class="srpic" src="resource/design.png" height="64px" width=auto>
          <div class="srpictxt">FEATURE</div>
        </div>
        <div class="srline srl5">Tag Text<br/>Tag Text<br/>Tag Text</div>
        <div class="srlink srln5">Read about Feature →</div>
  </div>

  <div class="sr product">
      <div class="srp srp6">
          <img class="srpic" src="resource/products.png" height="64px" width=auto>
          <div class="srpictxt">FEATURE</div>
        </div>
        <div class="srline srl6">Tag Text<br/>Tag Text<br/>Tag Text</div>
        <div class="srlink srln6">Products →</div>
  </div>

</div>
</div>
</div>
</div>
<div class="feature-wrap">
<
</div>
<div class=""

</body> 

</html> 