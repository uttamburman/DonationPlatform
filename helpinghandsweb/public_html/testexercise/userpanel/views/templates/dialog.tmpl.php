<md-dialog aria-label="User Details" flex-xs flex-gt-xs=50 >
  <form ng-cloak >
    <md-toolbar>
      <div class="md-toolbar-tools">
      	
        <h2>User Details</h2>
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
            <span class="md-headline">{{ud.p_fname}}</span>
            <span class="md-subhead">{{ud.p_lname}}</span>
            <span class="md-subhead">{{ud.p_username}}</span>
            <span class="md-subhead">{{ud.p_role}}</span>
          </md-card-title-text>
          <md-card-title-media>
            <img class="md-media-lg card-media" id="profileimgshow" ng-src="http://www.bitestory.com/images/fallback.jpg" alt="Profile" width="128px" height=auto style="border-radius:50%;"/>  
          </md-card-title-media>
        </md-card-title>
        
        
      </md-card>
    
     
     </div>
    </md-dialog-content>
    <md-dialog-actions layout="row">
      <span flex></span>
      <md-button ng-click="cancel()">
        Cancel
      </md-button>
      <md-button ng-click="answer()">
        Profile
      </md-button>
    </md-dialog-actions>
  </form>
</md-dialog>