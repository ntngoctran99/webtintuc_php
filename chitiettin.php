<style>
	.tieude{text-align:center;}
</style>

<?php
	//include("connect.php");
	if(isset($_GET['idTin'])){
		$idTin=$_GET['idTin'];
		if(!$tin->update_SoLanXem($idTin)) echo "Cập nhật số lần xem thất bại!";
		
		$ma = $tin->captcha();
		$_SESSION['captcha']=$ma;
		
		//$sl="select * from tin where idTin=$idTin";
//		$kq=mysqli_query($link,$sl);
		$kq=$tin->get_chitiettin($idTin);
		$d=$tin->fetch($kq);
?>
<div class="chitiettin">
	<div class="tieude"> 
    	<p><?php echo $d['TieuDe'];?></p>
        <p>(<?php echo date("d-m-Y h:i:s",strtotime($d['Ngay'])) ;?>)</p>
    </div>
    <div class="tomtat">
    	<p><?php echo $d['TomTat'];?></p>
    </div>
    <div>
     <p><?php echo $d['Content'];?></p>
    </div>
</div>
<div>
	<p>Cac tin cu hon: </p>
    <?php 
		//$sl1="select * from tin where idLT in (select idLT from tin where idTin=$idTin) and idTin<$idTin order by idTin DESC limit 0,5";
//		$kq1=mysqli_query($link,$sl1);
		$kq1=$tin->get_tincuhon($idTin,5);
		while($d1=$tin->fetch($kq1)){
	?>
    <p><a href="index.php?key=ctt&idTin=<?php echo $d1['idTin']; ?>"><?php echo $d1['TieuDe'];?> (<?php echo date("d-m-Y h:i:s",strtotime($d1['Ngay'])) ;?>)</a></p>
    <?php } ?>
</div>
<div>
Bạn đọc ý kiến: 
<form name="form1" id="form1" method="post" action="process.php">
<p>
<label>Họ và tên:</label>
<input name="hoten" type="text" id="hoten">
</p>
<p>
<label>Email:</label>
<input name="email" type="text" id="email">
</p>
<p>
<label>Ý kiến:</label>
<textarea name="ykien" id="ykien"></textarea>
</p>
<p>
    <label for="maxn">Nhập mã xác nhận:</label>
    <input type="text" name="maxn" id="maxn"> <span style="color:#DD171A; font-weight:bold; font-size:15px;"><?php echo $ma;?></span>
  </p>
<p>
<input type="hidden" name="idTin" value="<?php echo $idTin;?>"/>
<input name="guiykien" type="submit" id="guiykien" value="Gửi ý kiến">
</p>
</form>
</div>
<div>
Các bình luận:
<?php
	$kq2=$tin->get_binhluan($idTin);
	while($d2=$tin->fetch($kq2)){
?>
	<li><b><?php echo $d2['HoTen']." (".$d2['Email'].")";?></b> - <i><?php echo $d2['Ngay'];?></i>:<br/>
     <?php echo $d2['NoiDung'];?>
      </li>
<?php } ?>
</div>
<?php } ?>
