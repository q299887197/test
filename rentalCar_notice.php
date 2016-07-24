<?php

if (isset($_COOKIE["userName"])){
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }

if (isset($_GET["car1"]))
{
// 	setcookie("userName", "Guest", time() - 3600);
	exit();
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
				<li>rentalCar</li>
			</div>		
		</div>	
	</div>
	</div>
	
	
	<section id="rentalCar">
        <!--<div class="container">-->
        <!--    <div class="center">-->
        <!--        <ul class="rentalCar-filter text-center">-->
        <!--        <a class="btn btn-default active" href="#">流程介紹</a>-->
        <!--        <a class="btn btn-default " href="#">注意事項</a>-->
        <!--        <a class="btn btn-default " href="#">車款介紹</a>-->
        <!--        <a class="btn btn-default " href="#">我要租車</a>-->
        <!--        </ul>-->
        <!--    </div>-->
            

            <!--<ul class="rentalCar-filter text-center">-->
            <!--    <li><a class="btn btn-default active" href="#" data-filter="*">全部車款</a></li>-->
            <!--    <li><a class="btn btn-default" href="#" data-filter=".bootstrap">福斯</a></li>-->
            <!--    <li><a class="btn btn-default" href="#" data-filter=".html">本田</a></li>-->
            <!--    <li><a class="btn btn-default" href="#" data-filter=".wordpress">豐田</a></li>-->
            <!--</ul><!--/#rentalCar-filter-->
		<!--</div>-->
		<center>
		<div class="container">
            <div class="">
                <div class="rentalCar-items"> -----

                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default " href="rentalCar.php">租車流程</a></li>
                <li><a class="btn btn-default active" href="rentalCar_notice.php">注意事項</a></li>
                <li><a class="btn btn-default " href="rentalCar_showCar.php">車款介紹</a></li>
                <li><a class="btn btn-default " href="rentalCar_iwantCar.php">我要租車</a></li>
                </ul>
                </div>




                 <div class="col-md-10">
                 
                 <table>
                 	<p><h2>網路租車流程</h2></p>
					   <tr>
						  <td align="center" valign="top" style="padding:5px 5px 5px 40px;"><div style="line-height: 160%;">
					        <p style="color:red;">
					           <strong>本公司所提供之(甲租乙)還服務，須視各門市車輛調度狀況且限於門市還車 ( 不提供特定地點收車 ) ，若遇連續假期、特定地區節慶活動常因預約較滿而未能提供甲租乙還服務，請先來電洽詢 ( 各門市保留甲租乙還之接單決定權 ) 。</strong>
					        </p>
					        <p style="color:red;"><strong style="line-height: 160%; color:blue;"><strong>若門市確認可提供甲租乙還服務，則手續費收取方式如下：</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;"><strong>【暑假期間(7/1 ~ 8/31)】依下表收費。</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;"><strong>【非暑假期間】</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;"><strong>1. 如於3天前(不含取車當日)預約甲租乙還，則免收甲租乙還手續費；</strong></strong><br>
					        <strong style="color:blue; line-height: 160%;">2. 如3天內預約甲租乙還，則依下表收費，但最高僅收取1,000元；</strong><br>
					        <strong style="color:blue; line-height: 160%;">3. 取車後提出甲租乙還，依下表收費。</strong></p>

					        <p style="color:red;"><strong style="line-height: 160%; color: rgb(0, 0, 255);">註：上述規範適用對象均須持有中華民國身分證。下圖其他分站正在設置中。</strong></p>
					        </div>
					      </td>
					   </tr>
					   <tr>
					    	<td align="center" valign="top"><img src="images/rentalCar/carMoney.jpg" border="0"></td>
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