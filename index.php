<?php
session_start();
require "lib/dbCon.php";
require "lib/trangchu.php";
if (isset($_GET["p"]))
	$p=$_GET["p"];
else
	$p="";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewsVN - Tin tuc VN</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
</head>

<body>
<div id="wrap-vp">
	<div id="header-vp">
    	<div id="logo"><img src="images/logo.png" width="196" height="64" /></div>
    </div>
    
    <div>
    	<!--block/menu.php-->
        <?php require "blocks/menu.php" ?>
    </div>
      <div id="midheader-vp">
    	<div id="left">
        	<ul class="list_arrow_breakumb">
            	<li class="start">
                <a href="#">Trang nhất</a>
                <span class="arrow_breakumb">&nbsp;</span></li>
           </ul>
        </div>
        <div id="right">
			<!--blocks/thongtinchung.php-->
            <?php require "blocks/thongtinchung.php" ?>
        </div>
    </div>
    <div class="clear"></div>

    <div id="slide-vp">
    	<!--blocks/top_trang_chu.php-->
        <?php require "blocks/top_trang_chu.php" ?>

        <div id="slide-right">
        <!--blocks/quangcao_top_phai.php-->
        <?php require "blocks/quangcao_top_phai.php" ?>
        </div>
    </div>

  	<div id="content-vp">
    	<div id="content-left">
		<!--blocks/cot_trai.php-->
		<?php require "blocks/cot_trai.php" ?>
    	</div>
        <div id="content-main">
			
			<!--PAGES-->
            <?php
            switch($p){
				case "tintrongloai": require "pages/tintrongloai.php"; break;
				case "chitiettin": require "pages/chitiettin.php"; break;
				case "timkiem": require "pages/timkiem.php"; break;
				default : require"pages/trangchu.php";
			}
            ?>
        </div>
        <div id="content-right">
		<!--blocks/cot_phai.php-->
        <?php require "blocks/login.php"?>
        --------------------------------------------------
        <?php require "blocks/register.php" ?>
        <?php require "blocks/cot_phai.php" ?>
        </div>

    <div class="clear"></div>
    	
    </div>
    
     <div id="thongtin">
    	<!--blocks/thongtindoanhnghiep.php-->
        <?php require "blocks/thongtindoanhnghiep.php" ?>
    </div>
    <div class="clear"></div>
    <div id="footer">
    	<!--blocks/footer.php-->
        <?php require "blocks/footer.php" ?>
        
        <div class="ft-bot">
            <div class="bot1"><img src="images/logo.png" width="196" height="64" /></div>
            <div class="bot2">
            
            
            
                     <p>© <span>Copyright <?php echo date("Y")?> NewsVN,</span>  All rights reserved</p>
                     
            </div>
            <div class="bot3">
                
                     
                     <p><a href="#" target="_blank" style="color: #686E7A;font: 11px arial;padding: 0 4px;text-decoration: none;">Liên hệ Tòa soạn: </a><span>024.888.68688</span> (HN) - <span>028.666.58588</span> (TP HCM)</p>
                  
            </div>
        </div>
    </div>  
</div>
</body>
</html>
