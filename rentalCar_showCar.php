<?php

if (isset($_COOKIE["userName"])){            //登出裝置
	$sUserName = $_COOKIE["userName"];
	}
else{ 
	  $sUserName = "Guest";
	 }

if($_POST['car']=='1'){             //設定按下"所有車款" 顯示暗沉色 表示目前選項
    $activeAll = active;   
    } 
elseif($_POST['car']=='2'){    //設定按下"小客車" 顯示暗沉色 表示目前選項
    $activeSmall = active;   
    }
elseif($_POST['car']=='3'){          //設定按下"休旅車" 顯示暗沉色 表示目前選項
    $activeRV = active;
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
				<li><a href="index.php">Home</a></li>
				<li>租車</li>
				<li>車款介紹</li>
			</div>		
		</div>	
	</div>
	</div>
	
	
	<section id="rentalCar">
        
		<div class="container">
            <div class="">
                <div class="rentalCar-items"><br>
                    
                <div class="row">
                <div class="col-md-2">
                <ul class="text-left">
                <li><a class="btn btn-default " href="rentalCar.php">租車流程</a></li>
                <li><a class="btn btn-default " href="rentalCar_notice.php">注意事項</a></li>
                <li><a class="btn btn-default active" href="rentalCar_showCar.php">車款介紹</a></li>
                <li><a class="btn btn-default " href="rentalCar_iwantCar.php">我要租車</a></li>
                </ul>
                </div>

                <div class="col-md-10">
                    
                <div class="container">
                    <div class="center">
                        <!--<ul class="rentalCar-filter text-center">-->
                        <div class="row">

                            <div class="col-md-3" align="right">
                                 <form action="rentalCar_showCar.php" method="post"><input type="hidden" name="car" value="1">
                                             <input class="btn btn-default <?php if($_POST['car']=='1')echo $activeAll; ?>" type="submit" name="SB" value="全部車種"></form>
                            </div>
                            <div class="col-md-3" align="center">
                                 <form action="rentalCar_showCar.php" method="post"><input type="hidden" name="car" value="2">
                                             <input class="btn btn-default <?php echo $activeSmall ?>" type="submit" name="SB" value="小客車"></form>
                            </div>
                            <div class="col-md-3" align="left">
                                 <form action="rentalCar_showCar.php" method="post"><input type="hidden" name="car" value="3">
                                             <input class="btn btn-default <?php echo $activeRV ?>" type="submit" name="SB" value="休旅車"></form>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <br>
                        <!--</ul>-->
                    </div>
        		</div>
        		
                    <form id="Scar" name="Scar" method="get" action="rentalCar_iwantCar.php">

                    <!--選擇圖片使用-->
                    <?php
                    switch($_POST['car']){
                        case '2' :                          //小客車smallCar 圖片 
                             echo smallCar("1_1",f2);
                             echo smallCar("1_2",f4);
                             echo smallCar("1_3",f6);
                             echo smallCar("1_4",f8);
                             echo smallCar("2_1",r2);
                             echo smallCar("2_3",r6);
                             echo smallCar("2_4",r8);
                             echo smallCar("2_5",r10);
                             echo smallCar("3_1",s2);
                             echo smallCar("3_2",s4);
                             echo smallCar("2_2",r4);
                          break;
                        case '3' :                          // 休旅車RV 圖片 
                             echo VRcar("4_1",j2);
                             echo VRcar("4_2",j4);
                             echo VRcar("4_3",j6);
                             echo VRcar("5_1",r2);
                             echo VRcar("5_2",r4);
                             echo VRcar("6_1",s2);
                          break;
                        default :                          //全部車種圖片
                             echo VRcar("4_1",j2);
                             echo VRcar("4_2",j4);
                             echo VRcar("4_3",j6);
                             echo VRcar("5_1",r2);
                             echo smallCar("1_1",f2);
                             echo smallCar("1_2",f4);
                             echo smallCar("1_3",f6);
                             echo smallCar("1_4",f8);
                             echo smallCar("2_1",r2);
                             echo smallCar("2_3",r6);
                             echo smallCar("2_4",r8);
                             echo smallCar("2_5",r10);
                             echo smallCar("3_1",s2);
                             echo smallCar("3_2",s4);
                             echo VRcar("5_2",r4);
                             echo smallCar("2_2",r4);
                             echo VRcar("6_1",s2);
                    }
                        
                    ?>
                </div>
            </div>
                    
                    <?php 
                    function VRcar($photoMunber,$photoMunber2){   
                    if($photoMunber=='4_1'):
                    $VRcar='納智捷 U7 2.2' ;
                    $money='4,500';
                    $content=  '廠牌: 納智捷<br>
                                車型: U7 2.2<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 4500 .NTD<br>
                                特色 :<br>
                                先進的SUV座艙、外觀設計新穎，讓行車有更高層次的享受。';
                    elseif($photoMunber=='4_2'):
                    $VRcar='納智捷 M7 2.2' ;
                    $money='5,000';
                    $content=  '廠牌: 納智捷<br>
                                車型: M7 2.2<br>
                                車型等級: 休旅車(7人座)<br>
                                租金定價: 5,000 .NTD<br>
                                特色 :<br>
                                裕隆所研發的世界第一部智慧科技車，具有Luxgen Think+全面性車用平台，以人性化科技為設計原點，滿足各種對車的需求。';
                    elseif($photoMunber=='4_3'):
                    $VRcar='納智捷 U6 1.8' ;
                    $money='3,200';
                    $content=  '廠牌: 納智捷<br>
                                車型: U6 1.8<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 3200 .NTD<br>。';
                    elseif($photoMunber=='5_1'):
                    $VRcar='日產 X-Trail 2.0' ;
                    $money='4,500';
                    $content=  '廠牌: 日產<br>
                                車型: X-Trail 2.0<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 4000 .NTD<br>
                                特色 :<br>
                                同時有著都會車的時尚、跑車的動感與SUV的實用，最適合喜歡郊外休閒活動的你。';
                    elseif($photoMunber=='5_2'):
                    $VRcar='日產 SERENA(Q-RV) 2.5' ;
                    $money='5,000';
                    $content=  '廠牌: 日產<br>
                                車型: SERENA(Q-RV) 2.5<br>
                                車型等級: 休旅車(8人座)<br>
                                租金定價: 5000 .NTD<br>
                                特色 :<br>
                                全家歡樂出遊的最佳遊伴，擁有較大的空間。<br>
                                汽車配備 :<br>
                                CD音響，隱藏式倒車雷達，皮質座椅，可折疊式後視鏡，晶鑽頭燈。';
                    else:
                    $VRcar='三菱 OUTLANDER 2.4' ;  //61
                    $money='4,500';
                    $content=  '廠牌: 三菱<br>
                                車型: OUTLANDER 2.4<br>
                                車型等級: 休旅車(5人座)<br>
                                租金定價: 4000 .NTD<br>
                                特色 :<br>
                                先進的SUV座艙、外觀設計新穎，讓行車有更高層次的享受。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，皮質座椅，電動折疊後視鏡。';
                    endif;
                    ?>
                    <div class="rentalCar-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/rentalCar/showCar/RV/<?php echo $photoMunber ?>.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h4><?php echo $VRcar; ?></h4>
                                    <p>每日租金價格：<?php echo $money; ?></p>
                                    <!--<a class="preview" href="images/rentalCar/full/item1.png" rel="prettyPhoto" title="休旅車"><i class="fa fa-eye"></i> View</a>-->
                                    <!--圖片選擇,display: none為隱藏,將img輸入隱藏起來-->
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="images/rentalCar/showCar/RV/full/<?php echo $photoMunber ?>.jpg" rel="prettyPhoto<?php echo $photoMunber ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車身"/><i class="fa fa-eye"></i>詳細資料</a>
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="images/rentalCar/showCar/RV/full/<?php echo $photoMunber2 ?>.jpg" rel="prettyPhoto<?php echo $photoMunber ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車內"/></a>
                                    
                                        <input type="image" name="sGOiwant" id="sGOiwant" align="right" value="<?php echo $photoMunber ?>" src="images/btnRentalCarRed.gif" onClick="myFunction();">
                                        
                                        <script>
                                            function myFunction() {
                                                document.getElementById("sGOiwant").submit();
                                            }
                                        </script>
                                        	
                                                                                                                                                    <!--document.formName.btnName.value-->
                                    <!--<a href="rentalCar_iwantCar.php"><img align="right" src="images/btnRentalCarRed.gif"></img></a>-->
                                </div> 
                            </div>
                        </div>
                    </div> <!-- 休旅車選擇器end -->
                    <?php } ?>


                    <?php 
                    function smallCar($photoMunber,$photoMunber2){    //小客車的選擇器
                    if($photoMunber=='1_1'):
                    $VRcar='豐田 CAMRY 2.0' ;
                    $money='3,600';
                    $content=  '廠牌: 豐田<br>
                                車型: CAMRY 2.0<br>
                                車型等級: 2000cc.<br>
                                租金定價: 3,600 .NTD<br>
                                特色 :<br>
                                內裝以精緻、細膩的寬敞空間，帶給消費者舒適愉悅的駕乘體驗。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，皮質座椅，電動折疊後視鏡，晶鑽頭燈。';
                    elseif($photoMunber=='1_2'):
                    $VRcar='豐田 NEW VIOS 1.5' ;
                    $money='2,500';
                    $content=  '廠牌: 豐田<br>
                                車型: NEW VIOS 1.5<br>
                                車型等級: 1500cc.<br>
                                租金定價: 2500 .NTD<br>
                                特色 :<br>
                                內裝以精緻、細膩的寬敞空間，帶給消費者舒適愉悅的駕乘體驗。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，皮質座椅，電動折疊後視鏡，晶鑽頭燈。';
                    elseif($photoMunber=='1_3'):
                    $VRcar='豐田 YARIS 1.5' ;
                    $money='2,500';
                    $content=  '廠牌: 豐田<br>
                                車型: YARIS 1.5<br>
                                車型等級: 1500cc.<br>
                                租金定價: 2500 .NTD<br>
                                特色 :<br>
                                以年輕族群、女性、夫妻為訴求，提供舒適的駕駛空間。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，織布座椅，雙前座SRS氣囊，可折疊式後視鏡。';
                    elseif($photoMunber=='1_4'):
                    $VRcar='豐田 VIOS 1.5' ;
                    $money='2400';
                    $content=  '廠牌: 豐田<br>
                                車型: VIOS 1.5<br>
                                車型等級: 1500cc.<br>
                                租金定價: 2,400 .NTD<br>
                                特色 :<br>
                                四門五人座的車型，適合想出遊又想省荷包的年輕和學生族群。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，皮質座椅，可折疊式後視鏡。';
                    elseif($photoMunber=='2_1'):
                    $VRcar='日產 TEANA 2.0' ;
                    $money='3,500';
                    $content=  '廠牌: 日產<br>
                                車型: TEANA 2.0<br>
                                車型等級: 2000cc.<br>
                                租金定價: 3,500 .NTD<br>
                                特色 :<br>
                                全新大改款，外觀氣派大方，商務人士與禮車之最佳選擇。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式6片CD音響，隱藏式倒車雷達，皮質座椅，雙前座SRS氣囊，電動折疊後視鏡， 方向盤音響快撥鍵，智慧型鑰匙。';
                    elseif($photoMunber=='2_2'):
                    $VRcar='日產 NEW LIVINA 1.6' ;
                    $money='2,800';
                    $content=  '廠牌: 日產<br>
                                車型: NEW LIVINA 1.6<br>
                                車型等級: 1500cc.<br>
                                租金定價: 2,800 .NTD';
                    elseif($photoMunber=='2_3'):
                    $VRcar='日產 LIVINA 1.6' ;
                    $money='2,600';
                    $content=  '廠牌: 日產<br>
                                車型: LIVINA 1.6<br>
                                車型等級: 1600cc.<br>
                                租金定價: 2,600 .NTD<br>
                                特色 :<br>
                                輕巧的外觀和舒適的空間設計，集各種實用機能為一體的家庭房車。<br>
                                汽車配備 :<br>
                                前置式單片CD音響，隱藏式倒車雷達，皮質座椅，可折疊式後視鏡。';
                    elseif($photoMunber=='2_4'):
                    $VRcar='日產 TIIDA 1.6' ;
                    $money='2,600';
                    $content=  '廠牌: 日產<br>
                                車型: TIIDA 1.6<br>
                                車型等級: 1600cc.<br>
                                租金定價: 2,600 .NTD<br>
                                特色 :<br>
                                追求乘用空間極大化，創造獨特的M&M智慧空間，享受媲美豪華房車的開闊乘用空間。<br>
                                汽車配備 :<br>
                                前置式單片CD音響，隱藏式倒車雷達，麂皮座椅，雙前座SRS氣囊，可折疊式後視鏡。';
                    elseif($photoMunber=='2_5'):
                    $VRcar='日產 MARCH 1.5' ;
                    $money='2,500';
                    $content=  '廠牌: 日產<br>
                                車型: MARCH 1.5<br>
                                車型等級: 1500cc.<br>
                                租金定價: 2,500 .NTD<br>
                                特色 :<br>
                                全新 MARCH 回來了!  輕巧靈活的小車，將再次風靡整座城市。';
                    elseif($photoMunber=='3_1'):
                    $VRcar='三菱 COLT PLUS 1.6' ;
                    $money='2,600';
                    $content=  '廠牌: 三菱<br>
                                車型: COLT PLUS 1.6<br>
                                車型等級: 1600cc.<br>
                                租金定價: 2,600 .NTD<br>
                                特色 :<br>
                                採用無間斷一體設計，一氣呵成的圓滿美學設計，別於一般傳統房車新穎造型。<br>
                                汽車配備 :<br>
                                ABS防鎖死煞車系統，前置式單片CD音響，隱藏式倒車雷達，織布座椅，可折疊式後視鏡。';
                    else:
                    $VRcar='三菱 COLT PLUS 1.5' ;  //32
                    $money='2,500';
                    $content=  '廠牌: 三菱<br>
                                車型: COLT PLUS 1.5<br>
                                車型等級: 1500cc.<br>
                                租金定價: 2,500 .NTD ';
                    endif;
                    ?>
                    <div class="rentalCar-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/rentalCar/showCar/smallCar/<?php echo $photoMunber ?>.jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h4><?php echo $VRcar; ?></h4>
                                    <p>每日租金價格：<?php echo $money; ?></p>
                                    <!--<a class="preview" href="images/rentalCar/full/item1.png" rel="prettyPhoto" title="休旅車"><i class="fa fa-eye"></i> View</a>-->
                                    <!--圖片選擇,display: none為隱藏,將img輸入隱藏起來-->
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="images/rentalCar/showCar/smallCar/full/<?php echo $photoMunber ?>.jpg" rel="prettyPhoto1<?php echo $photoMunber ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車身"/><i class="fa fa-eye"></i>詳細資料</a>
                                    <a name="<?php echo $photoMunber ?>" class="preview" href="images/rentalCar/showCar/smallCar/full/<?php echo $photoMunber2 ?>.jpg" rel="prettyPhoto1<?php echo $photoMunber ?>[pp_gal]" title="<br><br><br><?php echo $content ?>" ><img style="display: none" alt="車內"/></a>
                                    <input type="image" name="sGOiwant" id="sGOiwant" align="right" value="<?php echo $photoMunber ?>" src="images/btnRentalCarRed.gif" onClick="myFunction();">
                                        <script>
                                            function myFunction() {
                                                document.getElementById("sGOiwant").submit();
                                            }
                                        </script>
                                </div> 
                            </div>
                        </div>
                    </div> <!-- 小客車選擇器end -->
                    <?php } ?>
                    
                    </form>
                    
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