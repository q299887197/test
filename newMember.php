<?php

$database_DB = "RentalCar";
$link = mysql_connect("localhost", "root", "") or die(mysql_error());
$result = mysql_query("set names utf8", $link);
mysql_select_db($database_DB,$link);

$MemberID = $_POST['newMemberID'];
$MemberPW = $_POST['newMemberPW'];
$MemberTEL = $_POST['newMemberTEL'];
$MemberEM = $_POST['newMemberEM'];
$MemberBD = $_POST['newMemberBD'];

if (isset($_POST["btnOK"])) //按下btn
{
	    $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour"));
			if($MemberID != null && $MemberPW != null && $MemberTEL != null && $MemberEM != null && $MemberBD != null ){ //不能為空值
					$MemberID = $_POST['newMemberID'];
					$MemberPW = $_POST['newMemberPW'];
					$MemberTEL = $_POST['newMemberTEL'];
					$MemberEM = $_POST['newMemberEM'];
					$MemberBD = $_POST['newMemberBD'];
			//讀取sql_RentalCar資料庫的memberID  , 搜尋條件為 $MemberID
			$sql = "SELECT * FROM sql_RentalCar where memberID = '$MemberID'";  //抓資料庫的 $MemberID
			$result = mysql_query($sql);
			$row = @mysql_fetch_row($result);
			if ( $row[1] == $id)  //比對帳號是否有相同重複
			{
			if($_POST['newMemberPW'] == $_POST['newMemberPW2']){ //驗證密碼是否兩次都相同
							$sql="INSERT INTO sql_RentalCar (memberID,memberPW,memberTEL,memberEM,memberBD,newMemberDate)
									values ('$MemberID','$MemberPW','$MemberTEL','$MemberEM','$MemberBD','$Date')"; //將輸入的資料 存入資料庫
							mysql_query($sql);
							mysql_close($link); //關閉資料庫連結
							

							  setcookie("nweMember");
							  header("location: index.php"); //轉址, 會員專區沒有登入cookie會被請到 member登入頁面
							  exit();

														
							// echo "<script language='javascript'>alert('註冊成功,請重新登入');</script>";
							// header( "location:index.php");  //回index.php
			}
			else{
				 $passwordNO = '密碼輸入不一致';
				 echo "<script language='javascript'> alert('密碼輸入不一致'); </script>";
			}
			}
			else{
				$MemberIDno = '此帳號使用過了';
				echo "<script language='javascript'> alert('此帳號使用過了'); </script>";
			}

			}
			else{
				echo "<script language='javascript'> alert('請輸入完整資料'); </script>";
			}
			
}

// header( "location:index.php");  //回index.php



?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<script type="text/javascript" src="jquery.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>newMember</title>

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
								<li role="presentation"><a href="member.php">會員登入</a></li>							
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
				<li><a href="member.php">會員登入</a></li>
				<li>註冊會員</li>			
			</div>		
		</div>	
	</div>
	
	<div class="newMember">
		<div class="container">
			<center><h3>註冊會員</h3></center>
			<hr>
            
            <div>
                
                <form id="form1" name="form1" method="post" action="newMember.php">
                  <table width="370" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">請輸入您的資料</font></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">帳號</font></td>
                      <td valign="baseline"><input type="text" name="newMemberID" id="newMemberID" maxlength="20" value="<?php echo $MemberID ?>" placeholder="請輸入帳號" style= "color:#000000" /><span style="color:red;"><?php echo $MemberIDno ?></span></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">密碼</font></td>
                      <td valign="baseline"><input type="password" name="newMemberPW" id="newMemberPW" placeholder="請輸入密碼" style= "color:#000000" /><span style="color:red;"><?php echo $passwordNO ?></span></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">密碼確認</font></td>
                      <td valign="baseline"><input type="password" name="newMemberPW2" id="newMemberPW2" placeholder="請輸入密碼" style= "color:#000000" /><span style="color:red;"><?php echo $passwordNO ?></span></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">電話</font></td>
                      <td valign="baseline"><input type="text" name="newMemberTEL" id="newMemberTEL" value="<?php echo $MemberTEL ?>" placeholder="請輸入電話" style= "color:#000000" /></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">信箱</font></td>
                      <td valign="baseline"><input type="email" name="newMemberEM" id="newMemberEM" value="<?php echo $MemberEM ?>" placeholder="請輸入信箱" style= "color:#000000" /></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">生日</font></td>
                      <td valign="baseline"><input type="text" name="newMemberBD" id="newMemberBD" value="<?php echo $MemberBD ?>" placeholder="請輸入生日" maxlength="4" style= "color:#000000" /><P>生日為8月16日，請輸入0816</P></td>
                    </tr>
                    
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00">
                   
                      <input type="submit" name="btnOK" id="btnOK" value="註冊"   style=background-color:pink;color:#000000 />
                      <input type="reset" name="btnReset" id="btnReset" value=清除 style=background-color:pink;color:#000000 />



                      
                      
                      
                      </td>
                    </tr>
                  </table>
                </form>
                
                
            </div>
            
		</div>
	</div>	
	
	<br>
	<br>
	
	<div class="sub-newMember">
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
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat 
								libero, pulvinar tincidunt leo consectetur eget.</p>
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