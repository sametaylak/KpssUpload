<!DOCTYPE html>
<html>
<head>
	<title>Giriş</title>
</head>
<body>
	<form action="" method="POST">
		<table align="center">
		<tr>
		<td>Kullanici Adi</td>
		<td>:</td>
		<td><input type="text" name="kadi"></td>
		</tr>
		<tr>
		<td>Sifre</td>
		<td>:</td>
		<td><input type="password" name="sifre"></td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><input type="submit" value="Giris"></td>
		</tr>
		</table>
	</form>
</body>
</html>
<?php


	ob_start();
	session_start();


	$kadi = $_POST['kadi'];
	$sifre = $_POST['sifre'];
	 
	if($kadi=="admin" or $sifre=="kpssnotlar")  {
	    $_SESSION["login"] = "true";
	    header("Location:upload_file.php");
	}

	ob_end_flush();

 
?>
