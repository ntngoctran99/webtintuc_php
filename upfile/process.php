<?php ob_start();
include("../connect.php");
if(isset($_FILES['uphinh']))
{
	$target="files/";
	$filename=basename($_FILES['uphinh']['name']);
	$target.=$filename;
	
	if(move_uploaded_file($_FILES['uphinh']['tmp_name'],$target))
	{
		$sl="insert into images values(NULL, '{$_POST['MoTa']}', '$target')";
		if(mysqli_query($link,$sl))
			header("location:thuvienanh.php");
		else 
		{
			//Xóa 1 tập tin:
			unlink($target);
			echo $sl;
		}
	}
	else echo "upfile thất bại!";
}




?>