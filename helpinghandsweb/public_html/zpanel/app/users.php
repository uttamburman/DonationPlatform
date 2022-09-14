 <div ng-controller="userListCtrl">
 <div layout="row" layout-sm="column" class="usrprog" layout-align="space-around">
        <md-progress-linear ng-disabled="useract" md-mode="indeterminate"></md-progress-linear>
        </div>
<div layout="row" flex="noshrink" layout-align="center center">
        <md-icon md-font-icon="material-icons">people</md-icon>Users
</div>
 <md-content flex-gt-sm="100" flex layout-padding>
 {{status}}

 	<md-list flex>
 	<md-list-item class="md-3-line" ng-repeat="d in data" ng-click="userView(d.id)">    
    <img class="profileimgshowl md-avatar" id="profileimgshowl" ng-src="http://www.helpinghandsgroup.in/members/users/{{d.id}}/{{d.prof}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg" alt="Profile" width="96px" height="96px" style="border-radius:50%;"/>  
    	<div class="md-list-item-text" layout="column">    
          
          <h3>{{d.name}}</h3>
          <h4>{{d.contact}}</h4>
          <p>{{d.email}}</p>
          
          </div>
          <md-button aria-label="View User" class="md-secondary md-icon-button" ng-click="userView(d.id)">
            <md-icon md-menu-origin="" md-font-icon="material-icons">play_for_work</md-icon>
          </md-button>
    </md-list-item>
    </md-list>
     
</md-content>
</div>
