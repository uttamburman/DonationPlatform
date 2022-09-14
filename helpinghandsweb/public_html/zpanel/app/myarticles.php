<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
</head>

<body>
<div layout="row" flex="noshrink" layout-align="center center">
        <md-icon md-font-icon="material-icons">library_books</md-icon>My Articles
</div>


<md-content class="md-padding" layout-xs="column" layout="row">
<h2 class="md-headline" style="margin-top: 0;">New Articles</h2>
</md-content>
<md-content class="md-padding" layout-xs="column" layout="row">
<div flex-xs flex-gt-xs="30" class="addarticle" layout="column">
<md-button class="md-raised md-primary mbtn" ng-href="#Editor">
<br>
<md-icon md-menu-origin="" md-font-icon="material-icons">home</md-icon><br><br>
<span class="crbtn">Create New Article</span></md-button>
</div>
</md-content>
<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Your Draft Articles</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="s in editstory" class="cardex">
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
          <md-button class="md-fab md-primary md-hue-2" ng-click="openStory(s.arid);"> 
          <md-icon md-font-icon="material-icons">create</md-icon>         
          </md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!editstory.length">trending_down</i>
</div>
</md-content>


<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Your Produced Articles</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated1">
        <md-progress-circular ng-disabled="activated1" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="p in pubstory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{p.arid}}/400/{{p.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{p.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{p.title}}</span>
            <span class="md-subhead">Review Status: {{p.review}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{p.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
          <md-button class="md-fab md-primary md-hue-2" ng-click="openStory(p.arid);"> 
          	<md-icon md-font-icon="material-icons">create</md-icon>
          </md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!pubstory.length">trending_down</i>
</div>
</md-content>


<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Your Published Articles</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated2">
        <md-progress-circular ng-disabled="activated2" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="r in runstory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{r.arid}}/400/{{r.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{r.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{r.title}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{r.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
          <md-button class="md-raised" ng-click="viewStory(r.arid);"> View on Web</md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!runstory.length">trending_down</i>
</div>
</md-content>

</body>
</html>