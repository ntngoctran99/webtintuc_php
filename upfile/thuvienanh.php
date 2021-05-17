<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include("../connect.php");
$sl="select * from images";
$kq=mysqli_query($link,$sl);
while($d=mysqli_fetch_array($kq))
{
?>
<img src="<?php echo $d['urlHinh'];?>" width="300" height="150" /> <?php echo $d['MoTa'];?><br/>

<?php }?>
</body>
</html>