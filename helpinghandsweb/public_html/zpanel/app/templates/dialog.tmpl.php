<md-dialog aria-label="User Details" flex-xs flex-gt-xs=50 >
  <form ng-cloak >
    <md-toolbar>
      <div class="md-toolbar-tools">
      	
        <h2>Verify & Assign Role</h2>
        <span flex></span>
        <md-button class="md-icon-button" ng-click="cancel()">
          <md-icon md-menu-origin="" md-font-icon="material-icons">cancel</md-icon>
        </md-button>
      </div>
    </md-toolbar>
    
    <md-dialog-content class="md-padding" layout-xs="column">
    <div flex-xs flex-gt-xs="100" layout="column">
     <md-card md-theme="default" >
     <div layout="row" layout-sm="column" layout-align="space-around">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
        </div>
        <md-card-title md-theme-watch ng-repeat="ud in userdata">
          <md-card-title-text >
            <span class="md-headline">{{ud.name}}</span>
            <span class="md-subhead">{{ud.address}}</span>
            <span class="md-subhead">{{ud.email}}</span>
            <span class="md-subhead">{{ud.contact}}</span>
            <span class="md-subhead">{{ud.adminverif}}</span>
          </md-card-title-text>
          <md-card-title-media>
            <img class="md-media-lg card-media" id="profileimgshow" ng-src="http://www.helpinghandsgroup.in/members/users/{{ud.id}}/{{profileimghash}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg" alt="Profile" width="128px" height=auto style="border-radius:50%;"/>  
          </md-card-title-media>
        </md-card-title>
        
        <md-card-actions layout="row" layout-align="end center">
         <md-input-container style="margin-right: 10px;">
         <label>Verification</label>
          <md-select  ng-model="ver">
          	<md-option value="verified">Verify</md-option>
          	<md-option value="refuted">Refute</md-option>
     	  </md-select>
          </md-input-container>
          <md-input-container style="margin-right: 10px;">
         <label>Role</label>
          <md-select class="md-primary" ng-model="role">
     		<md-optgroup label="Roles">
          		<md-option value="member">Member</md-option>
          		<md-option value="editor">Editor</md-option>
          		<md-option value="admin">Administrator</md-option>
      		</md-optgroup>
     		<md-optgroup label="Leads">
          		<md-option value="chief">Chief</md-option>
     		</md-optgroup>
     </md-select>
          </md-input-container>
          <md-input-container style="margin-right: 10px;">
         <label>Position</label>
          <md-select class="md-primary" ng-model="pos">
     		<md-optgroup label="Member">
          		<md-option value="cord">Coordinater</md-option>
          		<md-option value="lead">Lead</md-option>
          		<md-option value="chief">Chief</md-option>
                <md-option value="volun">Volunteer</md-option>
      		</md-optgroup>
     		<md-optgroup label="Outsider">
          		<md-option value="none">None</md-option>
     		</md-optgroup>
     </md-select>
          </md-input-container>
          <md-input-container style="margin-top: 40px;" class="md-block">
         <label>Position Description</label>
          <input ng-model="subposit" ng-value="subposit">
          </md-input-container>
        </md-card-actions>
      </md-card>
    
     
     </div>
    </md-dialog-content>
    <md-dialog-actions layout="row">
      <span flex></span>
      <md-button ng-click="cancel()">
        Cancel
      </md-button>
      <md-button ng-click="answer()">
        Apply
      </md-button>
    </md-dialog-actions>
  </form>
</md-dialog>