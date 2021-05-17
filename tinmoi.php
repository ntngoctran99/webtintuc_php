
<style type="text/css">

#tinmoi {width: 660px;}

#tinmoi .tinmoinhat {
	width:330px;
	float:left;
	color:#336699;
	height: 175px;
	overflow:hidden;
}

#tinmoi .tinmoitieptheo {
	float:left;
	width:329px;
	height: 175px;
	overflow: hidden;
	white-space: nowrap;
	border-left: dotted 1px #030;
}
#tinmoi .theloai {
	font-size:18px; background-color:#003300; color:#FFF;
	padding-top:5px; padding-bottom:5px; clear:left
}
#tinmoi .theloai a {
	color:#9C0; text-decoration:none; margin-left:5px; font-size:16px;}
#tinmoi .theloai a:hover{ color:#6CC; text-decoration:underline; }

#tinmoi  .tinmoinhat a {
	text-decoration:none; color:#003366; 
	font-size:16px; font-weight:bold
}
#tinmoi .tinmoinhat a:hover{ text-decoration:underline; color:#C09}
#tinmoi .tinmoinhat img {	margin-right: 5px; }

#tinmoi .tinmoitieptheo a {
	text-decoration:none;
	color:#003333
}
#tinmoi .tinmoitieptheo a:hover{text-decoration:underline; color:#C09}
#tinmoi .tinmoitieptheo p {
	margin-top:10px; margin-bottom:10px; padding-left:5px;
}

</style>

<div id="tinmoi"> 
<?php 
	include("connect.php");
	//$sl="select * from theloai where lang='vi' and AnHien=1 order by ThuTu ASC";
//	$kq=mysqli_query($link,$sl);
	$kq = $tin->get_theloai($lang); 
	while($d=$tin->fetch($kq)){
?>
  <div class="theloai"> 
   <?php
  		$idTL=$d['idTL'];
  		echo $d['TenTL'];
  		//$sl1="select * from loaitin where idTL=$idTL and AnHien=1 order by ThuTu ASC";
//		$kq1=mysqli_query($link,$sl1);
		$kq1 = $tin->get_loaitintheoTL($idTL);
		while($d1=$tin->fetch($kq1)){
  ?>
      <a href="index.php?key=lt&idLT=<?php echo $d1['idLT']; ?>"><?php echo $d1['Ten']; ?></a>
      <?php } ?>
  </div>
  <!-- div theloai -->
  <?php 
  	//$sl2="select * from tin where idLT in (select idLT from loaitin where idTL=$idTL)  and AnHien=1 order by idTin DESC limit 0,6";
//	$kq2=mysqli_query($link,$sl2);
	$kq2=$tin->get_tinmoinhat($idTL,6);
	$d2=mysqli_fetch_array($kq2);
  ?>
  <div class="tinmoinhat">
    <a href="index.php?key=ctt&idTin=<?php echo $d2['idTin']; ?>"> <?php echo $d2['TieuDe']; ?> </a>
    <p> <img src="<?php echo $d2['urlHinh']; ?>" width="80" height="80" align="left" />
    	     <?php echo $d2['TomTat']; ?>
    </p>
  </div> <!-- tinmoinhat -->
  <div class="tinmoitieptheo">
  	<?php while($d2=mysqli_fetch_array($kq2)){ ?>
    <p> <a href="index.php?key=ctt&idTin=<?php echo $d2['idTin']; ?>"> <?php echo $d2['TieuDe']; ?>   </a> </p>	
    <?php } ?>
  </div>  <!-- div id=tinmoitieptheo -->
  <?php } ?>
</div><!-- tinmoi -->
