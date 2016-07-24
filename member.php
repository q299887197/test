<?php
$database_DB = "RentalCar";
$link = mysql_connect("localhost", "root", "") or die(mysql_error());
$result = mysql_query("set names utf8", $link);
mysql_select_db($database_DB,$link);

if (isset($_GET["logout"])) //作為登出使用 清除cookie
{
	setcookie("userName", "Guest", time() - 3600);
	header("Location: member.php");
	exit();
}

if (isset($_POST["btnMember"])) //按下註冊鈕前往註冊頁面 newMember.php
{
	header("Location: newMember.php");
	exit();
}

if(isset($_COOKIE["pleaseLogin"])){ //從 rentalCar_iwantCar.php被導往來此頁並傳來pleaseLogin的COOKIE
  echo "<script language='javascript'>alert('請先登入,才能進入唷');</script>";
  setcookie("pleaseLogin", "", time() - 3600); //上面顯示跳窗後清除 COOKIE
}

if (isset($_POST["btnOK"])) //button 按下動作
{
	$sUserName = $_POST["txtUserName"];
	$sUserPassword = $_POST["txtPassword"];


	if($sUserName != null && $sUserPassword != null){  // 帳號密碼不能為空直
	//讀取sql_RentalCar資料庫的memberID  , 搜尋條件為 $MemberID
	$sql = "SELECT * FROM sql_RentalCar where memberID = '$sUserName'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result); 
	
	if($row[1] == $sUserName && $row[2] == $sUserPassword){
	
		setcookie("userName", $sUserName);
		if (isset($_COOKIE["lastPage"]))
			header(sprintf("Location: %s", $_COOKIE["lastPage"]));
		elseif(isset($_COOKIE["goiWantCar"]))
		 header(sprintf("Location: %s", $_COOKIE["goiWantCar"]));
		else
		   header("Location: index.php");
		exit();
	}
	else
		echo "<script language='javascript'> alert('帳號密碼錯誤'); </script>";
	
	

	}
		else
		echo "<script language='javascript'> alert('請輸入正確帳號密碼'); </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member</title>

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
								<li role="presentation"><a href="rentalCar.php">租車</a></li>								
								<li role="presentation"><a href="contact.php">服務據點</a></li>
								<li role="presentation"><a href="blog.php">會員專區</a></li>
								<li role="presentation"><a href="member.php" class="active">會員登入</a></li>							
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
				<li><a href="index.php">Home</a></li>
				<li>會員登入</li>			
			</div>		
		</div>	
	</div>
	
	<div class="member">
		<div class="container">
			<center><h3>會員登入</h3></center>
			<hr>
            
            <div>
                
                <form id="form1" name="form1" method="post" action="member.php">
                  <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">請輸入您的帳號密碼</font></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">帳號</font></td>
                      <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" style= "color:#000000" /></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">密碼</font></td>
                      <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" style= "color:#000000" /></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00">
  
                      <input type="submit" name="btnOK" id="btnOK" value="登入"   style=background-color:pink;color:#000000 />
                      <input type="reset" name="btnReset" id="btnReset" value=清除 style=background-color:pink;color:#000000 />

                      <input type="submit" name="btnMember" id="btnMember" value=註冊 style=background-color:pink;color:#000000 />

                      
                      
                      
                      </td>
                    </tr>
                  </table>
                </form>
                
                
            </div>
            
		</div>
	</div>	
	
	<br>
	<br>
	
	<div class="sub-member">
		<div class="container">
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">加入會員</h4>
								<p>加入會員才可享有租車，且車種非常多，任君挑選。<br>每台車子都有定期保養檢查，因此不必擔心車況問題，絕對安全。<br>來德順租車絕對是您的最佳選擇。</p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">會員專區</h4>
								<p>加入會員後，才會有"會員專區"，專區提供給租車的您各種旅遊資訊，讓您輕輕鬆鬆遊玩台灣。<br><br>專區也會有不定時的優惠，讓會員有更便宜的價格來租車，讓您可以省錢又可以出遊玩。</p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-rocket"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">Logo Design</h4>
								<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat -->
								<!--libero, pulvinar tincidunt leo consectetur eget.</p>-->
							</div>
						</li>
					</ul>
				</div>
			</div>
						
			<div class="col-md-6">
				<img src="images/4.jpg" class="img-responsive">
				<p>L</p>
			</div>
		</div>
	</div>
	
	
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