<?php 
ob_start();
include("lib.php");
$tin = new tintuc;
$tin->connect("localhost","root","","tintuc");

//Thêm ý kiến vào db
if(isset($_POST['guiykien']))
{
	$tam=$tin->insert_ykienbandoc($_POST['idTin'], $_POST['ykien'], $_POST['email'], $_POST['hoten']);
	if($tam) header("location:index.php?key=ctt&idTin=".$_POST['idTin']);
	else echo "Thêm thất bại!";		
}

//Kiểm tra captcha
session_start();
if(isset($_SESSION['captcha'],$_POST['maxn'])&&$_SESSION['captcha']==$_POST['maxn'])
	if(isset($_POST['guiykien']))
	{
		$tam=$tin->insert_ykienbandoc($_POST['idTin'], $_POST['ykien'], $_POST['email'], $_POST['hoten']);
		if($tam) header("location:index.php?key=ctt&idTin=".$_POST['idTin']);
		else echo "Thêm thất bại!";		
	}
else
	echo "Nhập mã sai!";
?>