<md-dialog aria-label="User Details" flex-xs flex-gt-xs=50 >
  <form ng-cloak >
    <md-toolbar>
      <div class="md-toolbar-tools">
      	
        <h2>ADD VIDEO</h2>
        <span flex></span>
        <md-button class="md-icon-button" ng-click="cancel()">
          <md-icon md-menu-origin="" md-font-icon="material-icons">cancel</md-icon>
        </md-button>
      </div>
    </md-toolbar>
    
    <md-dialog-content class="md-padding" layout-xs="column">
    <div flex-xs flex-gt-xs="100" layout="column">
     <md-card md-theme="default" >
     <div layout="row" layout-sm="column" layout-align="space-around" ng-hide="activated">
        <md-progress-circular ng-disabled="activated" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>
        </div>
        <md-card-title md-theme-watch >
          <md-card-title-text >
            <span class="md-headline">Video URL</span>
            <span class="md-subhead">Support: Youtube</span>
            <span class="md-caption">Copy youtube URL/Address from your browser and paste here</span>
          </md-card-title-text>
        </md-card-title>
        
        <md-card-actions layout="column" layout-align="start" class="md-block">
          <md-input-container style="margin-right: 10px;" class="md-block">
         <label>Paste Video URL</label>
          <input ng-model="vidembed" ng-value="vidembed">
          </md-input-container>
          
        </md-card-actions>
      </md-card>
    
     
     </div>
    </md-dialog-content>
    <md-dialog-actions layout="row">
    <div class="message">{{checkmsg}}</div>
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