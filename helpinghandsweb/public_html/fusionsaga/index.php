<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FusionSaga - Stories tailored for you</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="../fusionsaga/assets/ng-infinite-scroll.min.js"></script>
<script src="../fusionsaga/assets/jquery.sticky-kit.min.js"></script>
<script src="../fusionsaga/assets/scripting.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
<link href="../fusionsaga/assets/cascade.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css" rel="stylesheet">

</head>

<body ng-app='orgApp'>
<?php
include ('../fusionsaga/navigate.php');
?>
<div class="legendwrap" ng-controller='legendCtrl'>
<div class="legend" ng-repeat='l in legend'>
	<a href="http://www.helpinghandsgroup.in/fusionsaga/{{l.arid}}/{{l.slug}}" >
	<img ng-src="http://cdn.helpinghandsgroup.in/{{l.arid}}/{{l.covimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="legendimage" alt="{{l.title}}">
    <div class="legenditemwrap">
    <i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="l.storytype == 'video'"></i>
    <span class="legendtitle">{{l.title}}</span>
    </div>
    </a>
</div>
</div>
<div class="epwrap" ng-controller='editorCtrl'>
  <div class="epwrapctr">
    <div class="epblock"><span class="epicon"></span><span class="epblocktxt">EDITORS' <br/>PICKS&nbsp;&nbsp;</span>
      
    </div>
    <div class="epslideblock">
      <div class="swiper-container editorswipercontainer">
        <div class="swiper-wrapper editorswiperwrapper"></div>
        <div class="swiper-button-next swiper-button-white editornext"></div>
      </div>
    </div>
  </div>
</div>
<div class="bigpopularwrap" ng-controller='popbigCtrl'>
	<div class="pbigbox" ng-repeat='bp in bigpop'>
    <a href="http://www.helpinghandsgroup.in/fusionsaga/{{bp.arid}}/{{bp.slug}}" >
    	<div class="bigpopimgwrap">
    		<img ng-src="http://cdn.helpinghandsgroup.in/{{bp.arid}}/{{bp.covimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="bigpopimage" alt="{{bp.title}}">
            <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="bp.storytype == 'video'"></i></div>
        </div>
        <div class="bigpoptxtwrap">
        	<span class="bigpoptitle">{{bp.title}}</span>
        </div>
        </a>
    </div>
</div>
<div class="popularwrap" ng-controller='popCtrl'>
  <div class="popular">
  <div class="popularboxrow">
    <div class="storybox" ng-repeat='p in popular'>
    <a href="http://www.helpinghandsgroup.in/fusionsaga/{{p.arid}}/{{p.slug}}" >
    <div class="boximgwrap">
    <img ng-src="http://cdn.helpinghandsgroup.in/{{p.arid}}/400/{{p.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="boximg" alt="{{p.title}}">
    <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="bp.storytype == 'video'"></i></div>
    </div>
    <div class="storytxt">{{p.title}}</div>
    </a>
    </div>
    </div>
  </div>
</div>
<div class="latestbigwrap" ng-controller='latestbigCtrl'>
	<div class="latestbig">
    	<div class="lbbox" ng-repeat='lb in latbig'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{lb.arid}}/{{lb.slug}}" >
        	<img ng-src="http://cdn.helpinghandsgroup.in/{{lb.arid}}/400/{{lb.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="latestbigimg" alt="{{lb.title}}">
            <div class="latbigitemwrap">
            <i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="lb.storytype == 'video'"></i>
            <div class="latbigtitle">{{lb.title}}</div>
            
        </div>
        </a>
        </div>
    </div>
</div>
<div class="latestwrap" ng-controller='latestCtrl'>
	<div class="latest">
    <div class="popularboxrow">
    	<div class="storybox" ng-repeat='l in lat'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{l.arid}}/{{l.slug}}" >
        <div class="boximgwrap">
    <img ng-src="http://cdn.helpinghandsgroup.in/{{l.arid}}/400/{{l.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="boximg" alt="{{l.title}}">
    <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="l.storytype == 'video'"></i></div>
    </div>
            <div class="storytxt">{{l.title}}</div>
            </a>
        </div>
        </div>
    </div>
</div>
<div class="legendwrap bigvideowrap" ng-controller='bigvideoCtrl'>
	<div class="legend" ng-repeat='bv in bigvid'>
	<a href="http://www.helpinghandsgroup.in/fusionsaga/{{bv.arid}}/{{bv.slug}}" >
	<img ng-src="http://cdn.helpinghandsgroup.in/{{bv.arid}}/{{bv.covimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="legendimage" alt="{{bv.title}}">
    <div class="legenditemwrap">
    <i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="bv.storytype == 'video'"></i>
    <span class="legendtitle">{{bv.title}}</span>
    </div>
    </a>
</div>
</div>
<div class="videowrap" ng-controller='videoCtrl'>
	<div class="video">
    <div class="popularboxrow">
    	<div class="smallbox videobox" ng-repeat='v in vid'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{v.arid}}/{{v.slug}}" >
        <div class="videoboxwrap">
        <img ng-src="http://cdn.helpinghandsgroup.in/{{v.arid}}/400/{{v.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="smallimg" alt="{{v.title}}">
        <div class="bigpopimgcover smallvideocover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ></i></div>
        </div>
        <div class="smalltxt">{{v.title}}</div>
        </a>
        </div>
        </div>
    </div>
</div>
<div class="bigchewwrap" ng-controller='bigchewCtrl'>
	<div class="bigchewholder">
	<div class="swiper-container bigchswipercontainer">
        <div class="swiper-wrapper bigchswiperwrapper"></div>
        <div class="swiper-button-prev swiper-button-white bigchprev"></div>
        <div class="swiper-button-next swiper-button-white bigchnext"></div>
      </div>
      </div>
</div>

<div class="chewwrap" >
<div class="latest">
<div class="popularboxrow">
	<div class="mediumchew" ng-controller='mediumchewCtrl' >
    <div class="mediumchewbox" ng-repeat='mc in mediumchew'>
    <a href="http://www.helpinghandsgroup.in/fusionsaga/{{mc.arid}}/{{mc.slug}}" >
    <img ng-src="http://cdn.helpinghandsgroup.in/{{mc.arid}}/{{mc.covimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="mediumimg" alt="{{mc.title}}">
        <div class="legenditemwrap">
    <i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="mc.storytype == 'video'"></i>
    <span class="latbigtitle">{{mc.title}}</span>
    </div>
        </a>
        </div>
    </div>
    <div class="chew"  ng-controller='chewCtrl'>
    	<div class="smallbox videobox smallchewbox" ng-repeat='c in chew'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{c.arid}}/{{c.slug}}" >
        <div class="videoboxwrap">
        <img ng-src="http://cdn.helpinghandsgroup.in/{{c.arid}}/400/{{c.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="smallimg" alt="{{c.title}}">
        <div class="bigpopimgcover smallvideocover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="c.storytype == 'video'"></i></div>
        </div>
        <div class="smalltxt">{{c.title}}</div>
        </a>
        </div>
    </div>
    </div>
    </div>
</div>


<div class="latestwrap" ng-controller='scrollCtrl'>
   <div class="loader" infinite-scroll='story.nextPage()' infinite-scroll-disabled='story.busy' infinite-scroll-distance='1'>
    <div class="latest">
    <div class="popularboxrow">
    	<div class="storybox" ng-repeat='item in story.items'>
        <a href="http://www.helpinghandsgroup.in/fusionsaga/{{item.arid}}/{{item.slug}}" >
        <div class="boximgwrap">
    <img ng-src="http://cdn.helpinghandsgroup.in/{{item.arid}}/400/{{item.thumbimg}}" err-SRC="http://www.helpinghandsgroup.in/images/nocover.jpg" class="boximg" alt="{{item.title}}">
    <div class="bigpopimgcover"><i class="fa fa-play-circle-o videolink legendvideo" style="font-size:24px" ng-if="item.storytype == 'video'"></i></div>
    </div>
            <div class="storytxt">{{item.title}}</div>
            </a>
        </div>
        </div>
    </div>
    <div class="infloads" ng-show='story.busy'>...</div>
  </div>
</div>
</body>
</html>