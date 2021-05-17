<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET['idLT']))
{
	include("../connect.php");
	$idLT=$_GET['idLT'];
	$sl="select * from loaitin where idLT=$idLT";
	$kq=mysqli_query($link,$sl);
	$d=mysqli_fetch_array($kq);
	$idTL=$d['idTL'];
	if(isset($_GET['lang'])) $lang=$_GET['lang'];
		else $lang=$d['lang'];
?>
<form name="form1" id="form1" method="get" action="">
	<p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang" onChange="form1.submit()">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=="en") echo "selected";?>>English</option>
    </select>
    <input type="hidden" name="idLT" value="<?php echo $idLT ?>">
  </p>
</form>
<form id="form2" name="form2" method="post" action="process.php">
<p>
    <label>Thể loại:</label>
    <select name="theloai">
    <?php
    $sl1="select * from theloai where lang='$lang' order by ThuTu";
	$kq1=mysqli_query($link,$sl1);
	while($d1=mysqli_fetch_array($kq1)){
	?>
  	<option value="<?php echo $d1['idTL'] ?>" <?php if($idTL==$d1['idTL']) echo "selected";?>><?php echo $d1['TenTL']; ?></option>
    <?php } ?>
</select>
  </p> 
  <p>
    <label for="Ten">Ten loai:</label>
    <input type="text" name="Ten" id="Ten" value="<?php echo $d['Ten'];?>">
  </p>
  <p>
    <label for="Ten_KhongDau">Ten KD:</label>
    <input type="text" name="Ten_KhongDau" id="Ten_KhongDau" value="<?php echo $d['Ten_KhongDau'];?>">
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
  	<input type="hidden" name="idLT" value="<?php echo $idLT ?>">
  	<input type="hidden" name="lang" value="<?php echo $lang ?>">
    <input type="submit" name="sualt" id="sualt" value="SỬA LOẠI TIN">
  </p>
</form>
<?php } ?>
</body>
</html>