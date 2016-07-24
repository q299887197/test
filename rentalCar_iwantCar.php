<?php
$database_DB = "RentalCar";
$link = mysql_connect("localhost", "root", "") or die(mysql_error());
$result = mysql_query("set names utf8", $link);
mysql_select_db($database_DB,$link);

if (isset($_COOKIE["userName"])){  //會員登出裝置
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }
	 
// 設定進入rentalCar_iwantCar.php給goiWantCar的cookie
if(!isset($_COOKIE["userName"])){
  setcookie("goiWantCar","rentalCar_iwantCar.php");
  setcookie("lastPage", "blog.php", time() - 3600); //清除返回bolg.php的cookie
  setcookie("pleaseLogin"); //給 pleaseLogin的cookie要給member顯示
  header("location: member.php"); //轉址, 會員專區沒有登入cookie會被請到 member登入頁面
  exit();
}

$carGoName =  $_POST['carGoName'];
$getCar =  $_POST['getCar'];
$backCar =  $_POST['backCar'];
$getDate =  $_POST['getDate'];
$backDate =  $_POST['backDate'];
$carSpecies = $_POST['carSpecies'];
$carModel =  $_POST['carModel']; 

if (isset($_POST["btnOK"])) //button 按下動作
{
    $Date = date("Y-m-d H:i:s",strtotime($time1."+8 hour")); //租車訂單時的時間
    if($carGoName != null && $getCar != null && $backCar != null && $getDate != null && $backDate != null && $carSpecies != null  && $carModel != null ){ //內容不能為空值
    	$sql="INSERT INTO sql_carGo (userID,CarDate,carUesrName,getAddres,backAddres,getData,backData,species,model)
			values ('$sUserName','$Date','$carGoName','$getCar','$backCar','$getDate','$backDate','$carSpecies','$carModel')"; 
    		//將輸入的資料 存入資料庫,目前登入使用者,租車時間,姓名,取車,還車地點時間,車種,車型
    		mysql_query($sql);
    		mysql_close($link); //關閉資料庫連結
    		echo "<script language='javascript'> alert('租車成功,服務員會與您聯絡唷!'); </script>";
    }
    else echo "<script language='javascript'> alert('請輸入完整資料'); </script>";

}
               
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company-HTML Bootstrap theme</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	

  </head>
  <body onload="fInit()"> <!-- 一進入網站執行來處理由rentalCar_showCar.php 點擊車款傳過來的值 -->
      <script language="JavaScript"> //來處理由rentalCar_showCar.php 點擊車款傳過來的值
      carGO=new Array();
            carGO[0]=["請由上方選取車種"];
            carGO[1]=["CAMRY 2.0", "NEW VIOS 1.5", "YARIS 1.5", "VIOS 1.5"];	// 小客車-豐田
            carGO[2]=["TEANA 2.0", "NEW LIVINA 1.6", "LIVINA 1.6", "TIIDA 1.6", "MARCH 1.5"];		// 小客車-日產
            carGO[3]=["COLT PLUS 1.6", "COLT PLUS 1.5"];	                    // 小客車-三菱
            carGO[4]=["5人座-U7 2.2","7人座-M7 2.2","5人座-U6 1.8"];				// 休旅車-納智捷
            carGO[5]=["5人座-X-Trail 2.0","8人座-SERENA(Q-RV) 2.5"];				// 休旅車-日產
            carGO[6]=["5人座-OUTLANDER 2.4"];			                        	// 休旅車-三菱
  function fInit()
  {
    var strUrl = location.search;
    var getPara, ParaVal , showV, getDs;
    var modle = [] , species = [] ;
    
    if (strUrl.indexOf("?") != -1) { //用來判斷是否讀到 '?'
      //切割網址有?的部分 https://lab-bob-chen.c9users.io/Company/rentalCar_iwantCar.php?sGOiwant.x=55&sGOiwant.y=15&sGOiwant=21
      //只抓 ?sGOiwant.x=55&sGOiwant.y=15&sGOiwant=21
      var getSearch = strUrl.split("?"); 
      
      //  ?sGOiwant.x=55&sGOiwant.y=15&sGOiwant=21 前面有空白字元 所以選擇getSearch[1]  再做一次切割
      //  sGOiwant.x=55  &   sGOiwant.y=15   &   sGOiwant=21   將有 & 的部分切割 分成三等份
      getPara = getSearch[1].split("&"); 
      
      //  我要最後面的 因此選擇getPara[2]  為 sGOiwant=2_1  再進行一次切割 
      //  sGOiwant = 21   將有 = 符號部分前後切割 分成兩等分  因此 getDs[1] = 2_1
      getDs = getPara[2].split("=");
      
      // 我要抓車子種類 還有車型  因此選擇getDs[1]  為 2_1 再進行一次切割 
      showV = getDs[1].split("_");   // 因此 showV[0]=2 和 showV[1]=1 , showV[0]=2為車種編號, showV[1]=1為車型編號
      modle.push(showV[0]);          // 因此 modle 等於 2 
      species.push(showV[1]);        // 因此 species 等於 1 
 
    //   alert(modle);  //跳窗顯示測值用而已

    	    var option = document.createElement("option");     //新增一個option
            option.text = carGO[modle][species-1];                //新增一個option的text內容 等於 上一頁點擊的車款carGO[]內部印出
    		document.getElementById("carModel").add(option);	// 設定選項給第二個下拉式選單內容 id="carModel"
    		document.getElementById("carSpecies").value=[modle]; //設定選項給第一個下拉式選單
    	document.getElementById("img").src = 'images/showCar/'+[modle]+[species]+'.jpg'; //將底下id=img的src位置更換成 點擊1.jpg ex: 11.jpg 21.jpg
    }

  }   
</script>
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
				<li>我要租車</li>
			</div>		
		</div>	
	</div>
	</div>
	
	
	<section id="rentalCar">

		<div class="container">
            <div class="">
                <div class="rentalCar-items"> -
                
                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default " href="rentalCar.php">租車流程</a></li>
                <li><a class="btn btn-default " href="rentalCar_notice.php">注意事項</a></li>
                <li><a class="btn btn-default " href="rentalCar_showCar.php">車款介紹</a></li>
                <li><a class="btn btn-default active" href="rentalCar_iwantCar.php">我要租車</a></li>
                </ul>
                </div>
                
                <div class="col-md-10">
       
                <form id="form1" name="form1" method="post" action="rentalCar_iwantCar.php">
                  <table width="320" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#000000">
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00"><font color="#000000">請輸入您租車的資料</font></td>
                    </tr>
                    <tr>
                      <td width="80" align="center" valign="baseline"><font color="#000000">姓名</font></td>
                      <td valign="baseline"><input type="text" name="carGoName" id="carGoName" style= "color:#000000" /></td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">取車地點</font></td>
                        <td valign="baseline"><select name="getCar" id="getCar" style= "color:#000000 ; width:177.6px;  height:27.6px" >
                             <option>請選取車站</option>
                             <option>台北三重站</option>
                             <option>台北車站</option>
                             <option>台中火車站</option>
                             <option>台中河南站</option>
                             <option>台中朝馬站</option>
                             <option>台南安平站</option>
                             <option>台南火車站</option>
                             <option>高雄三多站</option>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">還車地點</font></td>
                        <td valign="baseline"><select name="backCar" id="backCar" style= "color:#000000 ; width:177.6px;  height:27.6px" >
                             <option>請選取車站</option>
                             <option>台北三重站</option>
                             <option>台北車站</option>
                             <option>台中火車站</option>
                             <option>台中河南站</option>
                             <option>台中朝馬站</option>
                             <option>台南安平站</option>
                             <option>台南火車站</option>
                             <option>高雄三多站</option>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">取車時間</font></td>
                        <td valign="baseline"><input type="datetime-local" name="getDate" id="getDate" style= "color:#000000 ; width:210px ;  height:27.6px" /></td>
                    </tr>
                    <tr>
                        <td align="center" valign="baseline"><font color="#000000">還車時間</font></td>
                        <td valign="baseline"><input type="datetime-local" name="backDate" id="backDate" style= "color:#000000 ; width:210px ;  height:27.6px" /></td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline"><font color="#000000">車種</font></td>
                        <td valign="baseline">
                        <script>

                        function renew(index){ //設定第一個下拉式選項
                            document.getElementById("carModel").length=carGO[index];	// 刪除多餘的選項
                        	for(var i=0;i<carGO[index].length;i++){                 //設定點擊的位子,用length判斷Array的carGO[]的長度
                        	    var option = document.createElement("option");     //新增一個option
                                option.text = carGO[index][i];                      //新增一個option的text內容 等於 目前點擊的位子carGO[]內部印出
                                option.value = carGO[index][i];                     //新增一個option的value內容 等於 目前點擊的位子carGO[]內部印出
                        		document.getElementById("carModel").add(option);	// 設定新選項給第二個下拉式選單內容 id="carModel"
                        		document.getElementById("img").src = 'images/showCar/'+[index]+'1'+'.jpg'; //將底下id=img的src位置更換成 點擊1.jpg ex: 11.jpg 21.jpg
                        	   
                        	    if([index]==0){
    	                            document.getElementById("img").src ='';
    	                        }
                        	}
                        }
                        function changeImg(index){ //設定第二個下拉式選單選擇內容
                            var carSpecies = document.getElementById("carSpecies").value; //新增一個option 抓取id="carSpecies" 的 value值
                        	document.getElementById("img").src = 'images/showCar/'+[carSpecies]+[index+1]+'.jpg'; //將圖片跟換成  (value)+(目前點擊位子+1).jpg
                        }
                        </script>
                        
                        <select id="carSpecies" name="carSpecies" onChange="renew(this.selectedIndex);" style= "color:#000000 ; width:177.6px;  height:27.6px">
                            <option>請選擇車種</option>
                            <optgroup selected="true" label="小客車"> 
                        	<option value="1">豐田</option>
                        	<option value="2">日產</option>
                        	<option value="3">三菱</option>
                        	<optgroup selected="true" label="休旅車"> 
                        	<option value="4">納智捷</option>
                        	<option value="5">日產</option>
                        	<option value="6">三菱</option>
                        	
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="80" align="center" valign="baseline"><font color="#000000">車型</font></td>
                        <td valign="baseline">
                        <select id="carModel" name="carModel" onChange="changeImg(this.selectedIndex);" style= "color:#000000 ; width:177.6px;  height:27.6px">
                        	<!--<option value="">請由上方選取車種</option>-->
                        </select>

                        
                        </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#77FF00">
  
                      <input type="submit" name="btnOK" id="btnOK" value="送出"   style=background-color:pink;color:#000000 />
                      <input type="reset" name="btnReset" id="btnReset" value="清除" style=background-color:pink;color:#000000 />
                      
                      </td>
                    </tr>
                  </table>
                </form>
                                            
                    <center>
                        <div class="recent-work-wrap">
                            <img id="img" class="img-responsive" src="images/showCar/11.jpg">  <!-- 以上下拉式選單換圖的img id=""img -->
                            <p id="demo"></p>
                        </div>
                    </center>

                </div>
            </div>  
                    

                </div>
            </div>
        </div>
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