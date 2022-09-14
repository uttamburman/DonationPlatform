<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script   src="https://code.jquery.com/jquery-1.11.0.js" integrity="sha256-zgND4db0iXaO7v4CLBIYHGoIIudWI5hRMQrPB20j0Qw="   crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/jquery.sticky-kit/1.1.2/jquery.sticky-kit.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="../../fusionsaga/assets/ng-infinite-scroll.min.js"></script>
<script src="../../fusionsaga/assets/scripting.js"></script>
<link href="../fusionsaga/assets/cascade.css" rel="stylesheet">
<script>
<?php
$val=$_REQUEST['story'];

?>
$(function () {
	var id="<?php echo $val;?>";
	//angular.element(document.getElementById('storywrap')).scope().someFunction(id);
//	angular.element(document.getElementById('mediumcuratewrap')).scope().someFunction(id);
//	angular.element(document.getElementById('curatewrap')).scope().someFunction(id);

	
});

</script>

</head>

<style>
* {
    color: #333;
    box-sizing: border-box;
}

.wrapper, .main, .footer {
    padding: 0px;
    position: relative;
}
.wrapper {
    background-color: #f5f5f5;
    padding: 0px;
	width:100%;
	margin:0px;
	
}
.cover {
    background-color: #6289AE;
    margin-bottom: 10px;
    height: 100px;
}
.sidebar {
    position: relative;
	display:block;
    padding: 10px;
    background-color: #ccc;
    height: 1200px;
    width: 324px;
    float: left;
	padding-left:24px;
	padding-right:24px;
}
.main {
    background-color: #ccc;
    height: 1800px;
    margin-left: 0px;
	float:left;
	width:696px;
	background-color:#E75D5F;
	padding-left:24px;
	padding-right:24px;
	
}
.footer {
    background-color: #6289AE;
    margin-top: 10px;
    height: 250px;
}

.bottom {
    position: absolute;
    bottom: 10px;
}
.clear {
    clear: both;
    float: none;
}
.content{
	position:relative;
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:1116px;
}
</style>
<body ng-app='orgApp'>
<?php
include ('../fusionsaga/navigate.php');
?>
<div class="wrapper">
    <div class="cover"> <a class="top">header top</a>
 		<a class="bottom">header bottom</a>
    </div>
    <div class="content" ng-controller='contentController'>
        
        <div class="main"> <a class="top">main top</a>
 			<a class="bottom">main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom main bottom </a>
        </div>
        <div class="sidebar"> <a class="top">sidebar top</a>
 			<a class="bottom">sidebar bottom</a>
        </div>
        <div class="clear"></div>
        
    </div>
    <div class="footer"> <a class="top">footer top</a>
 		<a class="bottom">footer bottom</a>
    </div>
</div>

</body>
<script>
$(document).ready(function(){
	$(".sidebar").stick_in_parent({
    offset_top: 0
	});	
	$('.sidebar')
	.on('sticky_kit:bottom', function(e) {
		$(this).parent().css('position', 'static');
	})
	.on('sticky_kit:unbottom', function(e) {
		$(this).parent().css('position', 'relative');
	})
});
</script>
</html>


