<div ng-controller="usersController">
  <div layout="row" layout-sm="column" class="usrprog" layout-align="space-around">
    
  </div>
  <div layout="row" flex="noshrink" layout-align="center center">
    <md-icon md-font-icon="material-icons">people</md-icon>Users
  </div>
  <div layout="row" layout-sm="column" layout-xs="column" >
    <md-content flex="35" layout-padding flex-sm="100" flex-xs="100">
    <div class="access-title">Create User</div>

    <form ng-submit="form.$valid && signListener()" name="form" novalidate ng-cloak >

      <md-input-container class="md-block md-subhead" flex-gt-xs>

      <label>First Name</label>

      <input ng-model="userFName" name="userFName" class="forminput md-padding" ng-value="" type="text" ng-required="true" minlength="3" md-maxlength="30">
      <div ng-messages="form.userFName.$error">
          <div ng-message="required">First Name is required.</div>
          <div ng-message="md-maxlength">First Name must be less than 30 characters.</div>
          <div ng-message="minlength">First Name must be atleast 3 characters long</div>
        </div>

    </md-input-container>
    <md-input-container class="md-block md-subhead" flex-gt-xs>


    <label>Last Name</label>

    <input ng-model="userLName" name="userLName" class="forminput md-padding" ng-value="" type="text" ng-required="true" minlength="3" md-maxlength="30">
    <div ng-messages="form.userLName.$error">
          <div ng-message="required">Last Name is required.</div>
          <div ng-message="md-maxlength">Last Name must be less than 30 characters.</div>
          <div ng-message="minlength">Last Name must be atleast 3 characters long</div>
        </div>

  </md-input-container>
<md-input-container class="md-block md-subhead" flex-gt-xs>
  <label>User ID</label>

  <input ng-model="userName" name="userName" class="forminput md-padding" ng-value="<?php echo $usrname; ?>" type="text" ng-required="true" minlength="3" md-maxlength="30">
  <div ng-messages="form.userName.$error">
          <div ng-message="required">Username is required.</div>
          <div ng-message="md-maxlength">Username must be less than 30 characters.</div>
          <div ng-message="minlength">Username must be atleast 3 characters long</div>
        </div>
</md-input-container>

<md-input-container class="md-block md-subhead" flex-gt-xs>

<label>Password</label>

<input ng-model="userPassword" type="password" name="userPassword" class="forminput md-padding" ng-required="true" minlength="8" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$^*)(._-])(?=.*[^a-zA-Z._-])(?=.*[^a-zA-Z._-])/" md-maxlength="20">
<div ng-messages="form.userPassword.$error">
          <div ng-message="required">Password is required.</div>
          <div ng-message="md-maxlength">Password must be less than 20 characters.</div>
          <div ng-message="minlength">Password must be atleast 8 characters long</div>
          <div ng-message="pattern">Password must have a lowercase, uppercase , number and special character</div>
        </div>

</md-input-container>
<md-input-container class="md-block md-subhead" flex-gt-xs>

<label>Confirm Password</label>

<input ng-model="userCPassword" type="password" name="userCPassword" class="forminput md-padding" ng-required="true" minlength="8" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$^*)(._-])(?=.*[^a-zA-Z._-])(?=.*[^a-zA-Z._-])/" md-maxlength="20">
<div ng-messages="form.userCPassword.$error">
          <div ng-message="required">Confirm Password is required.</div>
          <div ng-message="md-maxlength">Confirm Password must be less than 20 characters.</div>
          <div ng-message="minlength">Confirm Password must be atleast 8 characters long</div>
          <div ng-message="pattern">Confirm Password must have a lowercase, uppercase , number and special character</div>
        </div>

</md-input-container>

<div class="result" layout-align="center center">{{response}}</div>

<md-button class="md-raised signbtn" value="Send" ng-click="form.$valid && signListener()">Sign In</md-button>
<md-button class="md-raised signbtn" value="Cancel" ng-click="cancelSign()">Cancel</md-button>


<div layout="row" layout-sm="column" layout-align="space-around" ng-hide="ucProgress">

  <md-progress-circular md-mode="indeterminate" ng-disabled="ucProgress" class="md-accent md-hue-1" md-diameter="40px"></md-progress-circular>

</div>

</form>


</md-content>
<md-content  flex="60" layout-padding flex-sm="100" flex-xs="100">


<md-list flex>
<md-list-item class="md-3-line" ng-repeat="d in data" ng-click="userView(d.p_id)">    
<img class="profileimgshowl md-avatar" id="profileimgshowl" ng-src="http://www.bitestory.com/assets/images/user65.png" alt="Profile" width="96px" height="96px" style="border-radius:50%;"/>  
<div class="md-list-item-text" layout="column">    

  <h3>{{d.p_lname}},&nbsp;{{d.p_fname}}</h3>
  <h4>{{d.p_role}}</h4>
  <p>{{d.p_username}}</p>

</div>
<md-button aria-label="View User" class="md-secondary md-icon-button" ng-click="userProfileView(d.p_id)">
<md-icon md-menu-origin="" md-font-icon="material-icons">picture_in_picture</md-icon>
</md-button>
</md-list-item>
</md-list>

</md-content>
</div>
</div>
