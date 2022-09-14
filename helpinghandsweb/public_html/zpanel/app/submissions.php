<md-content class="md-padding" layout-xs="column" layout="row">
<h2 class="md-headline" style="margin-top: 0;">Story Submissions</h2>
</md-content>

<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Available for submission</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>
<md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="a in availstory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{a.arid}}/400/{{a.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{a.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{a.title}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{a.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
                <md-fab-toolbar md-open="submitopen"
                        md-direction="left">
          <md-fab-trigger class="align-with-text">
            <md-button aria-label="menu" class="md-fab md-primary">
               <md-tooltip>
                Promote Your Story
              </md-tooltip>
              <md-icon md-font-icon="material-icons">menu</md-icon>
            </md-button>
          </md-fab-trigger>
      
          <md-toolbar>
            <md-fab-actions class="md-toolbar-tools fabicons">
              <md-button aria-label="Promote for Legend" class="md-icon-button" ng-click="submitLegend(a.arid);">
                <md-icon md-font-icon="material-icons">view_compact</md-icon>
              </md-button>
              <md-button aria-label="Promote for Editors' Pick" class="md-icon-button" ng-click="submitEditor(a.arid);">
                <md-icon md-font-icon="material-icons">style</md-icon>
              </md-button>
              <md-button aria-label="Promote for Featured" class="md-icon-button" ng-click="submitFeatured(a.arid);">
                <md-icon md-font-icon="material-icons">view_comfy</md-icon>
              </md-button>
            </md-fab-actions>
          </md-toolbar>
        </md-fab-toolbar>

        </md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!availstory.length">trending_down</i>
</div>
</md-content>
<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">Accepted Submissions</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated1">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>

<md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="ax in acceptstory" class="cardex">
 <img ng-src="http://cdn.helpinghandsgroup.in/{{ax.arid}}/400/{{ax.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="md-card-image" alt="{{ax.title}}">
 		<md-card-title>
          <md-card-title-text>
            <span class="md-headline">{{ax.title}}</span>
          </md-card-title-text>
        </md-card-title>
         <md-card-content>
          <p>
            {{ax.shortdesc}}
          </p>
           </md-card-content>
            <md-card-actions layout="row" layout-align="end center">
            	<md-icon md-font-icon="material-icons">done</md-icon>
        	</md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!acceptstory.length">trending_down</i>
</div>
</md-content>



<md-content class="_md">
<h2 class="md-headline" style="margin-top: 0;">All Submissions</h2>
<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="!activated2">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
</div>
</md-content>

<md-content class="md-padding" layout-xs="column" layout="row">
 <div class="mystorycardholder">
<md-card ng-repeat="s in submitstory" class="cardex">
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
            	<md-icon md-font-icon="material-icons" ng-if="s.status == 'selected'">done</md-icon>
                <md-icon md-font-icon="material-icons" ng-if="s.status == 'submitted'">clear</md-icon>
        	</md-card-actions>
 </md-card>
 <i class="material-icons" ng-show="!submitstory.length">trending_down</i>
</div>
</md-content>