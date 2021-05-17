<?php
$lang=$_GET['lang'];
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
    <input type="text" name="TenTL" id="TenTL">
  </p>
  <p>
    <label for="TenTL_KhongDau">Ten KD:</label>
    <input type="text" name="TenTL_KhongDau" id="TenTL_KhongDau">
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
    <input type="submit" name="themtl" id="themtl" value="Them TL">
  </p>
</form>
