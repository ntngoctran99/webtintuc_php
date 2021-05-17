
<?php
include("../connect.php");
$lang=$_GET['lang'];
$idTL=$_GET['theloai'];
?>
<form name="form1" id="form1" method="get" action="">
	<p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang" onChange="form1.submit()">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=="en") echo "selected";?>>English</option>
    </select>
    <input type="hidden" name="key" value="ltt"/>
  </p>
</form>
<form id="form2" name="form2" method="post" action="process.php">
<p>
    <label>Thể loại:</label>
    <select name="theloai">
  <?php 
  	$sl="select * from theloai where lang='$lang' order by ThuTu";
	$kq=mysqli_query($link,$sl);
  	while($d=mysqli_fetch_array($kq)){
	?>
  	<option value="<?php echo $d['idTL'] ?>" <?php if($idTL==$d['idTL']) echo "selected";?>><?php echo $d['TenTL']; ?></option>
  <?php } ?>
</select>
  </p> 
  <p>
    <label for="Ten">Ten loai:</label>
    <input type="text" name="Ten" id="Ten">
  </p>
  <p>
    <label for="Ten_KhongDau">Ten KD:</label>
    <input type="text" name="Ten_KhongDau" id="Ten_KhongDau">
  </p>
  <p>
    <label for="ThuTu">Thu Tu:</label>
    <input name="ThuTu" type="text" id="ThuTu" size="10">
  </p>
  <p>
    <label for="AnHien">Trang Thai:</label>
    <select name="AnHien" id="AnHien">
      <option value="0">An</option>
      <option value="1">Hien</option>
    </select>
  </p>
  <p>
  	<input type="hidden" name="lang" value="<?php echo $lang ?>">
    <input type="submit" name="themlt" id="themlt" value="THÊM LOẠI TIN">
  </p>
</form>