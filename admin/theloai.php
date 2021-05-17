
<?php 
	defined("master") or die("KHÔNG TỒN TẠI TRANG NÀY");
	//include("../connect.php");
	if(isset($_GET['lang'])) $lang = $_GET['lang'];
	else $lang = "vi";
?>
<form name="form1" method="get">
<p>
  <label>Ngôn ngữ: </label>
  <select name="lang" onChange="form1.submit()">
  <option value="vi">Việt</option>
  <option value="en" <?php if ($lang=="en") echo "selected";?>>Anh</option>
</select>
<input type="hidden" name="key" value="tl"/>
</p>

<table width="600" border="1">
  <tbody>
    <tr>
      <td>Thứ tự</td>
      <td>Tên thể loại</td>
      <td>Tên không dấu</td>
      <td>Trạng thái</td>
      <td><a href="index.php?key=tlt&lang=<?php echo $lang;?>">Thêm</a></td>
    </tr>
    <?php
		$sl="select * from theloai where lang='$lang'";
		$kq=mysqli_query($link,$sl);
		while($d=mysqli_fetch_array($kq)){
	?>
    <tr>
      <td><?php echo $d['ThuTu']; ?></td>
      <td><?php echo $d['TenTL']; ?></td>
      <td><?php echo $d['TenTL_KhongDau']; ?></td>
      <td><?php if($d['AnHien'] == 1) echo "Hiện"; else echo "Ẩn" ?></td>
      <td><a href="process.php?xoatl=<?php echo $d['idTL'];?>&lang=<?php echo $lang;?>" onClick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>/<a href="index.php?key=tls&idTL=<?php echo $d['idTL'];?>">Sửa</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</form>

