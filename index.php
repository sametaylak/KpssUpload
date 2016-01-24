<html lang="en">
<head>
  	<meta charset="UTF-8" />
  	<title>Çoklu fotoğraf yükleme</title>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <style type="text/css">
  	form {
    	width: 320px;
    	margin: 0 auto;
	}
  </style>
</head>
<body>
	<h1 align="center">Kpss Upload Formu</h1>
	<form action="" method="post" enctype="multipart/form-data">
    	<input type="file" id="file" name="files[]" multiple="multiple" accept="image/jpeg" />
  	<input type="submit" value="Upload!" /><br>
	</form>
</body>
</html>

<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

use Parse\ParseQuery;
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseFile;

ParseClient::initialize('KlF1Oqfji85VGgDVv5YWit9yj1CV8LRHCIER0D4t', '6urRPxy59tPQiC0W11nlvIgthQzbcXYce03mmMsC', 'SlLI7xwlNKCskjuB05eruvLvc9mXSHZNMs5XC1wQ');

$valid_formats = array("jpg");
$max_file_size = 1024*500; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	        	$query = new ParseQuery("Photos");
	        	$query->equalTo("FileName", $name);
	        	$results = $query->find();

	        	echo basename($name);

	        	if (count($results) == 0) {
	        		if (move_uploaded_file($_FILES['files']['tmp_name'][$f], "uploads/".$name))
					{
						$file = fopen("uploads/".$name, "rb");
						$contents = fread($file, filesize("uploads/".$name));
						fclose($file);
						$fileImage = ParseFile::createFromData($contents, $name);
						$fileImage->save();

						$images = new ParseObject("Photos");
						$images->set("FileName", $name);
						$images->set("FileImage", $fileImage);
						try {
						  $images->save();
						} catch (ParseException $ex) {  
						  // Execute any logic that should take place if the save fails.
						  // error is a ParseException object with an error code and message.
						  echo 'There is a problem!: ' . $ex->getMessage();
						}
					}
	        	}
	        }
	    }
	    $count++;
	}
	echo "<script>alert('Dosyaların yüklemesi tamamlandı!')</script>";
}

?>