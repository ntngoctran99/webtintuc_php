<style>
#tinxemnhieu{width:240px; border:1px solid #325EEB; overflow: hidden; }
#tinxemnhieu p{ 
	margin-top:0px;  margin-bottom:0px; 
	padding-left:5px;  padding-top:6px; padding-bottom:6px;
border-bottom:solid 1px #936;  white-space:nowrap; overflow:hidden; }
#tinxemnhieu a{ text-decoration:none; color:#036; }
#tinxemnhieu a:hover {color:#930}
</style>
<?php 
//include("connect.php");
?>
<div id="tinxemnhieu">
<h4>TIN XEM NHIỀU</h4>
<?php
	//$sl="select * from tin where AnHien=1 and lang='vi' order by SoLanXem DESC limit 0,10";
//	$kq=mysqli_query($link,$sl);
	$kq=$tin->get_tinxemnhieu($lang);
	while($d=$tin->fetch($kq)){
?>
<p> <a href="#"> <?php echo $d['TieuDe'];?></a>  </p>
<?php } ?>
</div>

