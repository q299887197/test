<?php

if (isset($_COOKIE["userName"])){
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }


	 

?>


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
							<a href="index.php"><h1><span>德順</span>租車</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.php">首頁</a></li>
								<li role="presentation"><a href="about.php">關於我們</a></li>
								<li role="presentation"><a href="rentalCar.php" class="active">租車</a></li>								
								<li role="presentation"><a href="contact.php">服務據點</a></li>
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
				<li>租車</li>
				<li>租車流程</li>
			</div>		
		</div>	
	</div>
	</div>
	
	
	<section id="rentalCar">
		<center>
		<div class="container">
            <div class="">
                <div class="rentalCar-items"> -

                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default active" href="rentalCar.php">租車流程</a></li>
                <li><a class="btn btn-default " href="rentalCar_notice.php">注意事項</a></li>
                <li><a class="btn btn-default " href="rentalCar_showCar.php">車款介紹</a></li>
                <li><a class="btn btn-default " href="rentalCar_iwantCar.php">我要租車</a></li>
                </ul>
                </div>




                 <div class="col-md-10">
                 
                 <table>
                 	<p><h2>網路租車流程</h2></p>
                     <tr width="800" height="110">
                         <td width="130" align="center"><img src="images/rentalCar/index.jpg" width="130" height="100"></td>
                         <td width="65"  align="center"><img src="images/rentalCar/arrow.gif" width="25" height="30"></td>
                         <td width="130" align="center"><img src="images/rentalCar/read.gif" width="130" height="100"></td>
                         <td width="65"  align="center"><img src="images/rentalCar/arrow.gif" width="25" height="30"></td>
                         <td width="130" align="center"><img src="images/rentalCar/service.jpg" width="130" height="100"></td>
                         <td width="65"  align="center"><img src="images/rentalCar/arrow.gif" width="25" height="30"></td>
                         <td width="130" align="center"><img src="images/rentalCar/goCar.jpg" width="130" height="100"></td>
                     </tr>
                     <tr width="800" height="5">
                     	 <td width="130" height="5" align="center"><p>進入德順租車網</p></td>
                     	 <td width="65" height="5"></td>
                     	 <td width="130" height="5" align="center"><p>選擇您要的車種、填寫取車時間及日期</p></td>
                     	 <td width="65" height="5"></td>
                     	 <td width="130" height="5" align="center"><p>德順服務員與客戶您聯絡，確認您的訂單內容</p></td>
                     	 <td width="65" height="5"></td>
                     	 <td width="130" height="5" align="center"><p>客戶依據取車時間至取車站繳交證件及付款，完成開心出遊</p></td>
                     </tr>
                     <tr width="800" height="20">
                     	 <td colspan="7" width="800" height="20" align="center"><p><h2>電話租車流程</h2></p></td>
                     </tr>
                     <tr width="800" height="110">
                         <td width="130" align="center"><img src="images/rentalCar/call.jpg" width="130" height="100"></td>
                         <td width="65"  align="center"><img src="images/rentalCar/arrow.gif" width="25" height="30"></td>
                         <td width="130" align="center"><img src="images/rentalCar/read.gif" width="130" height="100"></td>
                         <td width="65"  align="center"><img src="images/rentalCar/arrow.gif" width="25" height="30"></td>
                         <td width="130" align="center"><img src="images/rentalCar/goCar.jpg" width="130" height="100"></td>
                         <td colspan="2"  rowspan="2" width="195"align="center"><p><h2>德順租車</h2></p></td>
                     </tr>
                     <tr width="800" height="5">
                     	 <td width="130" height="5" align="center"><p>來電德順租車網</p></td>
                     	 <td width="65" height="5"></td>
                     	 <td width="130" height="5" align="center"><p>提供您想要的車種、取車時間、取車站及聯絡資料</p></td>
                     	 <td width="65" height="5"></td>
                     	 <td width="130" height="5" align="center"><p>客戶依據取車時間至取車站繳交證件及付款，完成開心出遊</p></td>
                     </tr>

                 </table>
                </div>
            </div>   
            </div>
        </div>
        </center>
        
    </section><!--/#rentalCar-item-->
	

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
</html>