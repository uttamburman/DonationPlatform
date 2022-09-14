<div class="navwrap">
<div class="toplinks">
<div class="toplinkswrap">
  <div class="topmenu" ng-controller='topmenuController'>
  	<select ng-change="languageSelect()" ng-model="weblang" ng-value="weblang">
    	<option value="english">English</option>
        <option value="hindi">Hindi</option>
    </select>
    <span class="toplink">About</span>
    <span class="toplink">Contact</span>
    <span class="toplink">Submit Content</span>
    <span class="toplink">Work</span>
  </div>
  <div class="socialwrap">
    <i class="fa fa-facebook socialicon"></i>
    <i class="fa fa-google-plus socialicon"></i>
    <i class="fa fa-twitter socialicon"></i>
    <i class="fa fa-youtube socialicon"></i>    
  </div>
  </div>
  </div>
  <div class="top">
    <div class="menubutton"></div>
    <div class="logohold"></div>
    <div class="unit1"></div>
  </div>
  
</div>
<div class="navwrap catwrap">
<div class="catmenu" >
    <a href="http://www.helpinghandsgroup.in/fusionsaga/"><span class="catmenuitem cat1">HOME</span></a>
    <div class="catmenuitem cat2" ng-mouseover="entmenuData()">
    	<span>ENTERTAINMENT</span><i class="fa fa-angle-down" aria-hidden="true"></i>
    	
    </div>
    <div class="catmenuitem cat3">META THOUGHTS<i class="fa fa-angle-down" aria-hidden="true"></i></div>
    <div class="catmenuitem cat4">VIDEO<i class="fa fa-angle-down" aria-hidden="true"></i></div>
    <div class="cat-block-menu cb2-block" ng-controller='menublock1Controller'>
          <div class="popularboxrow menuboxrow">
    	<div class="storybox menustorybox" ng-repeat='item in media'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{item.arid}}/{{item.slug}}" >
        <div class="boximgwrap">
    <img ng-src="http://cdn.helpinghandsgroup.in/{{item.arid}}/400/{{item.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="boximg" alt="{{item.title}}">
    <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="item.storytype == 'video'"></i></div>
    </div>
            <div class="storytxt menustorytxt">{{item.title}}</div>
            </a>
        </div>
        </div>
    	<div class="pagebutton pbprev" ng-click="prevPage()"><i class="fa fa-angle-left"></i></div>
        <div class="pagebutton pbnext" ng-click="nextPage()"><i class="fa fa-angle-right"></i></div>
  </div>
  <div class="cat-block-menu cb3-block" ng-controller='menublock2Controller'>
         <div class="popularboxrow menuboxrow">
    	<div class="storybox menustorybox" ng-repeat='item in media'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{item.arid}}/{{item.slug}}" >
        <div class="boximgwrap">
    <img ng-src="http://cdn.helpinghandsgroup.in/{{item.arid}}/400/{{item.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="boximg" alt="{{item.title}}">
    <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="item.storytype == 'video'"></i></div>
    </div>
            <div class="storytxt menustorytxt">{{item.title}}</div>
            </a>
        </div>
        </div>
    	<div class="pagebutton pbprev" ng-click="prevPage()"><i class="fa fa-angle-left"></i></div>
        <div class="pagebutton pbnext" ng-click="nextPage()"><i class="fa fa-angle-right"></i></div>
    </div>
  <div class="cat-block-menu cb4-block" ng-controller='menublock3Controller'>
          <div class="popularboxrow menuboxrow">
    	<div class="storybox menustorybox" ng-repeat='item in media'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{item.arid}}/{{item.slug}}" >
        <div class="boximgwrap">
    <img ng-src="http://cdn.helpinghandsgroup.in/{{item.arid}}/400/{{item.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="boximg" alt="{{item.title}}">
    <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="item.storytype == 'video'"></i></div>
    </div>
            <div class="storytxt menustorytxt">{{item.title}}</div>
            </a>
        </div>
        </div>
    	<div class="pagebutton pbprev" ng-click="prevPage()"><i class="fa fa-angle-left"></i></div>
        <div class="pagebutton pbnext" ng-click="nextPage()"><i class="fa fa-angle-right"></i></div>
    </div>
</div>
</div>