<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Story Selection</title>
</head>

<body>
<div layout="row" flex="noshrink" layout-align="center center">
        <md-icon md-font-icon="material-icons">library_books</md-icon>Review Articles
</div>

<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Stories For Legend</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="s in legendstory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{s.arid}}/400/{{s.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{s.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{s.title}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{s.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
          <md-button class="md-fab md-primary md-hue-2" ng-click="articleSelect(s.arid);"> 
          <md-icon md-font-icon="material-icons">filter_list</md-icon>         
          </md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!legendstory.length">flag</i>
</div>
</md-content>

<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Stories For Editors' Pick</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated1">
        <md-progress-circular ng-disabled="activated1" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="e in editorstory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{e.arid}}/400/{{e.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{e.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{e.title}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{e.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
          <md-button class="md-fab md-primary md-hue-2" ng-click="articleSelect(e.arid);"> 
          <md-icon md-font-icon="material-icons">filter_list</md-icon>         
          </md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!editorstory.length">flag</i>
</div>
</md-content>
<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Stories For Featured Block</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated2">
        <md-progress-circular ng-disabled="activated2" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="f in featurestory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{f.arid}}/400/{{f.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{f.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{f.title}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{f.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
          <md-button class="md-fab md-primary md-hue-2" ng-click="articleSelect(f.arid);"> 
          <md-icon md-font-icon="material-icons">filter_list</md-icon>         
          </md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!featurestory.length">flag</i>
</div>
</md-content>


</body>
</html>