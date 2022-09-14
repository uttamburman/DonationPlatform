<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Review Articles</title>
</head>

<body>
<div layout="row" flex="noshrink" layout-align="center center">
        <md-icon md-font-icon="material-icons">library_books</md-icon>Review Articles
</div>

<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Articles to Review</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
 <md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="s in reviewstory" class="cardex">
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
          <md-button class="md-fab md-primary md-hue-2" ng-click="articleReview(s.arid);"> 
          <md-icon md-font-icon="material-icons">thumbs_up_down</md-icon>         
          </md-button>
        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!reviewstory.length">flag</i>
</div>
</md-content>




</body>
</html>