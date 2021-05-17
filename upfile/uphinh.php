<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript" src="../admin/ckeditor/ckeditor.js"></script>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1" action="process.php">
  <p>
    <label for="uphinh">Chọn ảnh:</label>
    <input type="file" name="uphinh" id="uphinh">
  </p>
  <p>
    <label for="MoTa">Mô Tả:</label>
    <textarea name="MoTa" id="MoTa" class="ckeditor"></textarea>
  </p>
  <p>
    <input type="submit" name="upanh" id="upanh" value="Upload">
  </p>
</form>
</body>
</html>