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
if(isset($_GET['idTin']))
{
	$idTin = $_GET['idTin'];
	$sl="select * from tin where idTin=$idTin";
	$kq=mysqli_query($link,$sl);
	$d=mysqli_fetch_array($kq);
	$lang=$d['lang'];
	$idTL=$_GET['theloai'];
	$idLT=$d['idLT'];
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
  	$sl1="select * from theloai where lang='$lang' order by ThuTu";
	$kq1=mysqli_query($link,$sl1);
  	while($d1=mysqli_fetch_array($kq1)){
	?>
  	<option value="<?php echo $d1['idTL'] ?>" <?php if(isset($_GET['theloai'])&&$idTL==$d1['idTL']) echo "selected";?>><?php echo $d1['TenTL']; ?></option>
  <?php } ?>
</select>
  </p> 
</form>
<form id="form2" name="form2" method="post" action="process.php" enctype="multipart/form-data">
<p>
    <label>Loại tin:</label>
    <select name="loaitin">
  <?php 
  	$sl2="select * from loaitin where idTL=$idTL order by ThuTu";
	$kq2=mysqli_query($link,$sl2);
  	while($d2=mysqli_fetch_array($kq2)){
	?>
  	<option value="<?php echo $d2['idLT'] ?>" <?php if(isset($_GET['loaitin'])&&$idLT==$d2['idLT']) echo "selected";?>><?php echo $d2['Ten']; ?></option>
  <?php } ?>
</select>
  </p> 
  <p>
    <label for="TieuDe">Tieu De:</label>
    <input type="text" name="TieuDe" id="TieuDe" value="<?php echo $d['TieuDe'];?>">
  </p>
  <p>
    <label for="TieuDe_KhongDau">Tieu De KD:</label>
    <input type="text" name="TieuDe_KhongDau" id="TieuDe_KhongDau" value="<?php echo $d['TieuDe_KhongDau'];?>">
  </p>
  <p>
    <label for="TomTat">Tom tat:</label>
    <textarea name="TomTat" id="TomTat" cols="45" rows="5"><?php echo $d['TomTat'];?></textarea>
  </p>
  <p>
    <label for="urlHinh">Hinh:</label>
    <input name="urlHinh" type="file" id="urlHinh"><img src="<?php echo $d['urlHinh'];?>"/>
  </p>
  <p>
  <label>Sự kiện </label>
  	<select name="sukien">
    <?php 
		$kqsk = mysqli_query($link,"select * from sukien where lang='$lang' order by ThuTu");
		while($dsk=mysqli_fetch_array($kqsk)){
	?>
  	  <option value="<?php echo $dsk['idSK'];?>" <?php if($d['idSK']==$dsk['idSK']) echo "selected='selected'";?>><?php echo $dsk['MoTa'];?></option>
  	<?php } ?>
    </select>
  </p>
  <p>
  	<label>Nội dung:</label>
    <textarea name="Content" id="Content" cols="45" rows="5" class="ckeditor"><?php echo $d['Content'];?></textarea>
  </p>
  <p>
  	<label>Tin nổi bật</label>
    <input name="TinNoiBat" type="checkbox" id="TinNoiBat" <?php if($d['TinNoiBat']==1) echo "checked='checked'";?> >
  </p>
  <p>
    <label for="AnHien">Trang Thai:</label>
    <select name="AnHien" id="AnHien">
      <option value="0">An</option>
      <option value="1" <?php if($d['AnHien']==1) echo "selected";?>>Hien</option>
    </select>
  </p>
  <p>
  	<input type="hidden" name="lang" value="<?php echo $lang ?>">
    <input type="hidden" name="theloai" value="<?php echo $idTL ?>">
    <input type="hidden" name="idTin" value="<?php echo $idTin ?>">
    <input type="submit" name="suatin" id="suatin" value="SỬA TIN">
  </p>
</form>
<?php } ?>
</body>
</html>