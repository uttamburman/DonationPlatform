<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
<meta name="viewport" content="width=device-width">
<title>Verification</title>

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
</head>

<body ng-app="orgApp" class="layout-row" ng-controller="verifyCtrl">

<div class="coverwrap" layout="column" layout-xs="column">
<div class="formdiv" layout="row" layout-align="space-around center">
  <div class="formhold" >
  <md-card>
  <img ng-src="assets/zpanelbanner.jpg" class="md-card-image" alt="Z Panel">
   <md-button class="md-fab backbtn" aria-label="Back to Login" ng-href="../members/">
          <md-icon md-menu-align-target="" md-font-icon="material-icons" style="margin: auto 3px auto 0;color:#FFFFFF;font-size:18px;">keyboard_arrow_left</md-icon>
        </md-button>
  <md-card-title>
  
          <md-card-title-text layout-align="center center">
            <span class="md-subhead cardtitle">Enter Code Sent to your Email</span>
          </md-card-title-text>
        </md-card-title>
        <md-card-content>
    <form ng-submit="form.$valid && verifydata()" name="form" novalidate ng-cloak >
    <md-input-container class="md-block md-subhead" flex-gt-xs>
            <label>Verification Code</label>
            <input ng-model="code" type="text" ng-required="true" minlength="8">
          </md-input-container>
          <div class="result" layout-align="center center">{{responsev}}</div>
          <md-button class="md-raised md-primary verformbtn" value="Send" ng-click="form.$valid && verifydata()">Verify</md-button>           
           <div layout="row" layout-sm="column" layout-align="space-around" ng-hide="activated">
        <md-progress-circular md-mode="indeterminate" ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
        </div>
          </form>          
          </md-card-content>
          </md-card>
  </div>
</div>   
</div>

</body>
</html>
