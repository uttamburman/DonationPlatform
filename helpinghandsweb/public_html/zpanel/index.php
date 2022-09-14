<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
<meta name="viewport" content="width=device-width">
<title>Z Panel</title>

<?php 
	session_start();
	if (isset($_SESSION["email"])&&($_SESSION["eid"])){
		  //
		 //echo "Secure";
	}
	else{
		header("Location: ../members");
	}
?>
<link rel="icon" type="image/x-icon" href="images/zpanel.png" />
<link href="stylesheets/cascade.css" rel="stylesheet">
<link rel="stylesheet" href="stylesheets/material-cards.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-sanitize.js"></script>
  <!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="app/app.js"></script>
<script type="text/javascript" src="stylesheets/jquery.form.js"></script>
</head>
<body ng-app="orgApp" class="layout-row" ng-controller="AppController">
<md-sidenav class="site-sidenav md-sidenav-left md-whiteframe-z2" md-component-id="left" hide-print md-is-locked-open="$mdMedia('gt-sm')">
	 <header class="nav-header">
      <a ng-href="" class="docs-logo" href="">
        <md-icon md-font-icon="material-icons">polymer</md-icon>
        <h1 class="logotext">Z PANEL </h1>
      </a>
    </header>
    <a href="#Messages" ng-hide="fmbr">
     <md-list-item class="md-2-line menu1"  ng-click="null" >          
          <div class="md-list-item-text" layout="column">
            Messages
          </div>          
     </md-list-item>
     </a>
     <a href="#Webseg" ng-hide="fadm">
     <md-list-item class="md-2-line menu1"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            WebSeg
          </div>          
     </md-list-item>
     </a>
     <a href="#Photologic" ng-hide="fmbr">
     <md-list-item class="md-2-line menu1"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            Photo Logic
          </div>          
     </md-list-item>
     </a>
     
     <a href="#Mailing" ng-hide="fadm">
     <md-list-item class="md-2-line menu2"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
             Mailing
          </div>          
     </md-list-item>
     </a>
     <a href="#BloodData" ng-hide="fadm">
     <md-list-item class="md-2-line menu2"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
             Blood Data
          </div>          
     </md-list-item>
     </a>
     <a href="#Users" ng-hide="fchf">
     <md-list-item class="md-2-line menu3"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            Users
          </div>          
     </md-list-item>
     </a>
     <a href="#Select" ng-hide="fchf">
     <md-list-item class="md-2-line menu3"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            Selections
          </div>          
     </md-list-item>
     </a>
     <a ng-click="newStory();" ng-hide="fedt">
     <md-list-item class="md-2-line menu5"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            New Story
          </div>
     </md-list-item>
     </a>    
     <a href="#MyArticles" ng-hide="fedt">
     <md-list-item class="md-2-line menu5"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            My Stories
          </div>
     </md-list-item>
     </a>
     <a href="#Submit" ng-hide="fedt">
     <md-list-item class="md-2-line menu5"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            Submission
          </div>
     </md-list-item>
     </a>
     <a href="#Revarticles" ng-hide="fadm">
     <md-list-item class="md-2-line menu9"  ng-click="null">
          <div class="md-list-item-text" layout="column">
            Review Stories
          </div>
          
     </md-list-item>
     </a>
      <a href="#Allarticles" ng-hide="fadm">
     <md-list-item class="md-2-line menu9"  ng-click="null">
          <div class="md-list-item-text" layout="column">
            All Stories
          </div>
          
     </md-list-item>
     </a>
      
     <a href="#Eventcreate" ng-hide="fadm">
     <md-list-item class="md-2-line menu6"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            Create Upcoming Event
          </div>              
     </md-list-item>
     </a> 
     <a href="#EventStory" ng-hide="fadm">
     <md-list-item class="md-2-line menu7"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
            Create Event Story
          </div>          
     </md-list-item>
     </a>
     <a href="#Eventstories" ng-hide="fadm">
     <md-list-item class="md-2-line menu8"  ng-click="null">         
          <div class="md-list-item-text" layout="column">
            View Event Stories
          </div>          
     </md-list-item>
     </a>
    
          <a href="#Performance" ng-hide="fadm">
     <md-list-item class="md-2-line menu10"  ng-click="null">
          <div class="md-list-item-text" layout="column">
             Articles Statistics
          </div>     
          </md-list-item>
          </a>

     <a href="#Volunteers" ng-hide="fadm">
     <md-list-item class="md-2-line menu11"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
             Volunteers
          </div>          
     </md-list-item>
     </a>
     <a href="#Account" ng-hide="fedt">
     <md-list-item class="md-2-line menu11"  ng-click="null">          
          <div class="md-list-item-text" layout="column">
             Account
          </div>          
     </md-list-item>
     </a>
     
      
</md-sidenav>
<div layout="column" tabindex="-1" role="main" flex="" class="layout-column flex">
	<md-toolbar class="md-whiteframe-glow-z1 site-content-toolbar">
      <div class="md-toolbar-tools" ng-repeat="d in data">
        <md-button class="md-icon-button" ng-click="toggleLeft()" hide-gt-sm aria-label="Toggle Menu">
          <md-icon md-font-icon="material-icons">menu</md-icon>
        </md-button>
        <a href="#Home">
        <md-button aria-label="Open demo menu" class="md-icon-button">
            <md-icon md-menu-origin="" md-font-icon="material-icons">home</md-icon>
          </md-button>
          </a>
        <h2>
          <span>Hi! {{d.name}}</span>
        </h2>
        <span flex=""></span>
        <md-menu md-position-mode="target-right target">
          <md-button aria-label="Open demo menu" class="md-icon-button" ng-click="$mdOpenMenu($event)">
            <md-icon md-menu-origin="" md-font-icon="material-icons">more_vert</md-icon>
          </md-button>
          <md-menu-content width="4">            
            <md-menu-item >
              <md-button ng-click="settingsCtrl()">
                  <div layout="row" flex="">
                    <p flex="">Settings</p>
                    <md-icon md-menu-align-target="" md-font-icon="material-icons" style="margin: auto 3px auto 0;">settings</md-icon>
                  </div>
              </md-button>
            </md-menu-item>
            <md-menu-item >
              <md-button ng-click="logoutCtrl()">
                  <div layout="row" flex="">
                    <p flex="">Logout</p>
                    <md-icon md-menu-align-target="" md-font-icon="material-icons" style="margin: auto 3px auto 0;">settings_power</md-icon>
                  </div>
              </md-button>
            </md-menu-item>
          </md-menu-content>
        </md-menu>
      </div>
    </md-toolbar>
    <md-content md-scroll-y layout="column" flex>
      <div ng-view layout-padding flex="noshrink" class="docs-ng-view"></div>
      <div layout="row" flex="noshrink" layout-align="center center">
        <div id="license-footer" flex>
          Developed with <md-icon md-menu-align-target="" md-font-icon="material-icons" style="margin: auto 3px auto 0;color:#222222;font-size:14px;">favorite</md-icon> and lots of <md-icon md-menu-align-target="" md-font-icon="material-icons" style="margin: auto 3px auto 0;color:#222222;font-size:14px;">free_breakfast</md-icon>for Helping Hands Group &copy;2016 .
        </div>
      </div>
      
    </md-content>
</div>
</body>
</html>