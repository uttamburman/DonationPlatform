<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74079661-6', 'auto');
  ga('send', 'pageview');

</script>
<div class="donateheader">
	<div class="mmheadimg donationmmheadimg"></div>
	<div class="dntiscover"></div>
	<div class="wwheadertxt cntistxt">DONATE</div>
	<div class="wwhdrtag dntistag">Helping Hands Society</div>
	<div class="wwlinecont ggiscont"><div class="wwhdrline ggline"></div></div>
</div>
<div class="donatechecks">
	<div class="donatecheckbox dcb1">
        <div class="donatecheckcover"></div>
    	<div class="donatechecknumber">01.</div>
        <div class="donatecheckheading">GIVE DONATION</div>
        <div class="donatecheckbrief">We make a living by what we get, but we make a life by what we give.</div>
    </div>
    <div class="donatecheckbox dcb2">
        <div class="donatecheckcover"></div>
    	<div class="donatechecknumber">02.</div>
        <div class="donatecheckheading">BECOME MEMBER</div>
        <div class="donatecheckbrief">You just need to be a frequent visitor in our events, and make yourself and others a helping hand.</div>
    </div>
    <div class="donatecheckbox dcb3">
        <div class="donatecheckcover"></div>
    	<div class="donatechecknumber">03.</div>
        <div class="donatecheckheading">BE THE CHANGE</div>
        <div class="donatecheckbrief">THE WORLD WON’T GET BETTER BY ITSELF. WE MUST SET BIG GOALS AND HOLD OURSELVES ACCOUNTABLE EVERY STEP OF THE WAY.</div>
    </div>
</div>



<div class="achievesection">
	<div class="achievebox">
    	<div class="achieveimg achimg1"></div>
        <div class="achievecount">210</div>
        <div class="achievedesc">iKSHA Children</div>
    </div>
    <div class="achievebox">
    	<div class="achieveimg achimg2"></div>
        <div class="achievecount">2,100</div>
        <div class="achievedesc">Women Aware</div>
    </div>
    <div class="achievebox">
    	<div class="achieveimg achimg3"></div>
        <div class="achievecount">115</div>
        <div class="achievedesc">Blood Donors</div>
    </div>
    <div class="achievebox">
    	<div class="achieveimg achimg4"></div>
        <div class="achievecount">130</div>
        <div class="achievedesc">Lives Saved</div>
    </div>
    <div class="achievebox">
    	<div class="achieveimg achimg5"></div>
        <div class="achievecount">1,200</div>
        <div class="achievedesc">Plants Planted</div>
    </div>
    <div class="achievebox">
    	<div class="achieveimg achimg6"></div>
        <div class="achievecount">70</div>
        <div class="achievedesc">Active Members</div>
    </div>
</div>


<div class="simplepay" ng-controller="donatePageCtrl">
    <div class="simplepayhead">Simply Donate</div>
    <div class="simplepaydescript">just type the amount you want to donate</div>
    <div class="simplepayvalue">
		<form name="simpleform" novalidate >
			<div class="spinp"><span class="spinpsymbol">₹&nbsp;</span><input ng-model="donatevaluex" ng-value="valx" type="text" placeholder="" ng-required="true" minlength="3" ng-readonly="false"/></div>
			<span class="spmsg"></span>
			<div class="spinp"><input type="submit" class="simpaybtn" value="Donate" ng-click="simpleform.$valid && simplePay()" /></div>
		</form>
    </div>
</div>


<div class="donationformsection" ng-controller="donatePageCtrl">
<div class="simplepayhead doptions">Select a Category Instead</div>
<div class="donatevalue"></div>
	<div class="donatebox dbox1">
		<div class="dbwrap"></div>
    	<div class="donatedetailbox ddbox1">
        	<div class="donatedethead">iKSHA</div>
            <div class="donatedetbrief">For Child's Education</div>
            <div class="donatedetcat">Sponsor {{val1cat}} {{childval}}'s education (tuition/+school) for a month </div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus1()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue1" ng-value="val1" type="text" placeholder=" 500" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd1()"/></div>
                <div class="donatemoneymax">max<br>₹500000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData1()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox2"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">iKSHA</div>
            <div class="donatedetbrief">Activities</div>
            <div class="donatedetcat">Sponsor {{val2cat}}(equipments & food)</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus2()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue2" ng-value="val2" type="text" placeholder="1000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd2()"/></div>
                <div class="donatemoneymax">max<br>₹3000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData2()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox3"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">iKSHA</div>
            <div class="donatedetbrief">Festival & Happiness</div>
            <div class="donatedetcat">Sponsor {{val3cat}} Expenditure</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="<" ng-click="valMinus3()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue3" ng-value="val3" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value=">" ng-click="valAdd3()"/></div>
                <div class="donatemoneymax">max<br>₹4000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData3()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox4"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">iKSHA</div>
            <div class="donatedetbrief">Centre Expenditure</div>
            <div class="donatedetcat">Sponsor iKSHA centre's expenditure for {{val4cat}} </div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus4()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue4" ng-value="val4" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd4()"/></div>
                <div class="donatemoneymax">max<br>₹36000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData4()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox5"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">SWABHIMAN</div>
            <div class="donatedetbrief">Women Empowerment</div>
            <div class="donatedetcat">Sponsor SWABHIMAN's{{valswcat}}</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinussw()"/><div class="rupeeicon">₹</div><input ng-model="donatevaluesw" ng-value="valsw" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAddsw()"/></div>
                <div class="donatemoneymax">max<br>₹15000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData5()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox6"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">Green Gang</div>
            <div class="donatedetbrief">Plantation Drive</div>
            <div class="donatedetcat">Sponsor Plantation drive for {{val5cat}}</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus5()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue5" ng-value="val5" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd5()"/></div>
                <div class="donatemoneymax">max<br>₹4000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData6()"/>
    	</div>    	
    </div>
    <div class="donatebox dbox7"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">Blood Heroes</div>
            <div class="donatedetbrief">Blood Test & Donation</div>
            <div class="donatedetcat">Sponsor Blood Test & Donation Expenditure for {{val6cat}} persons</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus6()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue6" ng-value="val6" type="text" placeholder="500" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd6()"/></div>
                <div class="donatemoneymax">max<br>₹10000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData7()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox8"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">Helping Hands</div>
            <div class="donatedetbrief">For Volunteers</div>
            <div class="donatedetcat">Sponsor to Encourage {{val7cat}} Volunteers</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus7()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue7" ng-value="val7" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd7()"/></div>
                <div class="donatemoneymax">max<br>₹4000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData8()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox9"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">Helping Hands</div>
            <div class="donatedetbrief">Promotions</div>
            <div class="donatedetcat">Sponsor Promotional event {{val8cat}}</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus8()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue8" ng-value="val8" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd8()"/></div>
                <div class="donatemoneymax">max<br>₹4000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData9()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox10"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">Blood Heroes/iKSHA</div>
            <div class="donatedetbrief">Health Camp</div>
            <div class="donatedetcat">Sponsor {{val9cat}} by {{val9}}</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus9()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue9" ng-value="val9" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd9()"/></div>
                <div class="donatemoneymax">max<br>₹20000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData10()"/>
    	</div>    	
    </div>
    
    <div class="donatebox dbox11"><div class="dbwrap"></div>
    	<div class="donatedetailbox">
        	<div class="donatedethead">Helping Hands</div>
            <div class="donatedetbrief">Workshops</div>
            <div class="donatedetcat">Sponsor {{val10cat}} by {{val10}}</div>
            <div class="donatemoneyslot">
            	<div class="donatemoneymin"><input type="submit" class="donateplusbtn" value="-" ng-click="valMinus10()"/><div class="rupeeicon">₹</div><input ng-model="donatevalue10" ng-value="val10" type="text" placeholder="4000" ng-required="true" minlength="3" ng-readonly="{{truefalse}}"><input type="submit" class="donateplusbtn" value="+" ng-click="valAdd10()"/></div>
                <div class="donatemoneymax">max<br>₹20000</div>
            </div>
            <input type="submit" class="donatepgformbtn" value="DONATE" ng-click="valData11()"/>
    	</div>    	
    </div>
	<div class="dbbodycover" ng-click="dbCover()"></div>
	<div class="donorbox">
		<div class="dfwrapper">
			<div class="dfhead">Please provide your basic details</div>
			<div class="dformwrap">
				<form action="pay/" method="post" name="personDetails">
					<span class="felement amountinp"><span class="inputname amtinp">₹&nbsp;</span><input type="text" placeholder="1000" value="500" required="true" minlength="3" name="amount" readonly="true" class="finaldonateAmt"></span>
					<span class="felement amountinp categinp"><span class="inputname amtinp catinp">→&nbsp;</span><input type="text" placeholder="" value="Direct Donate" required="true" minlength="3" name="productinfo" class="finaldonateCat" readonly="true"></span>
					<span class="felement amountinp categinp catov"><span class="inputname amtinp catinp catov"></span><input type="text" placeholder="" value="Regular Funds" required="true" minlength="3" name="udf1" class="finaldonateOV" readonly="true"></span>
					<span class="felement"><span class="inputname">Name </span><input type="text" placeholder="" required="true" minlength="3" name="firstname"></span>
					<span class="felement"><span class="inputname">Contact </span><input type="text" placeholder="" required="true" minlength="10" name="phone"></span>
					<span class="felement"><span class="inputname">Email </span><input type="text" placeholder="" required="true" minlength="3" name="email"></span>
					<span class="felement"><span class="inputname">Address </span><input type="text" placeholder="" required="true" minlength="5" name="address1"></span>
					<input type="submit" class="finaldonatebtn" value="Continue" click="donatePost()"/>
				</form>
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
	
	
		$('.donateheader').css({height:ht/1.5,"position":"relative","display":"block","margin":"0px"});
		$('.wwheadertxt').transition({
                    y:80},1000,'snap');		
		$('.wwhdrtag').transition({
                    y:110},1400,'snap');
		$('.wwhdrline').transition({
                    y:110},1500,'snap');
		
		
});
$(window).resize(function() {
	var ht=0;
	var wt=0;
	var divwt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	
	    //$('.wwheader').css({height:ht/1.5,width:wt,"position":"relative","display":"block","margin":"0px"});
		$('.storycontentview').css({height:ht-60,width:"100%","position":"fixed","top":"60px","left":"0%","overflow-y":"scroll","overflow-x":"hidden","background":"white"});

});
</script>

