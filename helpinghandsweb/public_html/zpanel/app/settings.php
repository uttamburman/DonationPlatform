<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Settings</title>
</head>

<body>
<div style="background:white">

<md-content class="md-padding" layout-xs="column" layout="row">
<h2 class="md-headline" style="margin-top: 0;color:#7160B3">Profile</h2>

</md-content>
  <div class="profilecoverinput md-block">
  <div class="profilecoveruploadbox">
     <img class="profilecoverimgshow" id="profilecoverimgshow" ng-src="http://www.helpinghandsgroup.in/members/users/{{mid}}/cover/{{profilecoverimghash}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg" alt="Cover" />        	
            <div id="pfcvstatustxt">0%</div >        
    </div> 
  <span class="profilename">{{memname}}<br/><span class="membrole">{{memrole}}</span><br/><span class="membdte">Member since: {{memdate}}</span></span>
<form action="app/dataprocess/uploadprofilecoverimg.php" class="profilecoverform"  method="post" enctype="multipart/form-data" id="ProfileCoverUploadForm" >
   
    <label for="profilecoverupload" class="md-button md-fab profilecoverlabel" layout="row" layout-align="center center" ng-disabled="distoggle">
        <span><md-icon md-font-icon="material-icons">panorama</md-icon></span>
    </label>
    <input name="ProfileCoverImageFile" type="file" multiple  class="profilecoverupload" id="profilecoverupload" ng-disabled="distoggle"  style="display:none;"/>   
    <input type="submit"  id="ProfileCoverSubmitButton" value="ProfileCoverUpload" style="display: none;"/>
</form>

  </div>
<div class="pfcvprogressbox" id="pfcvprogressbox"><div id="pfcvprogressbar"></div ></div>

  <div class="profileinput md-block">
  <div class="profileuploadbox">
     <img class="profileimgshow" id="profileimgshow" ng-src="http://www.helpinghandsgroup.in/members/users/{{mid}}/{{profileimghash}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg" alt="Cover" />        	
            <div id="pfstatustxt">0%</div >        
    </div> 
  
       <form action="app/dataprocess/uploadprofileimg.php" class="profileform"  method="post" enctype="multipart/form-data" id="ProfileUploadForm" >
   
    <label for="profileupload" class="md-button md-fab md-mini profilelabel" layout="row" layout-align="center center" ng-disabled="distoggle">
        <span><md-icon md-font-icon="material-icons">image</md-icon></span>
    </label>
    <input name="ProfileImageFile" type="file" multiple  class="profileupload" id="profileupload" ng-disabled="distoggle" style="display:none;"/>   
    <input type="submit"  id="ProfileSubmitButton" value="ProfileUpload" style="display: none;"/>
</form>

  </div>
  <div class="pfprogressbox" id="pfprogressbox"><div id="pfprogressbar"></div ></div>

<md-content class="md-padding" layout-xs="column" layout="row" style="background:white">
<div class="mystorycardholder">

<md-card md-theme="default" class="settingcard">
  <md-card-title md-theme-watch>
          <md-card-title-text >
          <span class="md-headline">Profile</span>
            <md-input-container class="md-block slug">
              <label><span><md-icon md-font-icon="material-icons">person</md-icon></span><span> Name</span></label>
              <input ng-model="memname"  ng-value="memname" ng-disabled="true">
            </md-input-container>
            <md-input-container class="md-block slug">
              <label><span><md-icon md-font-icon="material-icons">whatshot</md-icon></span><span> Role</span></label>
              <input ng-model="memrole"  ng-value="memrole" ng-disabled="true">
            </md-input-container>
            <md-input-container class="md-block slug">
              <label><span><md-icon md-font-icon="material-icons">person_outline</md-icon></span><span> Username</span></label>
              <input ng-model="memusrname"  ng-value="memusrname" ng-disabled="true">
            </md-input-container>
            <md-input-container class="md-block slug">
              <label><span><md-icon md-font-icon="material-icons">restore</md-icon></span><span> Profile Last Modified</span></label>
              <input ng-model="memmoddt"  ng-value="memmoddt" ng-disabled="true">
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
        <input type="password" ng-model="memcurpwd"  ng-value="memcurpwd" ng-disabled="pwdchange">
      </md-input-container>
      <label class="md-button md-fab passwordlabel" layout="column" layout-align="center center" ng-click="editPassword()" ng-hide="!pwdchange">
        <span><md-icon md-font-icon="material-icons">create</md-icon></span>
      </label>
      <md-input-container class="md-block slug" ng-hide="pwdchange">
        <label><span><md-icon md-font-icon="material-icons">lock_outline</md-icon></span><span> New Password</span></label>
        <input type="password" ng-model="memnewpwd1"  ng-value="memnewpwd1" ng-keyup="matchPwd1()" ng-disabled="pwdchange">
      </md-input-container>
      <md-input-container class="md-block slug" ng-hide="pwdchange">
        <label><span><md-icon md-font-icon="material-icons">lock_outline</md-icon></span><span> New Password Again</span></label>
        <input type="password" ng-model="memnewpwd2"  ng-value="memnewpwd2" ng-keyup="matchPwd2()" ng-disabled="pwdchange">
      </md-input-container>
      <md-button class="md-raised" ng-click="changePassword();" ng-hide="pwdchangebtn" ng-disabled="distogglematch"> Change Password</md-button>
		</md-card-title-text>
  	</md-card-title>
</md-card>
<md-card md-theme="default" class="settingcard">
  <md-card-title md-theme-watch>
          <md-card-title-text >
          <span class="md-headline">Reach</span>
      <md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">perm_phone_msg</md-icon></span><span>Contact</span></label>
        <input ng-model="memcontact"  ng-value="memcontact" ng-disabled="true">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">perm_phone_msg</md-icon></span><span> Secondary Contact</span></label>
        <input ng-model="memseccontact"  ng-value="memseccontact" ng-keyup="memcontactSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">contact_mail</md-icon></span><span> Primary Email</span></label>
        <input ng-model="mememail"  ng-value="mememail" ng-disabled="true">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">email</md-icon></span><span> Secondary Email</span></label>
        <input ng-model="memsecemail"  ng-value="memsecemail" ng-keyup="memsecemailSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">location_city</md-icon></span><span> City</span></label>
        <input ng-model="memcity"  ng-value="memcity" ng-keyup="memcitySubmit()">
      </md-input-container>
      <md-input-container class="md-block md-headline" flex="100">
          <label><span><md-icon md-font-icon="material-icons">place</md-icon></span> Address</label>
          <textarea ng-model="memaddress" ng-value="memaddress" md-maxlength="200" rows="1" ng-keyup="memaddressSubmit()"></textarea>
      </md-input-container>
      </md-card-title-text>
  	</md-card-title>
</md-card>
<md-card md-theme="default" class="settingcard">
  <md-card-title md-theme-watch>
          <md-card-title-text >
      <span class="md-headline">Social Profile</span>
      <md-input-container class="md-block md-body-2" flex="100">
        <label><span><md-icon md-font-icon="material-icons">subject</md-icon></span><span> Introduction</span></label>
        <textarea ng-model="memintro"  ng-value="memintro" md-maxlength="250" rows="1" ng-keyup="memintroSubmit()"></textarea>
      </md-input-container>
      
      <md-input-container style="margin-right: 10px;" class="md-block">
        <label>Theme Color</label>
          <md-select  ng-model="memtheme" ng-value="memtheme" ng-change="themeSelect()">
          	<md-option value="Red">Red</md-option>
          	<md-option value="Pink">Pink</md-option>
          	<md-option value="Purple">Purple</md-option>
            <md-option value="Deep-Purple">Deep-Purple</md-option>
          	<md-option value="Indigo">Indigo</md-option>
          	<md-option value="Blue">Blue</md-option>
            <md-option value="Light-Blue">Light-Blue</md-option>
          	<md-option value="Cyan">Cyan</md-option>
          	<md-option value="Teal">Teal</md-option>
            <md-option value="Green">Green</md-option>
          	<md-option value="Light-Green">Light-Green</md-option>
          	<md-option value="Lime">Lime</md-option>
            <md-option value="Yellow">Yellow</md-option>
            <md-option value="Amber">Amber</md-option>
            <md-option value="Orange">Orange</md-option>
            <md-option value="Deep-Orange">Deep-Orange</md-option>
            <md-option value="Brown">Brown</md-option>
            <md-option value="Grey">Grey</md-option>
            <md-option value="Blue-Grey">Blue-Grey</md-option>
     	  </md-select>
          </md-input-container>
          <md-input-container class="md-block slug">
        <label><span><i class="fa fa-facebook-f" style="font-size:20px;color:#3b5998;"></i></span><span> Facebook</span></label>
        <input ng-model="memfb"  ng-value="memfb" ng-keyup="memfbSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><i class="fa fa-linkedin" style="font-size:20px;color:#4875B4;"></i></span><span> Linkedin</span></label>
        <input ng-model="memln"  ng-value="memln" ng-keyup="memlnSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><i class="fa fa-google-plus" style="font-size:20px;color:#C63D2D;"></i></span><span> Google+</span></label>
        <input ng-model="memgp"  ng-value="memgp" ng-keyup="memgpSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><i class="fa fa-twitter" style="font-size:20px;color:#33CCFF;"></i></span><span> Twitter</span></label>
        <input ng-model="memtw"  ng-value="memtw" ng-keyup="memtwSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><i class="fa fa-behance" style="font-size:20px;color:#4875B4;"></i></span><span> Behance</span></label>
        <input ng-model="membe"  ng-value="membe" ng-keyup="membeSubmit()">
      </md-input-container>
      <md-input-container class="md-block slug">
        <label><span><i class="fa fa-pinterest-p" style="font-size:20px;color:#C63D2D;"></i></span><span> Pinterest</span></label>
        <input ng-model="mempn"  ng-value="mempn" ng-keyup="mempnSubmit()">
      </md-input-container>
      </md-card-title-text>
  	</md-card-title>
</md-card>
<br/>
<span class="md-headline">Your Profile Looks Exactly like this! <br/> <span class="md-caption">Didn't Liked it? Well You can always change your profile image, and theme.</span></span>

<div class="row active-with-click">
<div class="col-md-4 col-sm-6 col-xs-12">
            <article class="material-card {{memtheme}}">
                <h2>
                    <span>{{memname}}</span>
                    <strong>
                        <i class="fa fa-fw fa-star"></i>
                        {{memrole}}
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive colorize" ng-src="http://www.helpinghandsgroup.in/members/users/{{mid}}/{{profileimghash}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg">
                    </div>
                    <div class="mc-description roletext">
                        {{memintro}}
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <h4>
                        Social
                    </h4>
                    <a class="fa fa-fw fa-facebook" href="{{memfb}}" target='_blank'></a>                    
                    <a class="fa fa-fw fa-twitter" href="{{memtw}}" target='_blank'></a>
                    <a class="fa fa-fw fa-linkedin" href="{{memln}}" target='_blank'></a>
                    <a class="fa fa-fw fa-google-plus" href="{{memgp}}" target='_blank'></a>
                </div>
            </article>
        </div>
</div>
</div>

</md-content>

</div>
</body>
</html>