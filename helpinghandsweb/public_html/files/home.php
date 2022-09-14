<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74079661-6', 'auto');
  ga('send', 'pageview');

</script>
<div class="homeheader">
	<div class="homebackimg"></div>
    <div class="coverbox"><img src="images/brandinga.png" class="brandlogo"/><div class="brandtextname">HELPING HANDS<BR><span class="boldbrandtext">GROUP</span></div><div class="brandstoryline">BE THE CHANGE, RATHER THAN ASKING</div></div>
</div>
<div class="brandmsg">
<p class="brandmsgp1">Promoting Human Equality and Society Empowerment</p>
<span class="brandmsgline"></span>
<p class="brandmsgp2">Our focus on society empowerment unlocks possibility on the individual and communal level.We bring two of our core concepts for future: Promoting Human Equality and Society Empowerment.We have been focussing on personalized learning, Blood Donations, women empowerment, and building strong communities.We believe in long term working model because our greatest challenges require time to solve.</p>
</div>



<div class="initareas">
<p class="initp1">Our Initiatives</p>
<div class="initboxcont">
<div class="initiative">
	<div class="initbox ia1"></div>
	<div class="initinfo">
    	<div class="inithead">iKSHA</div>
    	<div class="initiativesumm">Seeking towards solving the problem over educational inequity to underprivileged children</div>
    </div>
</div>
<div class="initiative"><div class="initbox ia2"></div>
	<div class="initinfo">
    	<div class="inithead">SWABHIMAN</div>
    	<div class="initiativesumm">We see equal value in all lives and so is our motive to enhance living of every women around us</div>
    </div>
</div>
<div class="initiative"><div class="initbox ia3"></div>
	<div class="initinfo">
    	<div class="inithead">BLOOD HEROES</div>
    	<div class="initiativesumm">Focused on the areas of greatest need, blood donation is one way to do good</div>
    </div>
</div>
<div class="initiative"><div class="initbox ia4"></div>
	<div class="initinfo">
    	<div class="inithead">GREEN GANG</div>
    	<div class="initiativesumm">Climate change is real, and this will not get better by itself. We must set big goals and hold ourselves accountable every step of the way</div>
    </div>
</div>
</div>

</div>



<div class="homemsg">
<p class="homemsgp1">THINK GLOBAL. ACT LOCAL</p>
<div class="homemsgpline"></div>
<p class="homemsgp2">THE WORLD WON’T GET BETTER BY ITSELF. <br>WE MUST SET BIG GOALS AND HOLD OURSELVES ACCOUNTABLE<br> EVERY STEP OF THE WAY.</p>
</div>

<div class="videosection">
<div class="videostore" ng-controller="videoStoreCtrl">
<div class="videocard">
<div class="videovid">

<div class="videoemb"></div>
<div class="videocover">
<div class="videoname">Learn to grow Plant</div>
<div class="vidplaybtn">
		<svg class="icon icon-play2"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="images/symbol-defs.svg#icon-play2"></use></svg>
		<span class="vidreeltext">PLAY VIDEO REEL</span>
</div></div></div>
<div class="vidcontent">
<div class="videosumm">Environment change is real, this is one small step for a change</div>
<div class="videohead">Helping Hands Climate Care #greengang</div>
<div class="videodate">20/07/2016</div>
</div>
</div>
</div>
</div>
<script>
$(function() {
var ht=0;
	var wt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	
	if(ht>wt){
		$('.homeheader').css({height:ht/1.8,width:wt});
	}
	else{
		$('.homeheader').css({height:ht,width:wt});
	}
	$('.brandstoryline').transition({ opacity: 1,duration: 200 });
	$('.brandstoryline').transition({
                    y:-100},800,'snap');
	
	$('.videocover').click(function(){
		 $('.videocover').transition({
                    x:-1000},100,'snap');
		 $('.videoemb').html('<iframe class="iframevideo" src="https://www.youtube.com/embed/KV-ij6EF5YQ" frameborder="0" allowfullscreen></iframe>');
		$('.iframevideo').css({position:relative,	display:block,	float:left,	height:"70%",	width:"100%",	"margin-top":"10%",	"margin-left":"0px"});
	 });
	
});
 $(window).resize(function() {
	var ht=0;
	var wt=0;
	var divwt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	if(ht>wt){
	}
	else{
		$('.homeheader').css({height:ht,width:wt});
	}
 });
</script>

<!--{{ message }}-->
