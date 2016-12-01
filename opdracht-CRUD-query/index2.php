<?php
$message =false;

try{
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' );
    $query = 'select brnaam, brouwernr from brouwers';
}
catch (exeption $e)
{
    $message['type']= error;
    $message['text']='er is een fout gebeurd';
}
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

</body>
</html>
