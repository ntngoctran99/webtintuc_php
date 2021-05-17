
    <link type="text/css" href="menu/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="menu/jquery.js"></script>
    <script type="text/javascript" src="menu/menu.js"></script>
    
<style type="text/css">
* { margin:0;
    padding:0;
}
body { background:rgb(74,81,85); }
div#menu { margin:5px auto; }
div#copyright {
    font:11px 'Trebuchet MS';
    color:#fff;
    text-indent:30px;
    padding:40px 0 0 0;
	display:none;
}
div#copyright a { color:#00bfff; }
div#copyright a:hover { color:#fff; }
</style>

<div id="menu">
    <ul class="menu">
        <li><a href="index.php" class="parent"><span><?php if($lang=="vi") echo "Trang chủ"; else echo "Home";?></span></a></li>
        <?php 
			//$sl="select * from theloai where lang='vi' and AnHien=1 order by ThuTu ASC";
//			$kq=mysqli_query($link,$sl);
			$kq = $tin->get_theloai($lang); 
			while($d=$tin->fetch($kq)){
		?>	
        
			<li><a href="#"><span><?php echo $d['TenTL']; ?></span></a>
        	<ul>
            <?php 
				$idTL=$d['idTL'];
				//$sl1="select * from loaitin where idTL=$idTL and AnHien=1 order by ThuTu ASC";
//				$kq1=mysqli_query($link,$sl1);
				$kq1 = $tin->get_loaitintheoTL($idTL);
				while($d1=$tin->fetch($kq1)){
			?>
                <li><a href="loaitin.php?idLT=<?php echo $d1['idLT']; ?>" ><span><?php echo $d1['Ten']; ?></span></a></li>
                <?php } ?>
            </ul>
         <?php } ?>   
        </li>
        <li class="last"><a href="#"><span>Contacts</span></a></li>
    </ul>
</div>
<div id="copyright">Copyright &copy; 2011 <a href="http://apycom.com/">Apycom jQuery Menus</a></div>
