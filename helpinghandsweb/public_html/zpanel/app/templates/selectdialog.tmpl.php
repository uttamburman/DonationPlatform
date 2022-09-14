<md-dialog aria-label="User Details" flex-xs flex-gt-xs=50 >
  <form ng-cloak >
    <md-toolbar>
      <div class="md-toolbar-tools">
      	
        <h2>Story Preview</h2>
        <span flex></span>
        <md-button class="md-icon-button" ng-click="hide()">
          <md-icon md-menu-origin="" md-font-icon="material-icons">cancel</md-icon>
        </md-button>
      </div>
    </md-toolbar>
    
    <md-dialog-content class="md-padding" layout-xs="column">
    <div flex-xs flex-gt-xs="100" layout="column">
      <div ng-repeat="m in storymeta">
      <div class="storycoverwrap">
      <img ng-src="http://cdn.helpinghandsgroup.in/{{m.arid}}/{{m.covimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="coverphoto" alt="{{m.title}}">
      </div>
      <div class="storytitle">{{m.title}}</div>
      <div class="storyauthor">
      <img class="authorpic" ng-src="http://cdn.helpinghandsgroup.in/users/pics/{{authorimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg">
      <div class="authordet">
      		<div class="authorname">{{authorname}}</div>
      		<div class="dtcreate">{{m.dtofcreate}}</div>
      </div>
      </div>
      <div class="storyintro" ng-bind-html="trustAsHtml(m.storydesc)"></div>
      
      
      </div>
      <div ng-repeat="c in storycont">
      	<div class="storyviewcaption" ng-bind-html="trustAsHtml(c.medcapt)"></div>
        <div class="storymediawrap" ng-if="c.medtype == 'image' ">
          <img ng-src="http://cdn.helpinghandsgroup.in/{{c.arid}}/{{c.medpath}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="storymediapic">
          </div>
          <div class="storymediawrap" ng-if="c.medtype == 'video' ">
          <div my-youtube code="c.medpath"></div>
          </div>
          <a><div class="mediaref" ng-bind-html="trustAsHtml(c.medref)"></div></a>
        <div class="mediaviewdesc" ng-bind-html="trustAsHtml(c.meddesc)"></div>
      </div>
    
     
     </div>
     <div layout="row" layout-sm="column" layout-align="space-around">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
        </div>
    </md-dialog-content>
    <md-dialog-actions layout="row" class="reviewaction">
      <span class="breaker" flex></span><br/>
      <md-button aria-label="Deny Story" class="md-icon-button" ng-click="deny()">
                <md-icon md-font-icon="material-icons">clear</md-icon>
      </md-button> 
      <md-button aria-label="Accept Story" class="md-icon-button" ng-click="answer()">
                <md-icon md-font-icon="material-icons">done</md-icon>
      </md-button>           
    </md-dialog-actions>
  </form>
</md-dialog>