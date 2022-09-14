 <div ng-controller="userViewController">
 <div layout="row" layout-sm="column" class="usrprog" layout-align="space-around">
        
        </div>
<div layout="row" flex="noshrink" layout-align="center center">
        <md-icon md-font-icon="material-icons">people</md-icon>Home
</div>

<md-content  flex="60" layout-padding>
<md-card md-theme="default" >
        <md-card-title md-theme-watch ng-repeat="d in userdata">
          <md-card-title-text >
            <span class="md-headline">{{d.p_fname}}</span>
            <span class="md-subhead">{{d.p_lname}}</span>
            <span class="md-subhead">{{d.p_username}}</span>
            <span class="md-subhead">{{d.p_id}}</span>
            <span class="md-subhead">{{d.p_role}}</span>
          </md-card-title-text>
          <md-card-title-media>
            <img class="md-media-lg card-media" id="profileimgshow" ng-src="http://www.bitestory.com/images/fallback.jpg" alt="Profile" width="128px" height=auto style="border-radius:50%;"/>  
          </md-card-title-media>
        </md-card-title>
        
        
      </md-card>
<div layout="row" flex="noshrink" layout-align="center center">
        <md-icon md-font-icon="material-icons">people</md-icon>History
</div>
<md-list flex>
<md-list-item class="md-3-line" ng-repeat="d in userdata">     
<div class="md-list-item-text" layout="column">    

  <h3>{{d.mod_type}}</h3>
  <h4>{{d.mod_human_timestamp}}</h4>
</div>

</md-list-item>
</md-list>

</md-content>
 
</div>
