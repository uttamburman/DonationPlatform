<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">
<meta name="viewport" content="width=device-width">
<title>POBO</title>

<link rel="icon" type="image/x-icon" href="../favicon.ico" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="resources/jquery.ui.rotatable.min.js"></script>
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
  
<script src="resources/app.js"></script>

<link href="resources/stylesheet.css" rel="stylesheet">
</head>
<body ng-app="SeatMap" class="layout-row" ng-controller="seatMapping">
<md-sidenav class="site-sidenav md-sidenav-left md-whiteframe-z2" md-component-id="left" hide-print md-is-locked-open="$mdMedia('gt-sm')">
	 <md-toolbar class="navigation-header md-whiteframe-1dp ng-scope _md md-default-theme layout-align-space-between-center layout-row _md-toolbar-transitions" layout="row" layout-align="space-between center"><div class="logo layout-align-start-center layout-row" layout="row" layout-align="start center"><span class="logo-image"></span> <span class="logo-text">
</span></div></md-toolbar>
   

     
     <md-list-item class="menu11"  ng-click="newSection()">          
          <div class="md-list-item-text" layout="row">
             <md-icon md-font-icon="material-icons">domain</md-icon>&nbsp;&nbsp;Seats
          </div>          
     </md-list-item>
     <md-list-item class="menu11"  ng-click="newTable()">          
          <div class="md-list-item-text" layout="row">
             <md-icon md-font-icon="material-icons">settings_input_svideo</md-icon>&nbsp;&nbsp;Table
          </div>          
     </md-list-item>
     <md-list-item class="menu11"  ng-click="newSection()">          
          <div class="md-list-item-text" layout="row">
             <md-icon md-font-icon="material-icons">wb_iridescent</md-icon>&nbsp;&nbsp;Stage
          </div>          
     </md-list-item>
     <md-list-item class="menu11"  ng-click="newSection()">          
          <div class="md-list-item-text" layout="row">
             <md-icon md-font-icon="material-icons">spa</md-icon>&nbsp;&nbsp;Objects
          </div>          
     </md-list-item>
     <div layout="row" flex="noshrink" layout-align="center center">
       
         
           <div id="license-footer" flex>
          POBO &copy;2016 .
        </div>
      </div>
      
</md-sidenav>
 <md-sidenav class="md-sidenav-right md-whiteframe-4dp" md-component-id="right">

      <md-toolbar class="md-theme-light">
        <h1 class="md-toolbar-tools">Sidenav Right</h1>
      </md-toolbar>
      <md-content ng-controller="RightNavCtrl" layout-padding>
        <form>
          <md-input-container>
            <label for="testInput">Test input</label>
            <input type="text" id="testInput"
                   ng-model="data" md-autofocus>
          </md-input-container>
        </form>
        <md-button ng-click="close()" class="md-primary">
          Close Sidenav Right
        </md-button>
      </md-content>

    </md-sidenav>
<div layout="column" tabindex="-1" role="main" flex="" class="layout-column flex">
	<md-toolbar class="md-whiteframe-glow-z1 site-content-toolbar">
      <div class="md-toolbar-tools">
        <md-button class="md-icon-button" ng-click="toggleLeft()" hide-gt-sm aria-label="Toggle Menu">
          <md-icon md-font-icon="material-icons">menu</md-icon>
        </md-button>
        <a href="#Home">
        <md-button aria-label="Open demo menu" class="md-icon-button">
            <md-icon md-menu-origin="" md-font-icon="material-icons">home</md-icon>
          </md-button>
          </a>
        <h2>
          <span class="username">username</span>
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
    <md-content layout="column" class="mvc-body" id="mvc-body" flex>
   
      <div flex="noshrink" class="docs-ng-view" id="des_wrap">
		  <div class="des_canv" id="canva">
			  <div class="section sect1" id="sect1"></div>
			  <div class="section sect2" id="sect2"></div>
			  
		  </div>
      </div>
      <md-button class="md-accent md-fab md-fab-top-right" ng-hide="fabisvisible">
        <md-icon md-menu-origin="" md-font-icon="material-icons">delete_forever</md-icon>
      </md-button>    
      <md-fab-speed-dial md-direction="left" md-open="fabisopen" class="md-accent md-scale md-fab md-fab-top-right" ng-hide="fabisvisible">
        
        <md-fab-trigger>
        <md-button aria-label="menu" class="md-fab md-primary md-hue-2">
          <md-tooltip md-direction="top" md-visible="tooltipVisible">Menu</md-tooltip>
          <md-icon md-menu-origin="" md-font-icon="material-icons">donut_large</md-icon>
        </md-button>
      </md-fab-trigger>
      <md-fab-actions>
          <md-button aria-label="Clear" class="md-fab md-raised md-mini">
          	<md-icon md-menu-origin="" md-font-icon="material-icons">clear</md-icon>
          </md-button>
          <md-button aria-label="Delete" class="md-fab md-raised md-mini" ng-click="deleteSeats()">
          	<md-icon md-menu-origin="" md-font-icon="material-icons">delete_forever</md-icon>
          </md-button>
        </md-fab-actions>
      </md-fab-speed-dial>  
      
      
    </md-content>
    
</div>
</body>
</html>