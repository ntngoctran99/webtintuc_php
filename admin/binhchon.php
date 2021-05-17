<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
	include("../connect.php");
?>
<table width="600" border="1">
  <tbody>
    <tr>
      <td>Mô tả</td>
      <td>Ẩn hiện</td>
    </tr>
    <?php  
		$sl="select * from binhchon";
		$kq=mysqli_query($link,$sl);
		while($d=mysqli_fetch_array($kq)){
	?>
    <tr>
      <td><?php echo $d['MoTa']; ?></td>
      <td><?php if($d['AnHien']) echo "Hiện"; else echo "Ẩn"; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>