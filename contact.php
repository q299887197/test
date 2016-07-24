<?php

if (isset($_COOKIE["userName"])){
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }

switch($_POST['address']){
        		case '1' :
        			$activeAll = active; 
        			break;
        		case '2' :
        			$activeAll = active; 
        			break;
        		case '3' :
        			$activeAll = active; 
        			break;
        		case '4' :
        			$activeAll = active; 
        			break;
        		case '5' :
        			$activeAll = active; 
        			break;
        		case '6' :
        			$activeAll = active; 
        			break;
        		case '7' :
        			$activeAll = active; 
        			break;
        		default :
        			$activeAll = active; 
        			
        	}
	 
	
?>

<?php function maps($x,$y,$addName,$adderss){ ?> <!-- googleMap使用 -->
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<div style='color:black;overflow:hidden;height:440px;width:700px;'>
    <div id='gmap_canvas' style='height:400px;width:550px;'></div>
<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>
<script type='text/javascript'>

var x ="<?php echo $x?>" ; //賦值x = $x
var y ="<?php echo $y?>" ; //賦值y = $y
var addName ="<?php echo $addName?>" ; //賦值
var adderss ="<?php echo $adderss?>" ; //賦值
function init_map(x,y,addName,adderss)
{   
    var myOptions = {zoom:16,center:new google.maps.LatLng(x,y),mapTypeId: google.maps.MapTypeId.ROADMAP};
map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(x,y)});
infowindow = new google.maps.InfoWindow({content:'<strong>'+addName+'</strong><br>'+adderss+'<br>'});
google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', init_map(x,y,addName,adderss));
</script>
<?php } ?>   <!-- googleMap結束 --> 





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company-HTML Bootstrap theme</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.php"><h1><span>Com</span>pany</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.php">首頁</a></li>
								<li role="presentation"><a href="about.php">關於我們</a></li>
								<li role="presentation"><a href="rentalCar.php">租車</a></li>								
								<li role="presentation"><a href="contact.php" class="active">服務據點</a></li>
								<li role="presentation"><a href="blog.php">會員專區</a></li>
								<?php if ($sUserName == "Guest"): ?>
								<li role="presentation"><a href="member.php">會員登入</a></li>
								<?php else: ?>
								<li role="presentation"><a href="member.php?logout=1"><?php echo $sUserName ?>_登出</a></li>
								<?php endif; ?>							
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.html">Home</a></li>
				<li>服務據點</li>			
			</div>		
		</div>	
	</div>

	<section id="contact">	
    <br>
    	<div class="row">
            <div class="col-md-2" >
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="1">
                             <input class="btn btn-default <?php if($_POST['address']=='1')echo $activeAll ?>" type="submit" name="SB" value="台北三重站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="2">
                             <input class="btn btn-default <?php if($_POST['address']=='2')echo $activeAll ?>" type="submit" name="SB" value="台北車站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="3">
                             <input class="btn btn-default <?php if($_POST['address']=='3')echo $activeAll ?>" type="submit" name="SB" value="台中車站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="4">
                             <input class="btn btn-default <?php if($_POST['address']=='4')echo $activeAll ?>" type="submit" name="SB" value="台中河南站"></form>
            </div>
            <div class="col-md-2" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-2" >
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="5">
                             <input class="btn btn-default <?php if($_POST['address']=='5')echo $activeAll ?>" type="submit" name="SB" value="台中朝馬站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="6">
                             <input class="btn btn-default <?php if($_POST['address']=='6')echo $activeAll ?>" type="submit" name="SB" value="台南安平站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="7">
                             <input class="btn btn-default <?php if($_POST['address']=='7')echo $activeAll ?>" type="submit" name="SB" value="台南車站"></form>
            </div>
            <div class="col-md-2" >
                 <form action="contact.php" method="post"><input type="hidden" name="address" value="8">
                             <input class="btn btn-default <?php if($_POST['address']=='8')echo $activeAll ?>" type="submit" name="SB" value="高雄三多站"></form>
            </div>
            <div class="col-md-2" >
            </div>
        </div>
        
        <?php 
        	switch($_POST['address']){
        		case '1' :
        			googleMaps(25.0786476,121.49284940000007,台北三重站,新北市三重區仁愛街323號);
        			break;
        		case '2' :
        			googleMaps(25.0450613,121.52628529999993,台北車站,臺北市中正區忠孝西路1段49號);
        			break;
        		case '3' :
        			googleMaps(24.1450049,120.676559,台中車站,台中市中區台灣大道一段1號);
        			break;
        		case '4' :
        			googleMaps(24.1631079,120.63786619999996,台中河南站,台中市西屯區市政北二路238號);
        			break;
        		case '5' :
        			googleMaps(24.1674477,120.63781829999994,台中朝馬站,台中市西屯區朝富路22號);
        			break;
        		case '6' :
        			googleMaps(23.00155,120.16090600000007,台南安平站,台南市安平區國勝路82號);
        			break;
        		case '7' :
        			googleMaps(22.9971367,120.21294979999993,台南火車站,臺南市東區北門路二段4號);
        			break;
        		case '8' :
        			googleMaps(22.6352056,120.28738610000005,高雄三多站,高雄市三民區建國320號);
        			break;
        		default :
        			googleMaps(24.1631079,120.63786619999996,台中河南站,台中市西屯區市政北二路238號);
        	}
        ?>
        
        <?php function googleMaps($mapX=24.1631079,$mapY=120.63786619999996,$addressName=台中河南站,$Name=台中市西屯區市政北二路238號){ ?>
				<div class="container" align="center">
				    <div class="overlay">
		                <div class="recent-work-inner">
		            <h3><a href="#"><?php if($_POST['address']) echo $addressName ;  else echo "台中河南旗艦店"?></a></h3>
		            <?php echo maps($mapX,$mapY,$addressName,$Name); ?> 
		                    <h3><a href="#">Business theme</a></h3>
		                    
		                </div> 
		            </div>
		
		        </div>
		<?php } ?>
		
    </section><!--/#contact-item-->
    
<!--25.0786476,121.49284940000007  三重站-->
<!--25.0450613,121.52628529999993 台北車站-->
<!--24.1450049,120.676559  台中車站-->
<!--24.1631079,120.63786619999996 河南站中又集團	-->
<!--24.1674477,120.63781829999994  台中朝馬站-->
<!--23.00155,120.16090600000007  台南安平站-->
<!--22.9971367,120.21294979999993  台南車站-->
<!--22.6352056,120.28738610000005  高雄三多站-->





	<footer>
		<div class="footer">
			<div class="container">
				<div class="social-icon">
					<div class="col-md-4">
						<ul class="social-network">
							<li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
						</ul>	
					</div>
				</div>
				
				<div class="col-md-4 col-md-offset-4">
					<div class="copyright">
						&copy; June  2015 by <a target="_blank" href="http://bootstraptaste.com/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Bootstrap Themes</a>. All Rights Reserved.
					</div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Company
                    -->
				</div>						
			</div>
			<div class="pull-right">
				<a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
			</div>
		</div>
	</footer>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
  </body>
</html>e.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
  </body>
</html>