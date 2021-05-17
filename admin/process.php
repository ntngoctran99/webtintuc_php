<?php ob_start();
include("../connect.php");
date_default_timezone_set("Asia/Ho_Chi_Minh");
session_start();

//KIỂM TRA LOGIN
if(isset($_POST['login']))
{
	$sl="select * from users where Username='".$_POST['username']."' and Password='".md5($_POST['password'])."'";
	$kq=mysqli_query($link,$sl);
	if(mysqli_num_rows($kq) > 0)
	{	
	$d=mysqli_fetch_array($kq);
			$_SESSION['hoten'] = $d['HoTen'];
			$_SESSION['iduser'] = $d['idUser'];
		if(isset($_POST['remember'])&&$_POST['remember']=="on") 
		{
			setcookie("hoten",$_SESSION['hoten'],time()+1000);
			setcookie("iduser",($_SESSION['iduser']),time()+1000);
		}
		header("location:index.php");
		
	}
	else header("location:login.php");
}


//XỬ LÝ THOÁT
if(isset($_POST['thoat']))
{
	unset($_SESSION['hoten']);
	unset($_SESSION['iduser']);
	
	setcookie("hoten","",time()-1);
	setcookie("iduser","",time()-1);
	header("location:login.php");
}


//Xử lý thêm 1 thể loại mới:
if(isset($_POST['themtl']))
{
	$sl="insert into theloai values(NULL, '{$_POST['lang']}', '{$_POST['TenTL']}', '{$_POST['TenTL_KhongDau']}', {$_POST['ThuTu']}, {$_POST['AnHien']})";
	if(mysqli_query($link,$sl))
	{
		//Thêm thành công
		//Nhảy về trang theloai.php:
		header("location:index.php?key=tl&lang=".$_POST['lang']);
	}
	else
	echo $sl;
}

if(isset($_POST['suatl']))
{
	$sl="update theloai set lang='{$_POST['lang']}', TenTL='{$_POST['TenTL']}', TenTL_KhongDau='{$_POST['TenTL_KhongDau']}', ThuTu={$_POST['ThuTu']}, AnHien={$_POST['AnHien']} where idTL={$_POST['idTL']}";
	if(mysqli_query($link,$sl))
	{
		//sua thành công
		//Nhảy về trang theloai.php:
		header("location:index.php?key=tl&lang=".$_POST['lang']);
	}
	else
	echo $sl;
}


//XÓA THÊ LOẠI
if(isset($_GET['xoatl']))
{
	$sl1 = "delete from tin where idLT in (select idLT from loaitin where idTL=".$_GET['xoatl'].") ";
	if(mysqli_query($link,$sl1))
	{
		$sl2="delete from theloai where idTL=".$_GET['xoatl'];
		if(mysqli_query($link,$sl2))
		{
			//sua thành công
			//Nhảy về trang theloai.php:
			header("location:index.php?key=tl&lang=".$_GET['lang']);
		}
		else
		echo $sl2;
	}
	else echo $sl1;
}

//THÊM LOẠI TIN
if(isset($_POST['themlt']))
{	
	$sl="insert into loaitin values(NULL, '{$_POST['lang']}', '{$_POST['Ten']}', '{$_POST['Ten_KhongDau']}', {$_POST['ThuTu']}, {$_POST['AnHien']}, {$_POST['theloai']})";
	if(mysqli_query($link,$sl))
	{
		//Thêm thành công
		//Nhảy về trang loatin.php:
		header("location:index.php?key=lt&lang=".$_POST['lang']."&theloai=".$_POST['theloai']);
	}
	else
	echo $sl;
}

//SỬA LOẠI TIN
if(isset($_POST['sualt']))
{
	$sl="update loaitin set lang='{$_POST['lang']}', Ten='{$_POST['Ten']}', Ten_KhongDau='{$_POST['Ten_KhongDau']}', ThuTu={$_POST['ThuTu']}, AnHien={$_POST['AnHien']}, idTL={$_POST['theloai']} where idLT={$_POST['idLT']}";
	if(mysqli_query($link,$sl))
	{
		//sua thành công
		//Nhảy về trang theloai.php:
		header("location:index.php?key=lt&lang=".$_POST['lang']."&theloai=".$_POST['theloai']);
	}
	else
	echo $sl;
}

//XÓA LOẠI TIN
if(isset($_GET['xoalt']))
{
	$sl1 = "delete from tin where idLT=".$_GET['xoalt'];
	if(mysqli_query($link,$sl1))
	{
		$sl="delete from loaitin where idLT=".$_GET['xoalt'];
		if(mysqli_query($link,$sl))
		{
			//sua thành công
			//Nhảy về trang theloai.php:
			header("location:index.php?key=lt&lang=".$_GET['lang']."&theloai=".$_GET['theloai']);
		}
		else
		echo $sl;
	}
	else echo $sl1;
}



//UP FILE
	if(isset($_FILES['urlHinh']))
	{
		$target="images/";	
		$filename=basename($_FILES['urlHinh']['name']);
		$target.=$filename;
		
	if(move_uploaded_file($_FILES['urlHinh']['tmp_name'],$target))
		{
			$sl="insert into images values(NULL,'{$_POST['mota']}','$target')";
			if(mysqli_query($link,$sl))
			{
				header("location:thuvienanh.php");
			}
			else
			echo $sl;
		}
	else 
		echo "Upload $filename thất bại!";
	}
	
//THÊM TIN
if (isset($_POST['themtin']))
{
	if(isset($_FILES['urlHinh']))
	{
		$target="../dataupload/images/";	
		$filename=basename($_FILES['urlHinh']['name']);
		$target.=$filename;
		
		$urlhinh="/tintuc/dataupload/images/".$filename;
		$ngay=date("Y-m-d h:i:s",time());
		if(isset($_POST['TinNoiBat'])&&$_POST['TinNoiBat']=="on") $tnb=1; else $tnb=0;
		
	if(move_uploaded_file($_FILES['urlHinh']['tmp_name'],$target))
		{
			$sl="insert into tin values(NULL, '{$_POST['lang']}', '{$_POST['TieuDe']}', '{$_POST['TieuDe_KhongDau']}', '{$_POST['TomTat']}', '$urlhinh', '$ngay', 1, {$_POST['sukien']}, '{$_POST['Content']}', {$_POST['loaitin']}, 0, $tnb, {$_POST['AnHien']})";
			if(mysqli_query($link,$sl))
			{
				header("location:index.php?key=tin&lang=".$_POST['lang']."&theloai=".$_POST['theloai']."&loaitin=".$_POST['loaitin']);
			}
			else {echo $sl;unlink($target);}
		}
	else 
		echo "Upload $filename thất bại!";
	}	
}



// SỬA TIN
if(isset($_POST['suatin']))
{
	$ngay=date("Y-m-d h:i:s",time());
	if(isset($_POST['TinNoiBat'])&&$_POST['TinNoiBat']=="on") $tnb=1; else $tnb=0;
	if(isset($_FILES['urlHinh']))
	{
		$target="../dataupload/images/";	
		$filename=basename($_FILES['urlHinh']['name']);
		$target.=$filename;
		
		$urlhinh="/tintuc/dataupload/images/".$filename;
		
		
		if(move_uploaded_file($_FILES['urlHinh']['tmp_name'],$target))
		{
			$sl="update tin set lang='{$_POST['lang']}', TieuDe='{$_POST['TieuDe']}', TieuDe_KhongDau= '{$_POST['TieuDe_KhongDau']}', TomTat='{$_POST['TomTat']}', urlHinh='$urlhinh', Ngay='$ngay', idSK= {$_POST['sukien']}, Content='{$_POST['Content']}', idLT={$_POST['loaitin']}, TinNoiBat=$tnb, AnHien= {$_POST['AnHien']} where idTin={$_POST['idTin']}";
			if(mysqli_query($link,$sl))
			{
				header("location:index.php?key=tin&lang=".$_POST['lang']."&theloai=".$_POST['theloai']."&loaitin=".$_POST['loaitin']);
			}
			else {echo $sl;unlink($target);}
		}
		else 
		{
			$sl="update tin set lang='{$_POST['lang']}', TieuDe='{$_POST['TieuDe']}', TieuDe_KhongDau= '{$_POST['TieuDe_KhongDau']}', TomTat='{$_POST['TomTat']}', Ngay='$ngay', idSK= {$_POST['sukien']}, Content='{$_POST['Content']}', idLT={$_POST['loaitin']}, TinNoiBat=$tnb, AnHien= {$_POST['AnHien']} where idTin={$_POST['idTin']}";
			if(mysqli_query($link,$sl))
			{
				header("location:index.php?key=tin&lang=".$_POST['lang']."&theloai=".$_POST['theloai']."&loaitin=".$_POST['loaitin']);
			}
			else echo $sl;
		}
	}	
}


//XÓA TIN
if(isset($_GET['xoatin']))
{
	$sl="delete from tin where idTin=".$_GET['xoatin'];
	if(mysqli_query($link,$sl))
	{
		//xóa thành công
		//Nhảy về trang tin.php:
		header("location:index.php?key=tin&lang=".$_GET['lang']."&theloai=".$_GET['theloai']."&loaitin=".$_GET['loaitin']);
	}
	else
	echo $sl;
}


?>