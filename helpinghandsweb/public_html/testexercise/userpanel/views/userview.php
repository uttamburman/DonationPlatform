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
        <md-icon md-font-icon="material-icons">people</md-icon>Modify
</div>
<div ng-controller="SettingsController">
<md-card md-theme="default" class="settingcard">
  <md-card-title md-theme-watch>
          <md-card-title-text >
          <span class="md-headline">Profile</span>
            <md-input-container class="md-block slug">
              <label><span><md-icon md-font-icon="material-icons">person</md-icon></span><span> Name</span></label>
              <input ng-model="fname"  ng-value="fname" ng-disabled="false" ng-keyup="pnameSubmit()" ng-required="true" minlength="3">
            </md-input-container>
          </md-card-title-text>
    </md-card-title>
</md-card>
<md-card md-theme="default" class="settingcard">
  <md-card-title md-theme-watch>  
          <md-card-title-text>
          <span class="md-headline">Security</span>
      <md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">lock</md-icon></span><span> CurrentPassword</span></label>
        <input type="password" ng-model="memcurpwd"  ng-value="memcurpwd" ng-disabled="pwdchange" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$^*)(._-])(?=.*[^a-zA-Z._-])(?=.*[^a-zA-Z._-])/" ng-required="true" minlength="8">
      </md-input-container>
      <label class="md-button md-fab passwordlabel" layout="column" layout-align="center center" ng-click="editPassword()" ng-hide="!pwdchange">
        <span><md-icon md-font-icon="material-icons">create</md-icon></span>
      </label>
      <md-input-container class="md-block slug" ng-hide="pwdchange">
        <label><span><md-icon md-font-icon="material-icons">lock_outline</md-icon></span><span> New Password</span></label>
        <input type="password" ng-model="memnewpwd1"  ng-value="memnewpwd1" ng-keyup="matchPwd1()" ng-disabled="pwdchange" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$^*)(._-])(?=.*[^a-zA-Z._-])(?=.*[^a-zA-Z._-])/" ng-required="true" minlength="8">
      </md-input-container>
      <md-input-container class="md-block slug" ng-hide="pwdchange">
        <label><span><md-icon md-font-icon="material-icons">lock_outline</md-icon></span><span> New Password Again</span></label>
        <input type="password" ng-model="memnewpwd2"  ng-value="memnewpwd2" ng-keyup="matchPwd2()" ng-disabled="pwdchange" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$^*)(._-])(?=.*[^a-zA-Z._-])(?=.*[^a-zA-Z._-])/" ng-required="true" minlength="8">
      </md-input-container>
      <md-button class="md-raised" ng-click="changePassword();" ng-hide="pwdchangebtn" ng-disabled="distogglematch"> Change Password</md-button>
    </md-card-title-text>
    </md-card-title>
</md-card>
</div>
</md-content>
 
</div>
