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
ini_set('display_errors',1);
error_reporting(E_ALL);
 
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];
 
 echo $kadi;

if($kadi=="admin" or $sifre=="kpssnotlar")  {
    $_SESSION["login"] = "true";
    header("Location:upload_file.php");
}
else {
    if($kadi=="" or $sifre=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
 
ob_end_flush();
?>
