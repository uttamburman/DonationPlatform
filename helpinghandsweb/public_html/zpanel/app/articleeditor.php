<div layout="row" flex="20" layout-align="left">
        <span><md-icon md-font-icon="material-icons">mode_edit</md-icon></span>Article Editor
        
</div>


<div layout="row" class="editorbody">
<md-content class="primarysection" flex="65" flex-sm="60" flex-xs="100" layout-sm="column" layout-xs="column">
<br/>
  <div class="titleinput">
   
   <form>
    <div class="md-block" >
    <input type="hidden" ng-model="aid" ng-value="aid">
       <md-input-container class="md-block md-headline" flex="95">
          <label><span><md-icon md-font-icon="material-icons">looks</md-icon></span>Title</label>
          <textarea name="titletext" ng-model="titletext" ng-value="titletext" md-maxlength="200" rows="1" md-select-on-focus ng-keyup="titlekeySubmit()" focus="true"></textarea>
        </md-input-container>
    </div>
    </form>
  </div>
  <div class="md-block">    
    <div class="inputholder">
    <form ng-submit="shordescSubmit()">
       <md-input-container class="md-block md-subhead" flex="95">
          <label><span><md-icon md-font-icon="material-icons">short_text</md-icon></span>SHORT DESCRIPTION</label>
          <textarea required name="shortdesctext" ng-model="shortdesctext" ng-value="shortdesctext" md-maxlength="250" rows="1" md-select-on-focus ng-keyup="shortkeySubmit()" ng-disabled="distoggle"></textarea>
        </md-input-container>
        </form>
    </div>
  </div>
  <div class="descinput">
    <label><span><md-icon md-font-icon="material-icons">subject</md-icon></span>STORY DESCRIPTION</label>
  	<div class="articledescription">    	
    </div>
  </div>
  
  
  <div class="storymediacontainer" flex>
  <!--Dynamic Media Boxes -->
  <div class="md-block storymedia" ng-repeat="m in media" flex="95" layout="column" layout-xs="column">
 
    <div class="storymediadetails" >
    <md-button aria-label="Delete image" class="md-icon-button deletebtn" ng-click="deleteMedia(m.recid)">
            <md-icon md-font-icon="material-icons" style="margin-left:3px;">delete_sweep</md-icon>
      </md-button>
    <div class="storyimagehold" ng-if="m.medtype == 'image' ">
    <img class="storyimg" id="storyimg" ng-src="http://cdn.helpinghandsgroup.in/{{m.arid}}/{{m.medpath}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg" height="200px" width="300px" alt="Story Media" />
    </div>
    <div class="storyimagehold" ng-if="m.medtype == 'video' ">
    <img class="storyimg" id="storyimg" ng-src="https://img.youtube.com/vi/{{m.medpath}}/0.jpg" height="200px" width="300px" alt="Story Video" />
    </div>
    <div class="storyimagemeta">
         <label><span><md-icon md-font-icon="material-icons">center_focus_weak</md-icon></span><span class="md-caption">Media Caption</span></label><br>
        <div class="storymediacaption" id="{{m.recid}}_caption">{{m.medcapt}}</div><br/>
        <label><span><md-icon md-font-icon="material-icons">link</md-icon></span><span class="md-caption">Media Source</span></label><br>
        <div class="storymediaref" id="{{m.recid}}_source"></div>
    </div>
      
      </div>
      
     <label><span><md-icon md-font-icon="material-icons">short_text</md-icon></span><span class="md-body-2">Media Description</span></label>
     <div class="md-block storymediadesc" id="{{m.recid}}_desc">
    </div>
    
  </div>
 
  <!-- Media Upload Box -->
    <div class="mediauploadbox" layout="row" layout-xs="column">
    
      <div class="imguploadprog" flex="40" layout="column">
      <label><span><md-icon md-font-icon="material-icons">photo</md-icon></span>Image Upload</label><br>
      	<div class"storyimguploadhold">
        	<img class="imgshow" id="imgshow" src="app/users/default.jpg" alt="Image Uploading" />
        	<div class="progressbox" id="progressbox"><div id="progressbar"></div ></div>
        </div>
      </div>
      <div class="imguploadalert" flex="55" layout="column">
        
        <div class="uploadalert md-headline md-padding" layout="row" layout-align="center center">Uploading Image: <div id="statustxt">0%</div ><br/></div>
        <span class="authenticmessage"></span>
      </div>
    </div>    
  </div>
</md-content>




<div class="secondarysection" flex="35" flex-sm="40" flex-xs="100" layout-sm="column" layout-xs="column">
  <div class="categoryinput">
   <md-input-container style="margin-right: 10px;" class="md-block">
        <label>LANGUAGE</label>
          <md-select  ng-model="articlelang" ng-value="articlelang" ng-change="langSelect()" ng-disabled="distoggle">
          	<md-option value="english">ENGLISH -en</md-option>
          	<md-option value="hindi">HINDI -hi</md-option>
          	
     	  </md-select>
          </md-input-container>
          <br/>
  	<md-input-container style="margin-right: 10px;" class="md-block">
        <label><span><md-icon md-font-icon="material-icons">graphic_eq</md-icon></span>CATEGORY</label>
          <md-select  ng-model="articlecat" ng-value="articlecat" ng-change="catSelect()" ng-disabled="distoggle">
          	<md-option value="people">PEOPLE</md-option>
          	<md-option value="creativity">CREATIVITY</md-option>
          	<md-option value="nature">NATURE</md-option>
            <md-option value="health">HEALTH</md-option>
          	<md-option value="inspire">INSPIRE</md-option>
            <md-option value="ideology">IDEOLOGY</md-option>
            <md-option value="literature">LITERATURE</md-option>
          	<md-option value="spiritual">SPIRITUAL</md-option>
          	<md-option value="travel and places">TRAVEL & PLACES</md-option>
            <md-option value="lifestyle">LIFESTYLE</md-option>
          	<md-option value="technology">TECHNOLOGY</md-option>
          	<md-option value="food">FOOD</md-option>
            <md-option value="photography">PHOTOGRAPHY</md-option>
            <md-option value="history">HISTORY</md-option>
            <md-option value="sports">SPORTS</md-option>
            <md-option value="swabhimaan">SWABHIMAAN</md-option>
            <md-option value="green gang">Green Gang</md-option>
            <md-option value="iksha">iKSHA</md-option>            
     	  </md-select>
          </md-input-container>
          
  </div>
  <div class="tagsinput">
  	<label><span><md-icon md-font-icon="material-icons">bookmark_border</md-icon></span> TAGS</label>
     <md-chips
      ng-model="tags"
      placeholder="Enter a tag"
      secondary-placeholder="Press Enter for tag" ng-keyup="chipkeySubmit()" readonly="chipread"></md-chips>
    <br/>
  </div>
  <div class="coverinput md-block">
  <span>Cover Image</span>
  <div class="coveruploadbox">
     <img class="coverimgshow" id="coverimgshow" ng-src="http://cdn.helpinghandsgroup.in/{{aid}}/400/{{coverimghash}}" err-SRC="http://www.helpinghandsgroup.in/images/fallback.jpg" alt="Cover" />        	
            <div id="cvstatustxt">0%</div >        
    </div> 
  
       <form action="app/dataprocess/uploadcoverimg.php"  method="post" enctype="multipart/form-data" id="CoverUploadForm" >
   
    <label for="coverupload" class="md-button md-raised uploadlabel" layout="row" layout-align="center center" ng-disabled="distoggle">
        <span><md-icon md-font-icon="material-icons">art_track</md-icon></span><span>Cover Image</span>
    </label>
    <input type="hidden" name="cvarticid" value="" id="cvarticid" style="display: none;"/>
    <input name="CoverImageFile" type="file" multiple  class="coverupload" id="coverupload" ng-disabled="distoggle" style="display: none;"/>   
    <input type="submit"  id="CoverSubmitButton" value="CoverUpload" style="display: none;"/>
</form>
<div class="cvprogressbox" id="cvprogressbox"><div id="cvprogressbar"></div ></div>
  </div>
  <div class="metainfo">
      <span><md-icon md-font-icon="material-icons">bubble_chart</md-icon></span><span class="md-title"> Story Meta Info</span>
      <br/>
      <div class="dte meta"><span class="md-subhead">Date Created - </span><span class="md-subhead">{{createdate}}</span></div>
      <div class="mediacount meta"><span class="md-subhead">Total Media - </span><span class="md-subhead">{{totalmed}}</span></div>
      <div class="status meta"><span class="md-subhead">Status - </span><span class="md-subhead">{{storystat}}</span></div>
  </div>
  <div class="sluginput">
  <md-content md-theme="docs-dark" layout-gt-sm="row" layout-padding>
  	<md-input-container class="md-block slug">
        <label><span><md-icon md-font-icon="material-icons">drag_handle</md-icon></span><span>Slug</span></label>
        <input ng-model="slug"  ng-value="slug" ng-keyup="slugkeySubmit()">
      </md-input-container>
  </md-content>
  </div>
</div>
</div>


<div id="output"></div>
<div id="cvoutput"></div>

<div class="articlebottombar">
<form action="app/dataprocess/uploadartimg.php"  method="post" enctype="multipart/form-data" id="UploadForm" >
   
    <label for="upload" class="md-button md-raised uploadlabel" layout="row" layout-align="center center" ng-disabled="distoggle">
        <span><md-icon md-font-icon="material-icons">burst_mode</md-icon></span><span>ADD IMAGE</span>
    </label>
    <input type="hidden" name="articid" value="" id="articid" style="display: none;"/>
    <input name="ImageFile" type="file" multiple accept="image/jpeg"  class="upload" id="upload" ng-disabled="distoggle" style="display: none;"/>   
    <input type="submit"  id="SubmitButton" value="Upload" style="display: none;"/>
</form>
<div class="finalizebtns" flex>
<md-button class="md-raised prev-btn" ng-click="addVideo(aid)" ng-disabled="distoggle">ADD VIDEO</md-button>
<span flex></span>
<md-button class="md-raised prev-btn" ng-click="articlePreview(aid);" ng-disabled="distoggle">PREVIEW</md-button>
<md-button class="md-raised prev-btn" ng-click="articleProduce(aid);" ng-disabled="distoggle">PRODUCE</md-button>
</div>
</div>
<span class="saveinfomessage"><span class="svmsgtxt">{{savemsg}}</span></span>
<script>

</script>
    

      


