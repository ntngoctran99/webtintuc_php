<?php 
	session_start();
	if(!isset($_SESSION['iduser'])) header("location:login.php");
	include("../connect.php");
	define("master","test");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Admin Template</title>
<link rel="stylesheet" type="text/css" href="css/theme1.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

</head>

<body>
	<div id="container">
    
    <!--menu-->
    <div id="header">
        	<h2>TRUNG TÂM ĐÀO TẠO MẠNG MÁY TÍNH NHẤT NGHỆ</h2>
    <div id="topmenu">
    <?php 
		if(isset($_GET['key']))
			$key = $_GET['key'];
		else $key = "tc";	
	?>
            	<ul>
                	<li <?php if($key=="tc") echo 'class="current"' ;?>><a href="index.php">TRANG CHỦ</a></li>
                    <li <?php if($key=="tl"|| $key=="tlt"|| $key=="tls" ) echo 'class="current"' ?>><a href="?key=tl">THỂ LOẠI</a></li>
                    <li <?php if($key=="lt"|| $key=="ltt"|| $key=="lts" ) echo 'class="current"' ?>><a href="?key=lt">LOẠI TIN</a></li>
                    <li <?php if($key=="tin"|| $key=="tinthem"|| $key=="tinsua" ) echo 'class="current"' ?>><a href="?key=tin">TIN TỨC</a></li>
                    <li><a href="#">USERS</a></li>

              </ul>
    </div>
</div>
    <!--//menu-->
	
        <div id="wrapper">
            <div id="content">
               <?php 
			   	switch($key)
				{
					case "tl": include("theloai.php"); break;
					case "tc": include("main.php");break;
					case "tlt": include("theloai_them.php");break;
					case "tls": include("theloai_sua.php");break;
					case "lt": include("loaitin.php"); break;
					case "ltt": include("loaitin_them.php"); break;
					case "lts": include("loaitin_sua.php"); break;
					case "tin": include("tin.php"); break;
					case "tinthem": include("tin_them.php"); break;
					case "tinsua": include("tin_sua.php"); break;
					default:
				}
			   ?>
          </div>
        </div>
     
	 <!--footer-->
     <div id="footer">	
        <div id="credits">
   		Thiết kế bởi teo@yahoo.com</a>
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a href="javascript: document.cookie='theme='; window.location.reload();" title="Default" id="defswitch">d</a></li>
                <li><a href="javascript: document.cookie='theme=1'; window.location.reload();" title="Blue" id="blueswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=2'; window.location.reload();" title="Green" id="greenswitch">g</a></li>
                <li><a href="javascript: document.cookie='theme=3'; window.location.reload();" title="Brown" id="brownswitch">b</a></li>
                <li><a href="javascript: document.cookie='theme=4'; window.location.reload();" title="Mix" id="mixswitch">m</a></li>
            </ul>
        </div><br />

 </div>
     <!--//footer-->
</div>
</body>
</html>
