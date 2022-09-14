<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
<meta name="viewport" content="width=device-width">
<title>User-Test Exercise</title>

<?php 
	session_start();
	if (isset($_SESSION["uname"])&&($_SESSION["role"])){
		  //
		 //echo "Secure";
    $role= $_SESSION["role"];
    if($role=='admin'){
      header("Location: ../adminpanel");
    }

	}
	else{
		header("Location: ../");
	}
?>
<link rel="icon" type="image/x-icon" href="../favicon.png" />
<link href="assets/cascade.css" rel="stylesheet">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
  <!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="controller/app.js"></script>

</head>
<body ng-app="orgApp" class="layout-row" ng-controller="AppController">
<md-sidenav class="site-sidenav md-sidenav-left md-whiteframe-z2" md-component-id="left" hide-print md-is-locked-open="$mdMedia('gt-sm')">
	 <md-toolbar class="navigation-header md-whiteframe-1dp ng-scope _md md-default-theme layout-align-space-between-center layout-row _md-toolbar-transitions" layout="row" layout-align="space-between center"><div class="logo layout-align-start-center layout-row" layout="row" layout-align="start center"><span class="logo-image"></span> <span class="logo-text">Exercise
</span></div></md-toolbar>
    <a href="#UserView">
     <md-list-item class="menu1"  ng-click="null" >          
          <div class="md-list-item-text" layout="row">
            <md-icon md-font-icon="material-icons">chat</md-icon>&nbsp;&nbsp;Profile
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
          <span class="username">{{d.p_name}}</span>
        </h2>
        <span flex=""></span>
        <div layout="row" layout-sm="column" layout-align="space-around" md-position-mode="target-right target" ng-hide="indexactivated"> 
			<md-progress-circular ng-disabled="indexactivated" md-diameter="40"></md-progress-circular>
		</div>
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
    <md-content md-scroll-y layout="column" class="mvc-body" flex>
      <div ng-view  flex="noshrink" class="docs-ng-view"></div>
      <div layout="row" flex="noshrink" layout-align="center center">
        <div id="license-footer" flex>
          Test Exercise Oct 2017 .
        </div>
      </div>
      
    </md-content>
</div>
</body>
</html>