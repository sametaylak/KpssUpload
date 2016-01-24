<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>KPSS Fotoğraf Sistemi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script> 

  <style type="text/css">
    body{
      background: #ecf0f1;
    }
    .container-main{
      width: 640px;
      margin: 40px auto;
      padding: 20px;
      background: white;
    }
  </style>
  <script type="text/javascript">

  </script>
</head>
<body>
	<div class="container-main">
    <h1>Kpss Upload Formu</h1>
    <p>Kpss Notlar programı için basit bir upload formu</p>
    <form action="" method="post" enctype="multipart/form-data" id="myForm">
      <input type="file" id="file" name="files[]" multiple="multiple" accept="image/jpeg" />
    <input type="submit" value="Upload!" /><br>
  </div>
</body>
</html>