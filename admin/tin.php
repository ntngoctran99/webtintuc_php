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
<form name="form1" method="get">
<p>
	<label>Ngôn ngữ: </label>
  <select name="lang" onChange="form1.submit()">
  <option value="vi">Viet</option>
  <option value="en" <?php if ($lang=="en") echo "selected";?>>Anh</option>
</select>
</p>
<p>
  <label>Thể loại: </label>
  <select name="theloai" onChange="form1.submit()">
  <?php 
  	$sl="select * from theloai where lang='$lang' order by ThuTu";
	$kq=mysqli_query($link,$sl);
	$idTL=0;
  	while($d=mysqli_fetch_array($kq)){
		if($idTL==0) $idTL=$d['idTL']; ?>
  	<option value="<?php echo $d['idTL']; ?>" <?php if(isset($_GET['theloai']) && $_GET['theloai']==$d['idTL']) {echo "selected='selected'";$idTL=$_GET['theloai'];} ?>><?php echo $d['TenTL']; ?></option>
  <?php } ?>
</select>
</p>
<p>
	<label>Loại tin: </label>
  <select name="loaitin" onChange="form1.submit()">
  <?php 
  	$sl1="select * from loaitin where idTL=$idTL order by ThuTu";
	$kq1=mysqli_query($link,$sl1);
	$idLT=0;
  	while($d1=mysqli_fetch_array($kq1)){
		if($idLT==0) $idLT=$d1['idLT']; ?>
  	<option value="<?php echo $d1['idLT'] ?>" <?php if(isset($_GET['loaitin']) && $_GET['loaitin']==$d1['idLT']) {echo "selected";$idLT=$_GET['loaitin'];} ?>><?php echo $d1['Ten']; ?></option>
  <?php }?>
</select>
<input type="hidden" name="key" value="tin"/>
</p>
<table width="1000" border="1">
  <tbody>
    <tr>
      <td>STT</td>
      <td>Tieu Đề</td>
      <td>Tóm Tắt</td>
      <td>Hình mô tả</td>
      <td>Ngày</td>
      <td>Trạng thái</td>
      <td><a href="index.php?key=tinthem&lang=<?php echo $lang;?>&theloai=<?php echo $idTL;?>&loaitin=<?php echo $idLT;?>">Thêm</a></td>
    </tr>
    <?php 
  	$sl2="select * from tin where idLT=$idLT order by idTin DESC";
	$kq2=mysqli_query($link,$sl2);
	
	$tstin = mysqli_num_rows($kq2);
	$sodong = 5;
	$tstrang = ceil($tstin/$sodong);
	if(isset($_GET['page'])) $page = $_GET['page'];
	else $page=1;
	$vitri = ($page-1)*$sodong;
	$stt=$vitri+1;
	
	$sl2="select * from tin where idLT=$idLT order by idTin DESC limit $vitri,$sodong";
	$kq2=mysqli_query($link,$sl2);
  	while($d2=mysqli_fetch_array($kq2)){ ?>
    <tr>
      <td><?php echo $stt++; ?></td>
      <td><?php echo $d2['TieuDe']; ?></td>
      <td><?php echo $d2['TomTat']; ?></td>
      <td><img src="<?php echo $d2['urlHinh']; ?>" width="200px" height="150px"/></td>
      <td><?php echo date("d-m-Y h:i:s",strtotime($d2['Ngay'])); ?></td>
      <td><?php if($d2['AnHien']==1) echo "Hiện"; else echo "Ẩn" ; ?></td>
      <td><a href="process.php?xoatin=<?php echo $d2['idTin'];?>&lang=<?php echo $lang;?>&theloai=<?php echo $idTL;?>&loaitin=<?php echo $idLT;?>" onClick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>/<a href="index.php?key=tinsua&lang=<?php echo $lang;?>&theloai=<?php echo $idTL;?>&loaitin=<?php echo $idLT;?>&idTin=<?php echo $d2['idTin'];?>">Sửa</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<p>Trang: <?php 
for($i=1;$i<=$tstrang;$i++){?><a href="?key=tin&lang=<?php echo $lang;?>&theloai=<?php echo $idTL;?>&loaitin=<?php echo $idLT;?>&page=<?php echo $i;?>"><?php echo $i;?></a> &nbsp;<?php }?></p>
</form>
</body>
</html>