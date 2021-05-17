<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>

<body>
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
  </p>
<p>
    <label>Thể loại:</label>
    <select name="theloai" onChange="form1.submit()">
  <?php 
  	$sl="select * from theloai where lang='$lang' order by ThuTu";
	$kq=mysqli_query($link,$sl);
  	while($d=mysqli_fetch_array($kq)){
	?>
  	<option value="<?php echo $d['idTL'] ?>" <?php if($idTL==$d['idTL']) echo "selected";?>><?php echo $d['TenTL']; ?></option>
  <?php } ?>
</select>
  </p> 
</form>
<form id="form2" name="form2" method="post" action="process.php" enctype="multipart/form-data">
<p>
    <label>Loại tin:</label>
    <select name="loaitin">
  <?php 
  	$sl1="select * from loaitin where idTL=$idTL order by ThuTu";
	$kq1=mysqli_query($link,$sl1);
  	while($d1=mysqli_fetch_array($kq1)){
	?>
  	<option value="<?php echo $d1['idLT'] ?>"><?php echo $d1['Ten']; ?></option>
  <?php } ?>
</select>
  </p> 
  <p>
    <label for="TieuDe">Tieu De:</label>
    <input type="text" name="TieuDe" id="TieuDe">
  </p>
  <p>
    <label for="TieuDe_KhongDau">Tieu De KD:</label>
    <input type="text" name="TieuDe_KhongDau" id="TieuDe_KhongDau">
  </p>
  <p>
    <label for="TomTat">Tom tat:</label>
    <textarea name="TomTat" id="TomTat" cols="45" rows="5"></textarea>
  </p>
  <p>
    <label for="urlHinh">Hinh:</label>
    <input name="urlHinh" type="file" id="urlHinh">
  </p>
  <p>
  <label>Sự kiện </label>
  	<select name="sukien">
    <?php 
		$kqsk = mysqli_query($link,"select * from sukien where lang='$lang' order by ThuTu");
		while($dsk=mysqli_fetch_array($kqsk)){
	?>
  	  <option value="<?php echo $dsk['idSK'];?>"><?php echo $dsk['MoTa'];?></option>
  	<?php } ?>
    </select>
  </p>
  <p>
  	<label>Nội dung:</label>
    <textarea name="Content" id="Content" cols="45" rows="5" class="ckeditor"></textarea>
  </p>
  <p>
  	<label>Tin nổi bật</label>
    <input name="TinNoiBat" type="checkbox" id="TinNoiBat">
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
    <input type="hidden" name="theloai" value="<?php echo $idTL ?>">
    <input type="submit" name="themtin" id="themtin" value="THÊM TIN">
  </p>
</form>
</body>
</html>