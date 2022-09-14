<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74079661-6', 'auto');
  ga('send', 'pageview');

</script>
<div class="wwheader">
<div class="wwhdrsmall">Meet Our</div>
<div class="wwheadertxt">Team</div>
<div class="wwhdrtag">A Team of Students, Professionals, & Businessmen</div>
<div class="wwlinecont"><div class="wwhdrline"></div></div>
</div>
<div class="profilecontain">
<section class="container">
<div class="row active-with-click profilerow">
<div class="roleheader">President</div>
<div class="col-md-4 col-sm-6 col-xs-12" ng-repeat='p in primeprofile'>
            <article class="material-card {{p.theme}}">
                <h2>
                    <span class="profilename">{{p.name}}</span>
                    <strong ng-if="p.posit == 'chief'">
                        <i class="fa fa-fw fa-star"></i>
                        The Prime
                    </strong>
                    <strong ng-if="p.posit == 'lead'">
                        <i class="fa fa-fw fa-star"></i>
                        The Chief
                    </strong>
                    <strong ng-if="p.posit == 'cord'">
                        <i class="fa fa-fw fa-star"></i>
                        Collaborator
                    </strong>
                    <strong ng-if="p.posit == 'volun'">
                        <i class="fa fa-fw fa-star"></i>
                        Member
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive colorize" ng-src="http://www.helpinghandsgroup.in/members/users/{{p.id}}/{{p.prof}}" err-SRC="http://www.helpinghandsgroup.in/images/1.jpg">
                    </div>
                    <div class="mc-description roletext">
                        {{p.introd}}
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <h4>
                        Social
                    </h4>
                    <a class="fa fa-fw fa-facebook" href="{{p.fb}}" target='_blank' ng-if="p.fb != ''"></a>                    
                    <a class="fa fa-fw fa-twitter" href="{{p.tw}}" target='_blank' ng-if="p.tw != ''"></a>
                    <a class="fa fa-fw fa-linkedin" href="{{p.ln}}" target='_blank' ng-if="p.ln != ''"></a>
                    <a class="fa fa-fw fa-google-plus" href="{{p.gp}}" target='_blank' ng-if="p.gp != ''"></a>
                </div>
            </article>
        </div>
</div>
<div class="row active-with-click profilerow">
<div class="roleheader">Chiefs</div>
    <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat='l in leadprofile'>
            <article class="material-card {{l.theme}}">
                <h2>
                    <span class="profilename">{{l.name}}</span>
                    
                    <strong ng-if="l.posit == 'lead'">
                        <i class="fa fa-fw fa-star"></i>
                        The Chief
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive colorize" ng-src="http://www.helpinghandsgroup.in/members/users/{{l.id}}/{{l.prof}}" err-SRC="http://www.helpinghandsgroup.in/images/2.jpg">
                    </div>
                    <div class="mc-description roletext">
                        {{l.introd}}
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <h4>
                        Social
                    </h4>
                    <a class="fa fa-fw fa-facebook" href="{{l.fb}}" target='_blank' ng-if="l.fb != ''"></a>                    
                    <a class="fa fa-fw fa-twitter" href="{{l.tw}}" target='_blank' ng-if="l.tw != ''"></a>
                    <a class="fa fa-fw fa-linkedin" href="{{l.ln}}" target='_blank' ng-if="l.ln != ''"></a>
                    <a class="fa fa-fw fa-google-plus" href="{{l.gp}}" target='_blank' ng-if="l.gp != ''"></a>
                </div>
            </article>
        </div>
</div>
<div class="row active-with-click profilerow">
<div class="roleheader">Collaborators</div>
    <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat='c in memberprofile'>
            <article class="material-card {{c.theme}}">
                <h2>
                    <span class="profilename">{{c.name}}</span>
                    
                    <strong ng-if="c.posit == 'cord'">
                        <i class="fa fa-fw fa-star"></i>
                        Collaborator
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive colorize" ng-src="http://www.helpinghandsgroup.in/members/users/{{c.id}}/{{c.prof}}" err-SRC="http://www.helpinghandsgroup.in/images/3.jpg">
                    </div>
                    <div class="mc-description roletext">
                        {{c.introd}}
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <h4>
                        Social
                    </h4>
                    <a class="fa fa-fw fa-facebook" href="{{c.fb}}" target='_blank' ng-if="c.fb != ''"></a>                    
                    <a class="fa fa-fw fa-twitter" href="{{c.tw}}" target='_blank' ng-if="c.tw != ''"></a>
                    <a class="fa fa-fw fa-linkedin" href="{{c.ln}}" target='_blank' ng-if="c.ln != ''"></a>
                    <a class="fa fa-fw fa-google-plus" href="{{c.gp}}" target='_blank' ng-if="c.gp != ''"></a>
                </div>
            </article>
        </div>
</div>
<div class="row active-with-click profilerow">
<div class="roleheader">Members</div>
    <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat='m in volunprofile'>
            <article class="material-card {{m.theme}}">
                <h2>
                    <span class="profilename">{{m.name}}</span>
                    
                    <strong ng-if="m.posit == 'volun'">
                        <i class="fa fa-fw fa-star"></i>
                        Member
                    </strong>
                </h2>
                <div class="mc-content">
                    <div class="img-container">
                        <img class="img-responsive colorize" ng-src="http://www.helpinghandsgroup.in/members/users/{{m.id}}/{{m.prof}}" err-SRC="http://www.helpinghandsgroup.in/images/4.jpg">
                    </div>
                    <div class="mc-description roletext">
                        {{m.introd}}
                    </div>
                </div>
                <a class="mc-btn-action">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="mc-footer">
                    <h4>
                        Social
                    </h4>
                    <a class="fa fa-fw fa-facebook" href="{{m.fb}}" target='_blank' ng-if="m.fb != ''"></a>                    
                    <a class="fa fa-fw fa-twitter" href="{{m.tw}}" target='_blank' ng-if="m.tw != ''"></a>
                    <a class="fa fa-fw fa-linkedin" href="{{m.ln}}" target='_blank' ng-if="m.ln != ''"></a>
                    <a class="fa fa-fw fa-google-plus" href="{{m.gp}}" target='_blank' ng-if="m.gp != ''"></a>
                </div>
            </article>
        </div>
</div>
</section>
</div>
<div class="fillbar"><div class="seclogot2"><div class="secimg"></div><div class="seclogotxt">HELPING HANDS<BR><span class="secboldtext">GROUP</span></div></div></div>




<script>

$(function() {
	
var ht=0;
	var wt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
		$('.wwheader').css({height:ht/1.2,width:wt,"position":"relative","display":"block","margin":"0px"});
		$('.wwheadertxt').transition({
                    y:150},1000,'snap');
		$('.wwhdrsmall').transition({
                    y:150},1000,'snap');
		$('.wwhdrtag').transition({
                    y:180},1400,'snap');
		$('.wwhdrline').transition({
                    y:180},1500,'snap');
	 
});
$(window).resize(function() {
	var ht=0;
	var wt=0;
	var divwt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	
		$('.wwheader').css({height:ht/1.2,width:wt,"position":"relative","display":"block","margin":"0px"});
 });
 
</script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link rel="stylesheet" href="stylesheets/material-cards.css">
<style>
  .menuicon{
	  position:absolute !important;
	  left:7px;
	  top:7px;
  }
  .anchor{
	  height:50px !important;
  }
  .container{
	  float:none !important;
	  margin-left:auto;
	  margin-right:auto ;
  }
  .profilename{
	  font-family: 'Raleway';
	  text-transform:capitalize;
	  font-weight:100;
  }
  .roletext , .mc-description{
	  font-family: 'Roboto', sans-serif;
	  font-weight:300 !important;
	  word-spacing:3px;
	  line-height:20px;
	  font-size:15px;
  }
  .roleheader{
	  position:relative;
	  font-family: 'Raleway';
	  text-transform:capitalize;
	  font-weight:300;
	  color:#363636;
	  font-size:28px;
	  width:100%;
	  display:block !important;
	  float:none;	  
	  margin-bottom:10px;
	  text-align:left;
  }
</style>