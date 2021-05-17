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
<form id="form1" name="form1" method="post" action="process.php">
<p>
<label>Chọn ảnh: </label>
	<input name="chonanh" type="file" id="chonanh">
</p>
<p>
<label>Mô tả:</label>
<textarea name="mota" id="mota"></textarea>
</p>
<p>
<input name="upload" type="submit" id="upload" value="Upload">
</p>
</form>
</body>
</html>