<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
	include("../connect.php");
	if(isset($_GET['lang'])) $lang = $_GET['lang'];
	else $lang = "vi";
?>
<form name="form2" method="get">
<p>	
	<label>Ngôn ngữ:</label>
    <select name="lang" onChange="form2.submit()">
  <option value="vi">Việt</option>
  <option value="en" <?php if ($lang=="en") echo "selected";?>>Anh</option>
</select>
</p>
<table width="600" border="1">
  <tbody>
    <tr>
      <td>Mô tả</td>
      <td>Thứ tự</td>
      <td>Ẩn hiện</td>
    </tr>
    <?php  
		$sl="select * from sukien where lang='$lang'";
		$kq=mysqli_query($link,$sl);
		while($d=mysqli_fetch_array($kq)){
	?>
    <tr>
      <td><?php echo $d['MoTa']; ?></td>
      <td><?php echo $d['ThuTu']; ?>;</td>
      <td><?php if($d['AnHien']) echo "Hiện"; else echo "Ẩn"; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</form>
</body>
</html>