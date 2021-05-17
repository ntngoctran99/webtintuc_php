
<?php
if(isset($_GET['idTL'])){
	include("../connect.php");
	$idTL=$_GET['idTL'];
	$sl="select * from theloai where idTL=$idTL";
	$kq=mysqli_query($link,$sl);
	$d=mysqli_fetch_array($kq);
	$lang=$d['lang'];
?>
<form id="form1" name="form1" method="post" action="process.php">
  <p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=="en") echo "selected";?>>English</option>
    </select>
  </p>
  <p>
    <label for="TenTL">Ten the loai:</label>
    <input type="text" name="TenTL" id="TenTL" value="<?php echo $d['TenTL'];?>">
  </p>
  <p>
    <label for="TenTL_KhongDau">Ten KD:</label>
    <input type="text" name="TenTL_KhongDau" id="TenTL_KhongDau" value="<?php echo $d['TenTL_KhongDau'];?>">
  </p>
  <p>
    <label for="ThuTu">Thu Tu:</label>
    <input name="ThuTu" type="text" id="ThuTu" size="10" value="<?php echo $d['ThuTu'];?>">
  </p>
  <p>
    <label for="AnHien">Trang Thai:</label>
    <select name="AnHien" id="AnHien">
      <option value="0">An</option>
      <option value="1" <?php if($d['AnHien']==1) echo "selected";?>>Hien</option>
    </select>
  </p>
  <p>
  	<input type="hidden" name="idTL" value="<?php echo $d['idTL'];?>">
    <input type="submit" name="suatl" id="suatl" value="Sua TL">
  </p>
</form>
<?php } ?>
