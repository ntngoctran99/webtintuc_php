<?php 
	session_start();
	ob_start();
	if(isset($_COOKIE['iduser'])) 
	{		
		$_SESSION['hoten']=$_COOKIE['hoten'];
		$_SESSION['iduser'] = $_COOKIE['iduser'];
		//Gia hạn cookie:
		setcookie("hoten",$_SESSION['hoten'],time()+7*24*60*60);
		setcookie("iduser",$_SESSION['iduser'],time()+7*24*60*60);
	}
	if(isset($_SESSION['iduser'])) header("location:index.php");
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1"  name="form1" method="post" action="process.php">
	<p>
	<label>Username: </label>
	<input name="username" type="text" id="username">
    </p>
    <p>
    <label>Password: </label>
    <input name="password" type="password" id="password">
    </p>
    <p>
    <input name="remember" type="checkbox" id="remember">
    <label>Remember</label>
    </p>
    <p>
    <input name="login" type="submit" id="login" value="LogIn" >
     <input name="cancel" type="button" id="cancel" title="Cancel" value="Cancel">
    </p>
</form>
</body>
</html>