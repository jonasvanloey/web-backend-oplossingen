<?php
session_start();
$isfoto=false;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (!$isfoto): ?>
<img src="img/about-thumbnail-placeholder.png" alt="placeholder">
<?php else: ?>
    <img src="img/about-thumbnail-placeholder.png" alt="placeholder">
<?php endif;?>

<form action="gegevensbewerken.php" method="post" enctype="multipart/form-data">

    <label for="file">Bestand:</label>
    <input type="file" name="file" id="file">

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
