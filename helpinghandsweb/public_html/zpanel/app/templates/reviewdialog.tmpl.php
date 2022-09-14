<md-dialog aria-label="User Details" flex-xs flex-gt-xs=50 >
  <form ng-cloak >
    <md-toolbar>
      <div class="md-toolbar-tools">
      	
        <h2>Story Preview</h2>
        <span flex></span>
        <md-button class="md-icon-button" ng-click="cancel()">
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
      <md-input-container style="margin-right: 10px;">
         <label>Review</label>
          <md-select class="md-primary" ng-model="review" ng-value="review">
     		<md-optgroup label="Acceptable">
            	<md-option value="pending">Pending</md-option>
          		<md-option value="clean">Clean</md-option>
          		<md-option value="changes required">Changes Required</md-option>          		
      		</md-optgroup>
     		<md-optgroup label="Unacceptable">
          		<md-option value="unacceptable">Unacceptable</md-option>
     		</md-optgroup>
     </md-select>
          </md-input-container>
         <md-input-container class="md-block md-subhead" flex="95">
          <label><span><md-icon md-font-icon="material-icons">short_text</md-icon></span>REMARKS</label>
          <textarea required name="remark" ng-model="remark" ng-value="shortdesctext" md-maxlength="250" rows="1"></textarea>
        </md-input-container>
      <md-button ng-click="answer()">
        Review
      </md-button>
      <md-button ng-click="cancel()">
        Close
      </md-button>      
    </md-dialog-actions>
  </form>
</md-dialog>