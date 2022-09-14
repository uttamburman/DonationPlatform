

$(function() {
	var mpos=0;
	var ah1=0;
	var ah2=0;
	var ah3=0;
	var ah4=0;
	 var ht=0;
	var wt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	$('body').css({width:wt});
	
	
	
	
	
	$('.ancx1').click(function(){
		if(ah1==0){
			$('.anchold1').css({height:"320px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex1').transition({ rotate: '45deg' });	
			
			ah1=1;
		}
		else if(ah1==1){
			$('.anchold1').css({height:"55px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex1').transition({ rotate: '0deg' });	
			ah1=0;
		}
	});
	$('.ancx2').click(function(){
		if(ah2==0){
			$('.anchold2').css({height:"180px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex2').transition({ rotate: '45deg' });	
			
			ah2=1;
		}
		else if(ah2==1){
			$('.anchold2').css({height:"55px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex2').transition({ rotate: '0deg' });	
			ah2=0;
		}
	});
	$('.ancx3').click(function(){
		if(ah3==0){
			$('.anchold3').css({height:"320px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex3').transition({ rotate: '45deg' });				
			ah3=1;
		}
		else if(ah3==1){
			$('.anchold3').css({height:"55px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex3').transition({ rotate: '0deg' });	
			ah3=0;
		}
	});
	$('.ancx4').click(function(){
		if(ah4==0){
			$('.anchold4').css({height:"260px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex4').transition({ rotate: '45deg' });			
			ah4=1;
		}
		else if(ah4==1){
			$('.anchold4').css({height:"55px",transition: 'height 0.5s ease-in-out', position:'relative',"display":"block",width:320,"overflow":"hidden",'margin-top':10});
			$('.mex4').transition({ rotate: '0deg' });
			ah4=0;
		}
	});
	
	$('.menubutton').click(function(){
	      var wt=window.innerWidth;
		  var menuwidth= $( ".menu" ).width();		
		  if(mpos==0){
			  mpos=1;
			  $('.menu').transition({
                    x:-menuwidth},400,'snap');
			  $( ".menuicon" ).html( "<i class=\"material-icons\">clear</i>" );
			  $('.menubutton').transition({ rotate: '90deg' });			  
			  $('.menutxt').text('');
		  }
		  else if(mpos==1){
			  mpos=0;
			  $('.menu').transition({
                    x:menuwidth},400,'snap');
			  $( ".menuicon" ).html( "<i class=\"material-icons\">view_headline</i>" );
			  $('.menubutton').transition({ rotate: '0deg' });
			   $('.menutxt').text('MENU');
		  } 
	 });
	 var elements = document.getElementsByTagName('a');
for(var i = 0, len = elements.length; i < len; i++) {
    elements[i].onclick = function () {
        $('html, body').animate({scrollTop : 0},200);
		mpos=0;
			  $('.menu').transition({
                    x:0},400,'snap');
			  $( ".menuicon" ).html( "<i class=\"material-icons\">view_headline</i>" );
			  $('.menubutton').transition({ rotate: '0deg' });
			   $('.menutxt').text('MENU');
		
    }
}
	 
});

 $(function() {
	 var ht=0;
	var wt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	
	
	
	$(window).scroll(function() {
	var ht=0;;
	var wt=0;
	ht=window.innerHeight;
	wt=window.innerWidth;
	var pos=0;
	pos=window.scrollY;
	$('.spos').text("");
	var dpos=ht-500; 
	 
	if(pos>=180){
		$('.topbar').css({width:wt,height:60,"background-color": "white",transition: 'height 0.5s ease-in-out,background-color 0.5s ease-in-out',"border-style":"solid","border-color":"#E54447","border-width":"0px 0px 1px 0px", position:'fixed'});
		$('.seclogo').css({height:60,width:200,"background-color": "#E54447",transition: 'top 0.5s ease-in-out', position:'absolute',left:0,top:0,"padding-left":50});
	}
	else{
		$('.topbar').css({width:wt,height:150,"background-color": "transparent",transition: 'height 0.5s ease-in-out,background-color 0.5s ease-in-out',"border-style":"solid","border-color":"transparent","border-width":"0px 0px 0px 0px", position:'fixed'});
		$('.seclogo').css({height:60,width:200,"background-color": "#E54447",transition: 'top 0.5s ease-in-out', position:'absolute',left:0,top:-100,"padding-left":50});
	}
});	

 });
 
 
 