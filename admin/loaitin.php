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
<form name="form3" method="get">
<p>
	<label>Ngôn ngữ: </label>
  <select name="lang" onChange="form3.submit()">
  <option value="vi">Viet</option>
  <option value="en" <?php if ($lang=="en") echo "selected";?>>Anh</option>
</select>
</p>
<p>
  <label>Thể loại: </label>
  <select name="theloai" onChange="form3.submit()">
  <?php 
  	$sl="select * from theloai where lang='$lang' order by ThuTu";
	$kq=mysqli_query($link,$sl);
	$idTL=0;
	$kt=0;
  	while($d=mysqli_fetch_array($kq)){
		if($idTL==0) $idTL=$d['idTL']; ?>
  	<option value="<?php echo $d['idTL'] ?>" <?php if(isset($_GET['theloai']) && $_GET['theloai']==$d['idTL']) {echo "selected";$kt=1;} ?>><?php echo $d['TenTL']; ?></option>
  <?php }
  if($kt==1) $idTL=$_GET['theloai'];
   ?>
</select>
<input type="hidden" name="key" value="lt"/>
</p>
<table width="600" border="1">
  <tbody>
    <tr>
      <td>Thứ Tự</td>
      <td>Tên</td>
      <td>Tên Không Dấu</td>
      <td>Trạng thái</td>
      <td><a href="index.php?key=ltt&lang=<?php echo $lang;?>&theloai=<?php echo $idTL;?>">Thêm</a></td>
    </tr>
    <?php 
	
  	$sl1="select * from loaitin where idTL=$idTL order by ThuTu";
	$kq1=mysqli_query($link,$sl1);
  	while($d1=mysqli_fetch_array($kq1)){ ?>
    <tr>
      <td><?php echo $d1['ThuTu']; ?></td>
      <td><?php echo $d1['Ten']; ?></td>
      <td><?php echo $d1['Ten_KhongDau']; ?></td>
      <td><?php if($d1['AnHien']==1) echo "Hiện"; else echo "Ẩn" ; ?></td>
      <td><a href="process.php?xoalt=<?php echo $d1['idLT'];?>&lang=<?php echo $lang;?>&theloai=<?php echo $idTL;?>" onClick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>/<a href="index.php?key=lts&idLT=<?php echo $d1['idLT'];?>">Sửa</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</form>
</body>
</html>