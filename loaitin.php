<style>
#main{width:660px;}
.left{width:250px; float:left;}
.right{width:390px; float:right;}
.clear{clear:both; margin-bottom:10px;}
.page {font-size:16px; color:#D91A1D; font-weight:bold;}
</style>

<?php 
	if(isset($_GET['idLT'])){
	//include("connect.php"); 
	$idLT=$_GET['idLT'];
	//$sl="select Ten from loaitin where idLT=$idLT";
//	$kq=mysqli_query($link,$sl);
	$kq=$tin->get_tintheoLT($idLT);
	$d=$tin->fetch($kq);
?>
<div id="main">
	<h1><?php echo $d['Ten']; ?></h1>
<?php 
	$sl1="select * from tin where idLT=$idLT and AnHien=1 order by idTin DESC";
	$kq1= mysqli_query($link,$sl1);
	$sotin = 5;
	$tstin = mysqli_num_rows($kq1);
	$tstrang = ceil($tstin/$sotin);
	
	if(isset($_GET['page'])){
		$page=$_GET['page']; //nếu tồn tại thì get giá trị của trang	
	}
		else $page=1;
	}
	$vitri = ($page-1)*$sotin;
	
	$sl2="select * from tin where idLT=$idLT and AnHien=1 order by idTin DESC limit $vitri,5";
	$kq2= mysqli_query($link,$sl2);
	while($d2=mysqli_fetch_array($kq2)){
?>
	<div class="left"> <img width="200px" height="150px" src="<?php echo $d2['urlHinh']; ?>"/> </div>
	<div class="right"><h2><a href="index.php?key=ctt&idTin=<?php echo $d2['idTin'];?>"><?php echo $d2['TieuDe']; ?></a></h2></div>
    <div class="right"><?php echo $d2['TomTat']; ?></div>
    <div class="clear"></div>
  <?php }  ?>
<div>Trang <?php 
	for($i=1;$i<=$tstrang;$i++){
		if($i==$page) echo "<span class='page'>$i</span>";
		else {
?>
    <a href="?key=lt&page=<?php echo $i;?>&idLT=<?php echo $idLT;?>"><?php echo $i;?></a>&nbsp;<?php } }?></div>   
</div>

