<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
<meta name="viewport" content="width=device-width">
<title>Members Login</title>
<link rel="icon" type="image/x-icon" href="assets/zpanel.png" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
  <!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="assets/style.css"  rel="stylesheet"  type="text/css" />
<script type="text/javascript" src="app/app.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74079661-6', 'auto');
  ga('send', 'pageview');

</script>
<?php 
	session_start();
	if (isset($_SESSION["email"])&&($_SESSION["adminverif"])){
		$verif= $_SESSION["adminverif"];
		if($verif=='verified'){
		  header("Location: ../zpanel");
		  echo ''.$verif;
		}
	}
?>
</head>

<body ng-app="orgApp" class="layout-row" ng-controller="loginCtrl">
<div class="coverwrap" layout="column" layout-xs="column">
<div class="formdiv" layout="row" layout-align="space-around center">
  <div class="formhold" >
  <md-tabs md-dynamic-height md-border-bottom md-selected="selectedTab">
      <md-tab label="login">
  <md-card>
  <img ng-src="assets/zpanelbanner.jpg" class="md-card-image" alt="Z Panel">
  <md-card-title>
          <md-card-title-text layout-align="center center">
            
            <span class="md-subhead cardtitle">Login To your Account</span>
          </md-card-title-text>
        </md-card-title>
        <md-card-content>
    <form ng-submit="form.$valid && logindata()" name="form" novalidate ng-cloak >
    <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Email</label>
            <input ng-model="email" class="forminput md-padding" type="text" ng-required="true" minlength="3">
          </md-input-container>
          <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Password</label>
            <input ng-model="password" type="password" class="forminput md-padding" ng-required="true" minlength="6">
          </md-input-container>
          <div class="result" layout-align="center center">{{response}}</div>
          <md-button class="md-raised formbtn" value="Send" ng-click="form.$valid && logindata()">Login</md-button>
          
           
           <div layout="row" layout-sm="column" layout-align="space-around" ng-hide="activated">
        <md-progress-circular md-mode="indeterminate" ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
        </div>
          </form>
          <md-button md-no-ink class="md-primary forminput" ng-click="signPage()">Don't Have an Account</md-button>
          </md-card-content>
          </md-card>
          </md-tab>
      <md-tab label="signup">
       <md-card>
  <img ng-src="assets/zpanelbanner.jpg" class="md-card-image" alt="Z Panel">
  <md-card-title>
          <md-card-title-text layout-align="center center">
            
            <span class="md-subhead cardtitle">Create your Account</span>
          </md-card-title-text>
        </md-card-title>
        <md-card-content>
    	<form ng-submit="form.$valid && signdata()" name="sform" novalidate ng-cloak >
    	<md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Name</label>
            <input ng-model="sname" class="forminput md-padding" type="text" ng-required="true" minlength="3">
          </md-input-container>
          <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Username</label>
            <input ng-model="susrname" class="forminput md-padding" type="text" ng-required="true" minlength="3">
          </md-input-container>
          
    	<md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Email</label>
            <input ng-model="semail" class="forminput md-padding" type="text" ng-required="true" minlength="3">
          </md-input-container>
          <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Contact</label>
            <input ng-model="scontact" class="forminput md-padding" type="text" ng-required="true" minlength="3">
          </md-input-container>
          
          <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Password</label>
            <input ng-model="spassword" type="password" class="forminput md-padding" ng-required="true" minlength="6">
          </md-input-container>
          <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Password Again</label>
            <input ng-model="spassworda" type="password" class="forminput md-padding" ng-required="true" minlength="6">
          </md-input-container>
          <div class="result" layout-align="center center">{{sresponse}}</div>
          <md-button class="md-raised formbtn" ng-hide="signbtnhide" value="Send" ng-click="sform.$valid && signdata()">Signup</md-button>
          
           
           <div layout="row" layout-sm="column" layout-align="space-around" ng-hide="sactivated">
        <md-progress-circular md-mode="indeterminate" ng-disabled="sactivated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
        </div>
          </form>
          <md-button md-no-ink class="md-primary forminput" ng-click="loginPage()">Already having an Account</md-button>
          </md-card-content>
          </md-card>
      </md-tab>
    </md-tabs>
  </div>
</div>   
</div>
</body>
</html>
