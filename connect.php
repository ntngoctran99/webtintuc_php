<?php 
	$link=@mysqli_connect("localhost","root","","tintuc") or die ("Khong the ket noi voi server");
	mysqli_query($link,"set names 'utf8'");
?>