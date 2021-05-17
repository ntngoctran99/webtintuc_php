<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
   <input type="hidden" name="MAX_FILE_SIZE" value="700000"/> <!-- Don vi bytes -->
   <label for="ufile">Chon file:</label>
  <input type="file" name="ufile" id="ufile" />
  <input type="submit" name="thuchien" id="thuchien" value="Upload" />
</form>
<?php
/*
$_FILES['ten_input_type_file']['name']: ten file
$_FILES['ten_input_type_file']['tmp_name']:thong tin file tam tren server
$_FILES['ten_input_type_file']['size']: kich thuoc cua file up len
$_FILES['ten_input_type_file']['type']: kieu cua tin

*/
if(isset($_FILES['ufile']))
{
	//Thiết lập thư mục lưu file:
	$target="files/";
	$filename=basename($_FILES['ufile']['name']);
	$target=$target.$filename;
	
	
	//Kiểm tra 1 file đã tồn tại hay chưa?
	
	if(file_exists($target))
		echo "$filename đã có! ";
	else
		echo "$filename chưa có!";
		
	echo "<br/>";
	
	//Kiểm tra kiểu file upload:
	if(preg_match("/\.(jpg|png|gif)$/i",$filename))
		echo "$filename là file ảnh!";
	else echo "$filename không phải file ảnh!";
	
	echo "<br/>";
	//Upfile:
	if(move_uploaded_file($_FILES['ufile']['tmp_name'],$target))
		echo "Upload $filename thành công!";
	else 
		echo "Upload $filename thất bại!";
}


?>
</body>
</html>